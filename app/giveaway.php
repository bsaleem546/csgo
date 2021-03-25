<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\support\giveawayType;
use App\giveawayParticipate;
use App\skin;
use Auth;
use Storage;

class giveaway extends Model
{
    protected $table = 'tbl_giveaway_info';

    public static function insert(array $data){

        $datetime = explode(' - ', $data['datetimes']);
        $from = date('Y-m-d H:i:s', strtotime($datetime[0]));
        $to = date('Y-m-d H:i:s', strtotime($datetime[1]));
    	$g = new giveaway;
    	$g->label = $data['label'];
    	$g->skin_id = $data['skinid'];
    	$g->price = $data['price'];
    	$g->type_id = $data['type'];
        $g->start_from = $from;
        $g->end_to = $to;
        $g->status = '1';
    	$g->created_by = Auth::guard('admin')->user()->id;
    	
    	$g->save();
    }

    public function type()
    {
        return $this->belongsTo(giveawayType::class, 'type_id');
    }

    public function skin()
    {
        return $this->belongsTo(skin::class, 'skin_id');
    }

    public function participate()
    {
        return $this->hasMany(giveawayParticipate::class, 'ga_id', 'id');
    }
}
