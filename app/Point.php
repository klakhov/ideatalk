<?php

namespace App;

use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\Auth;

class Point extends BaseModel
{
    protected $fillable = ['article_id', 'user_id'];
    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function check(Article $article){
        $user = Auth::user();
        $isPointed = !($article->points->every(function ($point) use ($user){
           return $point->user_id != $user->id;
        }));
        return $isPointed;
    }
}
