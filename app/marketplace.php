<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\skin;
use App\User;
use App\marketSale;

class marketplace extends Model
{
    protected $table = 'tbl_marketplace_info';

    public static function addSkin($skin, $stprice, $sprice){
    	$m = new marketplace;
    	$m->skin_id = $skin;
      $m->price = $sprice;
      $m->sugg_price = $stprice;
    	$m->status = '1';
    	$m->created_by = Auth::guard('admin')->user()->id;
    	$m->save();

    }


    public function sale()
    {
        return $this->hasMany(marketSale::class,'market_id', 'id');
    }

    public function skin()
  	{
      	return $this->belongsTo(skin::class,'skin_id', 'id');
  	}


    public function user()
  	{
      	return $this->belongsTo(User::class,'created_by', 'id');
  	}
}
