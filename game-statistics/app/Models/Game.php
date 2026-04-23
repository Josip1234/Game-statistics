<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table="game";
    protected $fillable = [
        "name",
        "yearOrRangeOfProduction",
        'user_id'
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

}
