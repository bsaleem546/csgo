<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giveawayParticipate extends Model
{
    protected $table = 'tbl_giveaway_participate';

    protected $fillable = ['ga_id', 'user_id', 'invoice_id'];
}
