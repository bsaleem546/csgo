<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\admin;
use DB;

class adminAuthController extends Controller
{
    
    function loginView(){
        return view('admin.login');
    }

	function index(){
		if(Auth::guard('admin')->check()){
			return redirect('/admin/dashboard');
		}else{
			return redirect('/admin/login');
		}
	}
    function dashboardView(){
        if(Auth::guard('admin')->check()){
            return view('admin.dashboard');
        }else{
            return redirect('/admin/login');
        }
    }
    
    function loginAttempt(Request $request){

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password, 'status' => '1'])) {
            
            return redirect('/admin/dashboard');
        }else{
        	return redirect('/admin/login')->with('error', 'Authentication Error');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        if(Auth::guard('admin')->check()){
        }else{
            return redirect('/admin/login')->with('error', 'Authentication Error');
        }
    }

    function users(){
       if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role_id == '1') {
            $databelt = admin::all();
            return view('admin.users.userList', ['databelt' => $databelt]);
        }else{
            return redirect('/admin/login')->with('error', 'Authentication Error');
        } 
    }

    function addUser(){
       if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role_id == '1') {
            $role = DB::table('tbl_role')->get();
            return view('admin.users.newUser', ['role' => $role]);
        }else{
            return redirect('/admin/login')->with('error', 'Authentication Error');
        }
    }

    function insertUser(Request $request){
        if (Auth::guard('admin')->check()) {
            $validatedData = $request->validate([
                'username' => 'required|unique:tbl_usr|max:25|min:6',
                'password' => 'required|confirmed|min:6',
            ]);

            $data = $request->all();
            $user = new Admin;
            $user->fullname = $data['fullname'];
            $user->email = $data['email'];
            $user->username = $data['username'];
            $user->password = bcrypt($data['password']);
            $user->age = $data['age'];
            $user->cnic = $data['cnic'];
            $user->phone = $data['phone'];
            $user->role_id = $data['role'];
            $user->status = '1';
            $user->remember_token = $data['_token'];

            $user->save();

            return redirect('/admin/users/Add')->with('success', 'New user registered.');
        }else{
            return redirect('/admin/login')->with('error', 'Authentication Error');
        }
    }

    function deleteUser($id){
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role_id == '1') {
            $id = base64_decode($id);
            admin::destroy($id);
            return redirect('/admin/users')->with('success', 'User Deleted.');
        }else{
            return redirect('/admin/login')->with('error', 'Authentication Error');
        }
    }

    function editUser($id){
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role_id == '1') {
            $id = base64_decode($id);
            $databelt = admin::find($id);
            $role = DB::table('tbl_role')->get();
            return view('admin.users.editUser', ['databelt' => $databelt, 'role' => $role]);
        }else{
            return redirect('/admin/login')->with('error', 'Authentication Error');
        }
    }

    function updateUser(Request $request){
        if (Auth::guard('admin')->check()) {

            $data = $request->all();
            $user = admin::find($data['user_id']);
            $user->fullname = $data['fullname'];
            $user->email = $data['email'];
            $user->age = $data['age'];
            $user->cnic = $data['cnic'];
            $user->phone = $data['phone'];
            $user->role_id = $data['role'];
            $user->remember_token = $data['_token'];

            $user->save();

            return redirect('/admin/users')->with('success', 'User Update.');

        }else{
            return redirect('/admin/login')->with('error', 'Authentication Error');
        }
    }

    function inactiveUser($id){
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role_id == '1') {

            $id = base64_decode($id);
            $user = admin::find($id);
            $user->status = '2';
            $user->save();

            return redirect('/admin/users')->with('success', 'User In-Activated.');

        }else{
            return redirect('/admin/login')->with('error', 'Authentication Error');
        }
    }

    function activeUser($id){
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role_id == '1') {

            $id = base64_decode($id);
            $user = admin::find($id);
            $user->status = '1';
            $user->save();

            return redirect('/admin/users')->with('success', 'User Activated.');

        }else{
            return redirect('/admin/login')->with('error', 'Authentication Error');
        }
    }
}
