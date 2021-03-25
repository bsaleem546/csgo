<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class wallet extends Model
{
	protected $fillable = ['user_id', 'amount', 'currency'];
	
    protected $table = "tbl_user_wallet_info";

    public static function deduct($price){
    	$d = wallet::find(Auth::user()->wallet->id);
    	$d->amount = $d->amount - $price;
    	$d->save();
    }

    public static function addBalance($id, $price){
    	$d = wallet::where('user_id', $id)->first();
    	$d->amount = $d->amount + $price;
    	$d->save();
    }
}
