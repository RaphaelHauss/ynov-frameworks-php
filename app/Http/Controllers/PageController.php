<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
    	$articles = Article::published()
    		->with('author')
    		->whereHas('author', function ($query) {
    			$query->where('name', 'Killian lais');
    		})
    		->paginate(10);

        return view('hello', compact('articles'));
    }
}
