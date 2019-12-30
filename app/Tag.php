<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Barryvdh\Debugbar\Facade as Debugbar;

class Tag extends BaseModel
{
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public static function search($name)
    {
        $tags =  Tag::all()->filter(function($tag) use ($name){
                return stristr($tag->name,$name);
        });
        if(count($tags)>5) return $tags->take(5);
        return $tags;
    }

    public static function getByName($name)
    {
        return Tag::where('name',$name)->first();
    }

    public function chunkLoad($amount)
    {
        $articles = $this->articles->reverse()->splice($amount,9);
        $articles->each(function ($item) {
            $item->user;
        });
        return $articles;
    }
}
