<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $table="genre";
    protected $primaryKey = 'id';
    protected $fillable = [
        "name"
    ];
    protected $casts = [
        "name"=>"string"
    ];
    //one genre can have many games
    protected function games(){
        return $this->hasMany(Game::class);
    }
}
