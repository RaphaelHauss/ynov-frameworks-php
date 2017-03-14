<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

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
        		->where('published_at', '<', Carbon::now()->toDateTimeString());
        	});
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y', $date)
            ->toDateTimeString();
    }
}
