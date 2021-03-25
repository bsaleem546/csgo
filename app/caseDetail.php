<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\skin;

class caseDetail extends Model
{
    protected $table = 'tbl_case_detail_info';

    public $timestamps = false;

    public static function insert(array $data){

    	$g = new caseDetail;
    	$g->case_id = $data['case_id'];
    	$g->skin_id = $data['skin_id'];
    	$g->odds = $data['odds'];
    	
    	$g->save();
    }

    public function skin()
    {
        return $this->belongsTo(skin::class, 'skin_id');
    }
}
