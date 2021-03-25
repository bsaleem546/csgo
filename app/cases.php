<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\caseDetail;
use App\caseCategory;
use App\admin;

class cases extends Model
{
    protected $table = 'tbl_case_info';

    public static function insert(array $data){

    	$thumbname = $data['thumb']->getClientOriginalName();
    	$thumbname = date('dmyHis').'-'.$thumbname;
    	$g = new cases;
    	$g->thumbnail = $thumbname;
    	$g->label = $data['label'];
    	$g->price = $data['price'];
        $g->currency_id = '1';
    	$g->expiry_date = $data['expiry'];
        $g->category_id = $data['category'];
        $g->status = '1';
    	$g->created_by = Auth::guard('admin')->user()->id;
    	
    	$g->save();
        
        return $g->id.'-'.$thumbname;
    }
    
    public static function updateCase($caseId, array $data, $st){
        if($st == 1){
            $thumbname = $data['thumb']->getClientOriginalName();
            $thumbname = date('dmyHis').'-'.$thumbname;
        }else{
            $thumbname = $data['old_thumb'];
        }
        $g = cases::find($caseId);
        $g->thumbnail = $thumbname;
        $g->label = $data['label'];
        $g->price = $data['price'];
        $g->expiry_date = $data['expiry'];
        $g->category_id = $data['category'];
        
        $g->save();
        
        return $g->id.'-'.$thumbname;
    }


    public function category()
    {
        return $this->belongsTo(caseCategory::class,'category_id');
    }

    public function detail()
    {
        return $this->hasMany(caseDetail::class,'case_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(admin::class,'created_by');
    }
}
