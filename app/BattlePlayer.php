<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Battle;

class BattlePlayer extends Model
{
    protected $table = 'tbl_battle_player';


    public function battle()
    {
        return $this->belongsTo(Battle::class,'id', 'battle_id');
    }

    public function user()
	{
	    return $this->belongsTo(User::class,'play_user_id_', 'id');
	}
}
