<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\User;

class cryptoRefill extends Model
{
    
    protected $table = 'tbl_user_balance_refill_crypto';

    public static function makeRequest(array $data){
    	$r = new cryptoRefill;
    	$r->user_id = Auth::id();
    	$r->type = $data['cryptoType'];
    	$r->wallet_address = $data['wallet_address'];
    	$r->amount = $data['amount'];
    	$r->status = '0';
    	$r->save();
    }

    public function user()
  	{
      	return $this->belongsTo(User::class,'user_id', 'id');
  	}
}
