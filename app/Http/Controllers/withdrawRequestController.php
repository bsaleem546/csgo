<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\withdrawHistory;
use Auth;

class withdrawRequestController extends Controller
{
    function index(){
    	if(Auth::guard('admin')->check()){
            $data = withdrawHistory::orderBy('created_at', 'desc')->where('type', '2')->get();
            $count = withdrawHistory::where('type', '2')->where('status', '1')->count();
    		return view('admin.withdrawRequest.requests', ['databelt' => $data, 'count' => $count]);
    	}else{
    		return redirect('admin/login');
    	}
    }

    function updateStatus($id, $status){
    	if(Auth::guard('admin')->check()){
    		$id = base64_decode($id);
            $data = withdrawHistory::where('id', $id)->update(['status' => $status]);
    		return redirect()->back()->with('success', 'Status Successfully Updated.');
    	}else{
    		return redirect('admin/login');
    	}
    }


    function checkUpdate(){
        $count = withdrawHistory::where('status', '1')->where('type', '2')->count();
        if($count > 0){
           	return ' <span class="badge badge-primary badge-indicator"></span>';
        }else{
           	return '';
        }
    }
}
