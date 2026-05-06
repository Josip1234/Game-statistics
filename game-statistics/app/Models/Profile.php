<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table="profile";
    protected $fillable = [
        "profile_name",
        "game_id",
        "sequel_id"
    ];
    protected $casts = [
        "game_id"=>'integer',
        "sequel_id"=>'integer'
    ];
    public function game(){
        return $this->belongsTo(Game::class);
    }
    public function sequel(){
        return $this->belongsTo(Sequel::class);
    }
}
