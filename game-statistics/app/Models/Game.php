<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table="game";
    protected $fillable = [
        "name",
        "yearOrRangeOfProduction",
        'user_id',
        'have_sequel',
        'genre_id',
        'platform_id'
    ];
    protected $casts = [
        'have_sequel'=>'integer',
        'genre_id'=>'integer'
    ];
    //one game belongs to one user
    public function user(){
        $this->belongsTo(User::class);
    }
    //one game can have more sequels
    public function sequels(){
        $this->hasMany(Sequel::class);
    }
    //one game can have more statistics
    public function statistics(){
        $this->belongsTo(Statistics::class);
    }
    //game can have one genre
    public function genre(){
        return $this->belongsTo(Genre::class,'genre_id','id');
    }
    //one game belongs to one platform
    public function platform(){
        return $this->belongsTo(Platform::class,'platform_id','id');
    }
    //one game has many profiles
    public function profiles(){
        return $this->hasMany(Profile::class);
    }
    //one game can have more modifications
    public function game(){
        return $this->hasMany(Modification::class);
    }
    //one game can have many hame_genres
    public function game_genres(){
        return $this->hasMany(Game_Genre::class);
    }
}
