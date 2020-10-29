<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        
        'title',
        'description',
        'episode_number',
        'series_id'
    ];
    public function series(){
        return $this->belongsTo(Series::class);
    }
}
