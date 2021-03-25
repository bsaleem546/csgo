<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\giveaway;
use App\giveawayParticipate;
use App\skin;

class giveawayController extends Controller
{
    function index($type){
    	if(Auth::guard('admin')->check()){
            $type = base64_decode($type);
            $data = giveaway::orderBy('status', 'desc')->where('type_id', $type)->withCount(['participate'])->get();
    		return view('admin.giveaway.list-giveaway', ['databelt' => $data]);
    	}else{
    		return redirect('admin/login');
    	}
    }

    function addGiveaway(){
    	if(Auth::guard('admin')->check()){
            $skin = skin::orderBy('hash_name', 'asc')->get();
    		return view('admin.giveaway.add-giveaway', ['skins' => $skin]);
    	}else{
    		return redirect('admin/login');
    	}
    }


    function insertGiveaway(Request $request){
        if(Auth::guard('admin')->check()){
            $type = $request->get('type');
            $data = $request->all();
            $filename = giveaway::insert($data);
            return redirect()->back()->with('success', 'Give-Away successfully updated.');
        }else{
            return redirect('admin/login');
        }
    }


    function deleteGiveaway($id){
        if(Auth::guard('admin')->check()){
            $id = base64_decode($id);
            $filename = giveaway::destroy($id);
            return redirect()->back()->with('success', 'Give-Away successfully Deleted.');
        }else{
            return redirect('admin/login');
        }
    }


    function joinGiveaway($id){
        if(Auth::guard('admin')->check()){
            $id = base64_decode($id);
            $check = giveawayParticipate::where('ga_id', $id)->where('user_id', Auth::user()->id)->first();
            if(!empty($check->id)){
                return redirect('/')->with('error', 'You are already Joined.');   
            }else{
                $data = giveawayParticipate::create(['ga_id' => $id, 'user_id' => Auth::user()->id, 'invoice_id' => '123']);
                if($data){
                    return redirect('/')->with('success', 'You are successfully Joined.'); 
                }else{
                    return redirect('/')->with('error', 'Something went wrong'); 
                }
            }
        }else{
            return redirect('admin/login');
        }
    }
}
