<?php

namespace App\Http\Controllers;

use App\Article;
use App\Point;
use App\User;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller

{
    public function store(Request $request)
    {
        $article = Article::find($request->article_id);
        $user = User::find(Auth::id());
        $point = $user->points->where('article_id','=',$request->article_id)->first();
        if($point){
            $point->delete();
        }else{
            Point::create([
                'article_id'=>$article->id,
                'user_id' => $user->id,
            ]);
        }
    }
}
