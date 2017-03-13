<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'content', 'title', 'author_id', 'published_at',
    ];

    protected $dates = ['published_at'];

    protected $perPage = 5;

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where(function ($builder) {
        	$builder->whereNotNull('published_at')
        		->where('published_at', '<', \Carbon\Carbon::now()->toDateTimeString());
        	});
    }
}
