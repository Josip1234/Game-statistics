<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game_Genre extends Model
{
    public $table="game_genre";
    
    protected $fillable = [
        "game_id",
        "genre_id"
    ];
    protected $casts = [
        "game_id"=>'integer',
        "genre_id"=>'integer'
    ];
    public function game(){
        return $this->BelongsTo(Game::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
