<?php

namespace App\Http\Controllers;

use App\Article;
use App\Bookmark;
use App\Follow;
use App\Http\Requests\StoreArticle;
use App\Point;
use App\Tag;
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
        $article = Article::create([
            'header'=>$validated['title'],
            'body'=>$validated['body'],
            'description'=>$validated['description'],
            'user_id' => Auth::user()->id,
            'date' => $date["month"]." ".$date["mday"],
            'token'=>Str::random(25),
        ]);
        $article->imageConstruct($request->file('preview'));
        $tags = array_map(function ($item){
            return (int)$item;
        }, explode(',', $validated['tags']));
        foreach ($tags as $tag_id){
            $article->tags()->attach($tag_id);
        }
    }

    public function show($token)
    {
        $article=Article::token($token);
        $props = json_encode([
            'pointed' => Point::check($article),
            'bookmarked' => Bookmark::check($article),
            'followed' => Follow::check($article->user),
            'points_count' => $article->points->count(),
        ]);
        return view('article_show',compact('article','props'));
    }

    public function featured()
    {
        $articles = Article::featured();
        return view('featured',compact('articles'));
    }

    public function subFeatured()
    {
        return ['best'=>Article::bestFeatured(),
                'other'=>Article::otherFeatured()];
    }

}
