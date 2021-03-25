<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\skin;
use App\marketplace;

class marketplaceController extends Controller
{
    function index(){
    	if(Auth::guard('admin')->check()){
    		$skins = skin::orderBy('id', 'desc')->get();
    		$data = marketplace::all();
    		return view('admin.marketplace.marketplace', ['skins' => $skins, 'data' => $data]);
    	}else{
    		return redirect('admin/login');
    	}
    }

    function status($id, $status){
        if(Auth::guard('admin')->check()){
            $id = base64_decode($id);
            $stat = $status == '1' ? '2' : '1';
            marketplace::where('id', $id)->update(['status' => $stat]);
            return redirect()->back()->with('success', 'Status Updated.');
        }else{
            return redirect('admin/login');
        }
    }

    function addSkin(Request $request){
    	if(Auth::guard('admin')->check()){
    		$skin = $request->get('skin_id');
            $sprice = $request->get('sprice');
            $stprice = $request->get('stprice');
            $check = marketplace::where('skin_id', $skin)->count();
            if($check == 0){
    		    marketplace::addSkin($skin, $stprice, $sprice);
                return redirect()->back()->with('success', 'Skin Successfully Added.');
            }else{
                return redirect()->back()->with('success', 'Skin Already Added.');
            }
    	}else{
    		return redirect('admin/login');
    	}
    }

    function editPrice(Request $request){
        if(Auth::guard('admin')->check()){
            $data = $request->all();
            $id = base64_decode($data['mp_id']);
            marketplace::where('id', $id)->update(['price' => $data['sprice'], 'sugg_price' => $data['stprice']]);
            return redirect()->back()->with('success', 'Price Updated.');
        }else{
            return redirect('admin/login');
        }
    }



}
