<?php

namespace App;

use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Database\Eloquent\Model;

class Article extends BaseModel
{
    protected $fillable = ['user_id', 'header', 'description', 'body', 'date','token'];
    static function firstDecId(){
        return Article::orderBy('id','desc')->first()->id;
    }


    static function chunkLoad($end_id, $start_id){
        $articles = Article::orderBy('id','desc')->where([['id','>=',$end_id],['id','<=',$start_id]])->get();
        $articles = $articles->map(function ($article){
           $article->userName = $article->user->name;
           $article->userToken = $article->user->profile_token;
           return $article;
        });
        return $articles;
    }


    public function addUserInfo()
    {
        $this->userName = $this->user->name;
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
