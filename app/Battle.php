<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\BattleDetail;
use App\BattlePlayer;
use App\User;

class Battle extends Model
{
     protected $table = 'tbl_battle';

     public static function insertBattle(array $data){

     	$battle = new Battle;
        $battle->user_id 	= Auth::id();
        $battle->save();
       	$battleid = $battle->id;


       	$cases = $data['caseid'];
       	$qty = $data['qty'];

       	Battle::insertBattleDetail($battleid, $cases, $qty);
        Battle::insertBattlePlayer($battleid, Auth::id());

       	return $battleid;

     }

     public static function insertBattlePlayer($id, $playerid){
        $battleplay = new BattlePlayer;
        $battleplay->play_user_id_  = $playerid;
        $battleplay->battle_id    = $id;
        $battleplay->save();
      return true;

     }

     public static function insertBattleDetail($id, array $cases, array $qty){
     	$x = count($cases);
     	for($i=0; $i<$x; $i++){
	     	$b = new BattleDetail;
	     	$b->case_id = $cases[$i];
	     	$b->qty = $qty[$i];
	     	$b->battle_id = $id;
	     	$b->save();
	    }
	    return true;

     }

     public function battleinfo()
    {
        return $this->hasMany(BattleDetail::class,'battle_id', 'id');
    }

    public function players()
	{
	    return $this->hasMany(BattlePlayer::class,'battle_id', 'id');
	}

    public function user()
  {
      return $this->belongsTo(User::class,'user_id', 'id');
  }
}
