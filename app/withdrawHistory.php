<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\skin;
use App\User;

class withdrawHistory extends Model
{
    protected $table = 'tbl_user_withdraw_history';

    public static function insert(array $data){
        $market = empty($data['market']) ? '0' : '1';
        $price = empty($data['price']) ? '0' : $data['price'];
    	$i = new withdrawHistory;
    	$i->user_steam_id = $data['steamid'];
    	$i->user_id = Auth::user()->id;
    	$i->item_id = $data['itemid'];
    	$i->skin_id = $data['skinid'];
    	$i->trade_id = $data['tradeid'];
        $i->status = $data['status'];
    	$i->type = $data['type'];
        $i->market = $market;
        $i->mp_price = $price;
    	$i->save();
    }
    
    public static function updateStatus($tradeId, $status){
    	$i = withdrawHistory::where('trade_id', $tradeId)->first();
    	$i->status = $status;
    	$i->save();
    }

    public function skin(){
        return $this->belongsTo(skin::class, 'skin_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_steam_id', 'steamid');
    }
}
