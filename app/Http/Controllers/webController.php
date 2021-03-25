<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use App\giveaway;
use App\cases;
use App\caseDetail;
use App\wallet;
use App\inventory;
use App\withdrawHistory;
use App\skin;
use DB;
use App\marketplace;
use App\marketSale;
use App\cryptoRefill;

class webController extends Controller
{
    
    function index(){
        $curr = date('Y-m-d H:i:s');
        $giveaway1 = giveaway::where('type_id', '1')->where('start_from', '<', $curr)->where('end_to', '>', $curr)->first();
        $giveaway2 = giveaway::where('type_id', '2')->where('start_from', '<', $curr)->where('end_to', '>', $curr)->first();
        $giveaway3 = giveaway::where('type_id', '3')->where('start_from', '<', $curr)->where('end_to', '>', $curr)->first();
        $featured = cases::where('category_id', '1')->orderBy('id', 'desc')->get();
        $official = cases::where('category_id', '2')->orderBy('id', 'desc')->get();
        $popular = cases::where('category_id', '3')->orderBy('id', 'desc')->get();
        return view('web.index', ['give1' => $giveaway1, 'give2' => $giveaway2, 'give3' => $giveaway3, 'featured' => $featured, 'official' => $official, 'popular' => $popular]);
    }

    function currProfile(Request $request){
    	if(Auth::check()){
            $inventory = inventory::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            $count = inventory::where('user_id', Auth::user()->id)->count();
            $sumprice = 0;
        	return view('web.profile', ['inventory' => $inventory, 'count' => $count, 'sumprice' => $sumprice]); 
    	}else{
    		return redirect('/')->with('error', 'Please login with Steam ID');
    	}
    }

