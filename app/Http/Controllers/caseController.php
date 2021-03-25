<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\cases;
use App\caseDetail;
use App\skin;

class caseController extends Controller
{
    
    function index(){
    	if(Auth::guard('admin')->check()){
    		$data = cases::orderBy('id', 'desc')->withCount(['detail'])->get();
    		return view('admin.cases.cases', ['databelt' => $data]);
    	}else{
    		return redirect('admin/login');
    	}
    }

    function addCase(){
    	if(Auth::guard('admin')->check()){
            $skin = skin::orderBy('hash_name', 'asc')->get();
    		return view('admin.cases.add-case', ['skins' => $skin]);
    	}else{
    		return redirect('admin/login');
    	}
    }
    function deleteCase($id){
        if(Auth::guard('admin')->check()){
            $id = base64_decode($id);
            $skin = cases::destroy($id);
            return redirect()->back()->with('success', 'Case successfully deleted.');
        }else{
            return redirect('admin/login');
        }
    }


    function insertCase(Request $request){
        if(Auth::guard('admin')->check()){

            $data = $request->all();
            $filename = cases::insert($data);
            $case_id = explode('-', $filename);
            move_uploaded_file($_FILES['thumb']['tmp_name'], base_path('dist/web/assets/images/cases/').$filename);

            $skinid = $request->input('skinid');
            $sods = $request->input('sods');

            $c = count($skinid);
            for ($i=0; $i<$c; $i++) {
            	$sdata = array();
            	$sdata = [
            		'case_id' => $case_id[0],
            		'skin_id' => $skinid[$i],
            		'odds' => $sods[$i],
            	];

            	$q = caseDetail::insert($sdata);

		    }

            return redirect()->back()->with('success', 'Case successfully created.');
        }else{
            return redirect('admin/login');
        }
    }
    
    function editCase($id){
        if(Auth::guard('admin')->check()){
            $id = base64_decode($id);
            $data = cases::find($id);
            $totalodds = caseDetail::where('case_id', $id)->sum('odds');
            $skin = skin::orderBy('hash_name', 'asc')->get();
            return view('admin.cases.edit-case', ['data' => $data, 'skins' => $skin, 'totalodds' => $totalodds]);
        }else{
            return redirect('admin/login');
        }
    }


    

    function updateCase(Request $request){
        if(Auth::guard('admin')->check()){

            $data = $request->all();
            $caseId = base64_decode($data['case_id']);
            $imgup = $request->hasFile('thumb') ? '1' : '0';
            $filename = cases::updateCase($caseId, $data, $imgup);
            if($request->hasFile('thumb')){
                move_uploaded_file($_FILES['thumb']['tmp_name'], base_path('dist/web/assets/images/cases/').$filename);
            }
            $skinid = $request->input('skinid');
            $sods = $request->input('sods');
            caseDetail::where('case_id', $caseId)->delete();
            $c = count($skinid);
            for ($i=0; $i<$c; $i++) {
                $sdata = array();
                $sdata = [
                    'case_id' => $caseId,
                    'skin_id' => $skinid[$i],
                    'odds' => $sods[$i],
                ];

                $q = caseDetail::insert($sdata);

            }

            return redirect()->back()->with('success', 'Case successfully Updated.');
        }else{
            return redirect('admin/login');
        }
    }
}
