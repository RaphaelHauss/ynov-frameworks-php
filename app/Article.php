<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kblais\QueryFilter\FilterableTrait;

class Article extends Model
{
    use SoftDeletes, Sluggable, FilterableTrait;

    protected $fillable = [
    	'content', 'title', 'author_id', 'published_at',
    ];

    protected $dates = ['published_at'];

    protected $perPage = 5;

    protected $appends = ['apiUrl'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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

    public function getApiUrlAttribute()
    {
        return route('api.article.show', [$this]);
    }
}
