<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    protected $table="modification";
    protected $fillable = [
        "name",
        "game_id",
        "sequel_id"
    ];
    protected $casts = [
       "game_id"=>'integer',
       "sequel_id"=>'integer' 
    ];
    public function games(){
        return $this->hasMany(Game::class);
    }
    public function sequels(){
        return $this->hasMany(Sequel::class);
    }
}
