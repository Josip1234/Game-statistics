<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sequel extends Model
{
    public $table="sequel";
    protected $fillable = [
        'game_id',
        'name',
        'game_version',
        'version_history',
         'publish_year'
        ];
    //1 sequel belogs to 1 game
    public function game(){
       return $this->belongsTo(Game::class);
    }
    //one sequel can belong to one statistics
    public function statistic(){
        return $this->hasMany(Statistics::class,"sequel_id","id");
    }
}
