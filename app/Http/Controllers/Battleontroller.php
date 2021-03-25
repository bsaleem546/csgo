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
use App\Battle;
use App\BattleDetail;
use App\BattlePlayer;
use App\User;
use App\Events\checkParticipant;
use Pusher\Pusher;
use DateTime;

class Battleontroller extends Controller
{
     function battles(){
        $date = date("Y-m-d H:i:s", strtotime('-30 minutes'));
        $data = Battle::where('created_at','<=',$date)->where('status', '0')->get();
        foreach ($data as $key => $value) {
            $cost = 0;
            $detail = BattleDetail::where('battle_id', $value->id)->get();
            foreach ($detail as $key => $val) {
                $pr = $val->case->price;
                $pri = $pr*$val->qty;
                $cost = $cost+$pri;
                BattleDetail::destroy($val->id);
            }
            $players = BattlePlayer::where('battle_id', $value->id)->get();
            foreach ($players as $key => $va) {
                $id = $va->play_user_id_;
                wallet::addBalance($id, $cost);
                BattlePlayer::destroy($va->id);
            }
            Battle::destroy($value->id);
        }
     	$battles 	= Battle::orderBy('id', 'desc')->with('battleinfo')->where('status','0')->get();
     	$cases 		= cases::get();
        return view('web.battles',['battles' => $battles, 'cases' => $cases]);
    }

    function createbattles(){
        $popular = cases::orderBy('id', 'desc')->get();


        return view('web.create-battle', [ 'popular' => $popular]);
    }

    function watchbattle($id){
        $id = base64_decode($id);
    	$battles 	= Battle::where('id',$id)->with('battleinfo', 'players')->first();
        $arr = array();
        $total_sum = 0;
        $skintotal = array();
        $total = count($battles->battleinfo);
        foreach ($battles->battleinfo as $key => $value) {
            $sdetail = DB::table('tbl_case_detail_info')
                        ->leftJoin('tbl_skin_info', 'tbl_skin_info.id', 'tbl_case_detail_info.skin_id')
                        ->where('tbl_case_detail_info.case_id', $value->case_id)
                        ->select('tbl_skin_info.id', 'tbl_skin_info.hash_name', 'tbl_skin_info.thumbnail', 'tbl_skin_info.exterior', 'tbl_skin_info.skin_price', 'tbl_case_detail_info.odds')
                        ->get();
            array_push($arr, $sdetail);
            $sum = cases::where('id', $value->case_id)
                        ->sum('price');
            $skint = caseDetail::where('case_id', $value->case_id)
                        ->count();
            array_push($skintotal, $skint);
            $total_sum = $total_sum+($sum*$value->qty);
        }
    	return view('web.watchbattle',['battles' => $battles, 'jsdetail' => json_encode($arr, JSON_UNESCAPED_SLASHES ), 'total' => $total, 'total_cost' => $total_sum, 'skintotal' => json_encode($skintotal, JSON_UNESCAPED_SLASHES )]);
    }

    function battleadd(Request $request){
    	$data = $request->all();
        if(isset($data['caseid'])){
            $cases = $data['caseid'];
            $qty = $data['qty'];
            $total_case_price = 0;
            $x = count($cases);
            for($i=0; $i<$x; $i++){
                $item_price = cases::where('id', $cases[$i])->sum('price');
                $total_case_price = $total_case_price+($item_price*$qty[$i]);
            }
            if($total_case_price <= Auth::user()->wallet->amount){
                wallet::deduct($total_case_price);
                $result = Battle::insertBattle($data);
                return redirect('/watch-battle/'.base64_encode($result))->with('success', 'Battle successfully created.');
            }else{
                return redirect()->back()->with('error', 'Inefficient Balance.');
            }
        }else{
            return redirect()->back()->with('error', 'Select Case First.');
        }
    }


    function battleParticipate($id){
        $id = base64_decode($id);
        $popular = Battle::insertBattlePlayer($id, Auth::user()->id);
        $pd = Battle::find($id);
        $pid = $pd->players[0]->play_user_id_;
        // pusher
            $options = array(
                'cluster' => 'ap2',
                'useTLS' => true
            );

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );
            $pusher->trigger('check_participant.'.$pid, 'checkParticipant', base64_encode($id)."|".Auth::user()->nickname);

        return redirect()->back();
    }

    function checkParticipant($id){
        $id = base64_decode($id);
        $st = Battle::where('id', $id)->select('status')->first();
        $count = BattlePlayer::where('battle_id', $id)->count();
        if($count == '2' && $st->status == '0'){
            $player = BattlePlayer::where('battle_id', $id)->orderBy('id', 'desc')->first();
            $img = $player->user->avatar;
            $name = $player->user->nickname;

            return '<img class="img-fluid" width="25px" src="'.$img.'"> '.$name;
        }else{
            return 'false';
        }

    }


    function battleSpiner($id){
        $id = base64_decode($id);
        $items = array();
        $playrs = array();
        $winitem = array();
        $totalwin1 = 0;
        $totalwin2 = 0;
        $totalprice1 = 0;
        $totalprice2 = 0;
        $win = 0;
        $battl = BattleDetail::where('battle_id', $id)->get();
        $restring = '---';
        $csitt = 0;
        foreach ($battl as $key => $battle) {
            for($i=0; $i<$battle->qty; $i++){
                $btplayer = BattlePlayer::where('battle_id', $id)->get();
                $detail = caseDetail::where('case_id', $battle->case_id)->get();
                foreach($detail as $d){
                    array_push($items, $d->skin_id);
                }
                foreach($btplayer as $p){
                    array_push($playrs, $p->play_user_id_);
                }
                $random_keys=array_rand($items,2);
                $giftItem1 = $items[$random_keys[0]];
                $gift1 = skin::where('id', $giftItem1)->select('skin_price')->first();

                $giftItem2 = $items[$random_keys[1]];
                $gift2 = skin::where('id', $giftItem2)->select('skin_price')->first();
                Battle::where('id', $id)->update(['status' => '1']);

                $totalprice1 = $totalprice1+$gift1->skin_price;
                $totalprice2 = $totalprice2+$gift2->skin_price;
                array_push($winitem, $giftItem1);            
                array_push($winitem, $giftItem2);
                $restring .= "#".$giftItem1."|".$gift1->skin_price."@".$giftItem2."|".$gift2->skin_price."@".$csitt;
            }
            $csitt++;
        }
        if($totalprice1 > $totalprice2){
            foreach ($winitem as $key => $value) {
                inventory::battlewin($playrs[0], $value);
            }
            $win = 1;
        }else{
            foreach ($winitem as $key => $value) {
                inventory::battlewin($playrs[1], $value);
            }
            $win = 2;
        }

        $restring .= "#".$win;
        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pd = Battle::find($id);
        $pid = $pd->players[1]->play_user_id_;
        $pusher->trigger('battle_start.'.$id.'.'.$pid, 'battleStart', $restring);

        return $restring;
    }
}
