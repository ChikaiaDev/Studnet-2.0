<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'url'
    ];

}
