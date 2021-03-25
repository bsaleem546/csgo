<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class adminController extends Controller
{
    function siteUsers(){
    	if(Auth::guard('admin')->check()){
    		$databelt = User::all();
    		return view('admin.users.site-users', ['databelt' => $databelt]);
    	}else{
    		return redirect('/admin/login');
    	}
    }
}
