<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\admin;
use Auth;

class skin extends Model
{
    protected $table = 'tbl_skin_info';

    public static function insert(array $data){

    	$thumbname = $data['thumb']->getClientOriginalName();
    	$thumbname = date('dmyHis').'-'.$thumbname;
    	$g = new skin;
    	$g->thumbnail = $thumbname;
    	$g->hash_name = $data['skin_name'];
    	$g->asset_id = '';
    	$g->exterior = $data['type'];
        $g->rarity = $data['rarity'];
        $g->skin_price = $data['skin_price'];
    	$g->created_by = Auth::guard('admin')->user()->id;
    	
    	$g->save();

        return $g->id.'-'.$thumbname;
    }

    public function user()
    {
        return $this->belongsTo(admin::class, 'created_by');
    }
}
