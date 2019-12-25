<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facade as Debugbar;
class Bookmark extends BaseModel
{
    protected $fillable = ['article_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public static function check(Article $article){
        $user = Auth::user();
        $isBookmarked = !($article->bookmarks->every(function ($bookmark) use ($user){
            return $bookmark->user_id != $user->id;
        }));
        return $isBookmarked;
    }

    public static function chunkLoad($amount)
    {
        $bookmarks = User::find(Auth::id())->bookmarks->reverse()->splice($amount, 10);
        return $bookmarks->each(function ($bookmark){
            $bookmark->article = Article::with('user')->find($bookmark->article_id);
        });
    }
}
