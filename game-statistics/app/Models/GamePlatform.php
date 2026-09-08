<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GamePlatform extends Model
{
    public $table="game_platform";
    protected $fillable = [
        "game_id",
        "platform_id"
    ];
    protected $casts = [
        "game_id"=>'integer',
        "genre_id"=>'integer'
    ];
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    public function game(){
        return $this->belongsTo(Game::class);
    }
    public function platform(){
        return $this->belongsTo(Platform::class,'platform_id');
    }
}
