<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table="platform";
    protected $fillable = [
        "name",
        "platform_history"
    ];
    //on one platform can play many games
    public function games(){
        return $this->hasMany(Game::class);
    }
}
