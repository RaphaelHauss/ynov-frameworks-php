<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'content', 'title', 'author_id', 'published_at',
    ];

    protected $dates = ['published_at'];
}
