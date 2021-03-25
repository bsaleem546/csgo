<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\skin;

class skinController extends Controller
{
    function index(){
    	if(Auth::guard('admin')->check()){
    		$data = skin::orderBy('id', 'desc')->get();
    		return view('admin.skins.skins', ['databelt' => $data]);
    	}else{
    		return redirect('admin/login');
    	}
    }

    function addSkin(){
    	if(Auth::guard('admin')->check()){
    		return view('admin.skins.add-skin'); 
    	}else{
    		return redirect('admin/login');
    	}
    }
    

    function deleteSkin($id){
    	if(Auth::guard('admin')->check()){
    	    $id = base64_decode($id);
    	    skin::destroy($id);
                return redirect()->back()->with('success', 'Skin successfully Deleted.');
    	}else{
    		return redirect('admin/login');
    	}
    }


    function insertSkin(Request $request){
        if(Auth::guard('admin')->check()){   
            //$pdata = json_encode($price);
            //$finaldata = $price->toArray(); 
            //dd($price->lowest_price);  
                $data = $request->all();
                $filename = Skin::insert($data);

                move_uploaded_file($_FILES['thumb']['tmp_name'], base_path('dist/web/assets/images/skins/').$filename);
                return redirect()->back()->with('success', 'Skin successfully Added.');
             
        }else{
            return redirect('admin/login');
        }
    }
}
