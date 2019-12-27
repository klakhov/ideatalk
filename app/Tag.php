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

}
