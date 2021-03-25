<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cryptoRefill;
use App\wallet;
use Auth;

class depositController extends Controller
{
    
    function index(){
    	if(Auth::guard('admin')->check()){
            $data = cryptoRefill::orderBy('created_at', 'desc')->where('status', '0')->get();
    		return view('admin.deposit.requests', ['databelt' => $data]);
    	}else{
    		return redirect('admin/login');
    	}
    }
    
    function rejectRequest($id){
    	if(Auth::guard('admin')->check()){
    		$id = base64_decode($id);
            $data = cryptoRefill::destroy($id);
    		return redirect()->back()->with('success', 'Request successfully rejected.');
    	}else{
    		return redirect('admin/login');
    	}
    }

    function approveRequest($id){
    	if(Auth::guard('admin')->check()){
    		$id = base64_decode($id);
            $data = cryptoRefill::find($id);
            $data->status = '1';
            $wallet = wallet::where('user_id', $data->user_id)->first();
            $old = $wallet->amount;
            $new = $old+$data->amount;
            $wallet->amount = $new;
            $wallet->save(); 
            $data->save();
    		return redirect()->back()->with('success', 'Request successfully Approved.');
    	}else{
    		return redirect('admin/login');
    	}
    }

    function checkUpdate(){
        $count = cryptoRefill::where('status', '0')->count();
        if($count > 0){
            return ' <span class="badge badge-primary badge-indicator"></span>';
        }else{
            return '';
        }
    }
}
