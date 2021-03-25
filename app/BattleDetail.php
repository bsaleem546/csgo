<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Battle;
use App\cases;

class BattleDetail extends Model
{
    protected $table = 'tbl_battle_detail';

    public function battle()
    {
        return $this->belongsTo(Battle::class,'id', 'battle_id');
    }

    public function case()
    {
        return $this->belongsTo(cases::class,'case_id', 'id');
    }
}
