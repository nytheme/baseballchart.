<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pitcher_stat extends Model
{
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
