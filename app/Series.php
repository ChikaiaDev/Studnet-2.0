<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';

    public $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function videos(){
        return $this->hasMany(Video::class)->orderBy('episode_number','asc');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    
    public function subscriptions(){
        return $this->hasMany('App\Subscriptions');
    }

    
    public function subscriptionsCount(){
        return $this->subscriptions->count();
    }
}
