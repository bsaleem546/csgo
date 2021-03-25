<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\marketplace;
use Auth;

class marketSale extends Model
{
    protected $table = 'tbl_marketplace_sale';

    public static function insertSale($id, $price){
    	$m = new marketSale;
    	$m->market_id = $id;
    	$m->user_id = Auth::user()->id;
    	$m->price = $price;
    	$m->save();
    }

    public function market()
  	{
      	return $this->belongsTo(marketplace::class,'market_id', 'id');
  	}
}
