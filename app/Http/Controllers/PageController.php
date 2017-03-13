<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
    	$articles = Article::all();

        return view('hello', compact('articles'));
    }
}
