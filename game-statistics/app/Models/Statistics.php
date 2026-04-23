<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $fillable = [
        "game_progress",
        "hours_played",
        "started_playing",
        "ended_playing",
        "sequel_id",
        "game_id"
    ];
    protected $casts = [
       "started_playing"=>"date",
       "ended_playing"=>"date",
       "hours_played"=>"integer"
    ];
    //stat can be for many sequels
    public function sequels(){
       return $this->belongsTo(Sequel::class,"sequel_id","id");
    }
    //stat can be for many games
    public function games(){
        return $this->belongsTo(Game::class);
    }
}
