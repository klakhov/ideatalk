<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\StoreArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $amount = $request->amount;
        $first_id = Article::firstDecId();
        $start_id = $first_id - $amount;
        $end_id = ($start_id - 10)>0 ? ($start_id - 10) : 1;
        $articles = Article::chunkLoad($end_id, $start_id);
        return response()->json($articles);
    }

    public function create()
    {
        return view('article_create');
    }

    public function store(StoreArticle $request)
    {
        $date = getdate();
        $validated = $request->validated();
        Article::create([
            'header'=>$validated->title,
            'body'=>$validated->body,
            'description'=>$validated->description,
            'user_id' => Auth::user()->id,
            'date' => $date["month"]." ".$date["mday"],
            'token'=>Str::random(25),
        ]);
    }
}
