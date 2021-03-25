<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\skin;

class inventory extends Model
{
    protected $table = 'tbl_user_inventory';

    public static function addItem($skin){
    	$i = new inventory;
    	$i->user_id = Auth::user()->id;
    	$i->skin_id = $skin;
    	$i->save();
    }

    public static function battlewin($id, $skin){
        $i = new inventory;
        $i->user_id = $id;
        $i->skin_id = $skin;
        $i->save();
    }

    public function skin(){
        return $this->belongsTo(skin::class, 'skin_id', 'id');
    }
}
