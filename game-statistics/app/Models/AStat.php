<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AStat extends Model
{
    protected $table="advanced_statistics";
    protected $fillable = [
        "statistic_id",
        "file_name",
        "file_url"
    ];
    protected $casts = [
        "statistic_id"=>"integer"
    ];
    public function statistics(){
        return $this->belongsTo(Statistics::class);
    }
}
