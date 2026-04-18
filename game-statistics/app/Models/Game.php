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
}
