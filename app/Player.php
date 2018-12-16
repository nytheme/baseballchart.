<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{   
    public function pitcher_stats()
        {
            return $this->hasMany(Pitcher_stat::class);
        }
        
    public function statistics()
        {
            return $this->hasMany(Statistic::class);
        }
        
    
}