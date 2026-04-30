<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $table="genre";
    protected $fillable = [
        "name"
    ];
    //one genre can have many games
    protected function games(){
        return $this->hasMany(Game::class);
    }
}
