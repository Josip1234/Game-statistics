<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameStatistic extends Model
{
    protected $table="game_statistic";
    protected $fillable = [
        "profile_id",
        "ad_stat_id",
        "save_game_file"
    ];
    public function profiles(){
        return $this->belongsTo(Profile::class);
    }
    public function advanced_statistics(){
        return $this->belongsTo(AStat::class);
    }
}
