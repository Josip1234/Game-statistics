<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MDetail extends Model
{
    protected $table="mdetails";
    protected $fillable = [
        "description",
        "file_url",
        "mod_id"
    ];
    protected $casts = [
        "mod_id"=>"integer"
    ];
    public function modifications(){
        return $this->belongsTo(Modification::class);
    }
}