    function walletRefillCrypto(Request $request){
        if(Auth::check()){
            $data = $request->all();
            cryptoRefill::makeRequest($data);
            return redirect()->back()->with('success', 'Wallet Request Successfully Sent.');
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    function paymentHistory(){
        if(Auth::check()){
            return view('web.payment-history'); 
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    function withdrawHistory(){
        if(Auth::check()){
            $history = withdrawHistory::where('user_id', Auth::user()->id)->where('type', '2')->orderBy('created_at', 'desc')->get();
            $count = withdrawHistory::where('user_id', Auth::user()->id)->where('type', '2')->count();
            return view('web.withdraw-history', ['history' => $history, 'count' => $count]); 
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    function sellHistory(){
        if(Auth::check()){
            $history = withdrawHistory::where('user_id', Auth::user()->id)->where('type', '1')->orderBy('created_at', 'desc')->get();
            $count = withdrawHistory::where('user_id', Auth::user()->id)->where('type', '1')->count();
            return view('web.sell-history', ['history' => $history, 'count' => $count]); 
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    function caseDetail($name, $id){
            $id = base64_decode($id);
            $case = cases::find($id);
            $detail = caseDetail::where('case_id', $id)->get();
            $total = caseDetail::where('case_id', $id)->count();
            $sdetail = DB::table('tbl_case_detail_info')
                        ->leftJoin('tbl_skin_info', 'tbl_skin_info.id', 'tbl_case_detail_info.skin_id')
                        ->where('tbl_case_detail_info.case_id', $id)
                        ->select('tbl_skin_info.id', 'tbl_skin_info.hash_name', 'tbl_skin_info.thumbnail', 'tbl_case_detail_info.odds', 'tbl_skin_info.lowest_price')
                        ->get();

            return view('web.caseDetail', ['case' => $case, 'detail' => $detail, 'jsdetail' => json_encode($sdetail, JSON_UNESCAPED_SLASHES ), 'total' => $total]); 
       
    }

    function caseitems($id){
            $id = base64_decode($id);
            $items = array();
            $case = cases::find($id);
            if($case->price <= Auth::user()->wallet->amount){
                wallet::deduct($case->price);
                $detail = caseDetail::where('case_id', $id)->get();
                foreach($detail as $d){
                    array_push($items, $d->skin_id);
                }
                $random_keys=array_rand($items,1);
                $giftItem = $items[$random_keys];
                $gift = caseDetail::where('skin_id', $giftItem)->where('case_id', $id)->get();
                
                inventory::addItem($giftItem);
                $wall = wallet::select('amount')->where('user_id', Auth::user()->id)->first();
                return $items[$random_keys];
            } else {
                return 'Inefficient Balance';
            }

       
    }

    function skinResell($id){
        if(Auth::check()){
            $id = base64_decode($id);
            $data = inventory::where('id', $id)->where('user_id', Auth::user()->id)->first();
            if(empty($data->id)){
                return redirect()->back();
            }else{
                $price = $data->skin->price;
                $wall = wallet::where('user_id', Auth::user()->id)->select('refund')->first();
                $wallet = $wall->refund;
                $new = $wallet + $price;
                wallet::where('user_id', Auth::user()->id)->update([
                    'refund' => $new
                ]);
                inventory::destroy($id);
                $wh = ['steamid' => Auth::user()->steamid, 'itemid' => '0', 'skinid' => $data->skin->id, 'tradeid' => '0', 'type' => '1', 'status' => '0'];
                withdrawHistory::insert($wh);
                
                return redirect()->back()->with('success', 'Successfully Sold.');

            }
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    function skinResellAll(){
        if(Auth::check()){
            $d = inventory::where('user_id', Auth::user()->id)->get();
            foreach($d as $key => $data){
                if(empty($data->id)){
                    return redirect()->back();
                }else{
                    $price = $data->skin->price;
                    $wall = wallet::where('user_id', Auth::user()->id)->select('refund')->first();
                    $wallet = $wall->refund;
                    $new = $wallet + $price;
                    wallet::where('user_id', Auth::user()->id)->update([
                        'refund' => $new
                    ]);
                    inventory::destroy($data->id);
                    $wh = ['steamid' => Auth::user()->steamid, 'itemid' => '0', 'skinid' => $data->skin->id, 'tradeid' => '0', 'type' => '1', 'status' => '0'];
                    withdrawHistory::insert($wh);
                    // dd($a);
    
                }
            }
            return redirect()->back()->with('success', 'Successfully Sold.');
            
        }
        else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }



    function skinWithdraw($id){
        if(Auth::check()){
            $id = base64_decode($id);
            $data = inventory::where('id', $id)->where('user_id', Auth::user()->id)->first();
            if(empty($data->id)){
                return redirect()->back(); 
            }elseif(empty(Auth::user()->trade_link)){
                return redirect()->back()->with('error', 'Please add steam trade link first. Make sure your profile is public for trade.');
            }else{
                inventory::destroy($id);
                $wh = ['steamid' => Auth::user()->steamid, 'itemid' => '0', 'skinid' => $data->skin->id, 'tradeid' => '0', 'type' => '2', 'status' => '1'];
                withdrawHistory::insert($wh);
                
                return redirect()->back()->with('success', 'Successfully withdrawn. You will get steam notification Soon');

            }
            
        }else{
            return 'Please login with Steam ID';
        }
    }

    function partnerShip(){
        return view('web.partnership');
    }

    function provablyFair(){
        return view('web.provably_fair');
    }

    function freeCases(){
        return view('web.free_cases');
    }

    function marketplace(){
        $data = marketplace::where('status', '1')->orderBy('id', 'desc')->get();
        return view('web.marketplace', ['databelt' => $data]);
    }

      function marketplacePurchase($id){
        if(Auth::check()){
            $id = base64_decode($id);
            $skin = marketplace::where('id', $id)->first();
            if(!empty($skin->skin_id)){
                $sd = skin::where('id', $skin->skin_id)->first();
                $bl = Auth::user()->wallet->refund;
                if($skin->price <= $bl){
                    if(empty(Auth::user()->trade_link)){
                        return redirect()->back()->with('error', 'Please add steam trade link first. Make sure your profile is public for trade.');
                    }else{
                        $price = $skin->price;
                        $wall = wallet::where('user_id', Auth::user()->id)->select('refund')->first();
                        $wallet = $wall->refund;
                        $new = $wallet - $price;
                        wallet::where('user_id', Auth::user()->id)->update([
                            'refund' => $new
                        ]);
                        $wh = ['steamid' => Auth::user()->steamid, 'itemid' => '0', 'skinid' => $skin->skin_id, 'tradeid' => '0', 'type' => '2', 'status' => '1', 'price' => $price, 'market' => '1'];
                        withdrawHistory::insert($wh);
                        marketSale::insertSale($id, $price);

                        return redirect()->back()->with('success', 'Skin added to withdraw request.');
                    }
                }else{
                    return redirect()->back()->with('error', 'Insufficient balance.');
                }
            }else{
                return redirect()->back()->with('error', 'Invalid Item.');
            }
        }else{
            return redirect()->back()->with('error', 'Please login with Steam ID.');
        }
    }

    function upgrade(Request $request){
        if(Auth::check()){
            $ip = empty($request->ip) ? '1' : $request->ip;
            $offip = ($ip-1)*24;
            $inventory = inventory::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->offset($offip)->limit(24)->get();
            $incount = inventory::where('user_id', Auth::user()->id)->count();

            $up = empty($request->up) ? '1' : $request->up;
            $offup = ($up-1)*24;
            $skins = skin::offset($offup)->limit(24)->get();
            $skcount = skin::count();
            $sumprice = 0;
            return view('web.upgrade', ['inventory' => $inventory, 'ip' => $ip, 'skins' => $skins, 'up' => $up, 'incount' => $incount, 'skcount' => $skcount, 'sumprice' => $sumprice]); 
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

}
