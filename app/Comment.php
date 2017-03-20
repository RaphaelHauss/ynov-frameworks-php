<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use SoftDeletes;

    protected $fillable = ['author_id', 'article_id', 'content'];

    public function article()
    {
    	return $this->belongsTo(Article::class);
    }

    public function author()
    {
    	return $this->belongsTo(User::class);
    }
}
