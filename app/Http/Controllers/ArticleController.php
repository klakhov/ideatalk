<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = factory(Article::class,10)->make();
        return response()->json($articles);
    }
}
