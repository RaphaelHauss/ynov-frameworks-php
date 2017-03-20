<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\Comment\StoreRequest;

class CommentController extends Controller
{
    public function store(StoreRequest $request, Article $article)
    {
    	$comment = new Comment($request->all());
    	$comment->author_id = $request->user()->id;
    	$article->comments()->save($comment);

    	return redirect()->route('article.show', [$article]);
    }
}
