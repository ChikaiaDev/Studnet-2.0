<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    protected $fillable = [
        'series_id'
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
