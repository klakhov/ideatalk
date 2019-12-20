<?php

namespace App;

use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class Article extends BaseModel
{
    protected $fillable = ['user_id', 'header', 'description', 'body', 'date','token'];
    protected $casts = ['images' => 'array'];

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
        $articles->each(function ($item){
            $item->tagList = array_map(function ($elem){return $elem['name'];}, $item->tags->toArray());
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

    public function imageSelfConstruct($image)
    {
        $images_path = '/uploads/previews/'.Str::random(10);
        File::makeDirectory(public_path($images_path));
        $extention = $image->getClientOriginalExtension();

        $image_def = $images_path.'/'.Str::random(10).'.'.$extention;
        $image_150 = $images_path.'/'.Str::random(10).'.'.$extention;
        $image_90 = $images_path.'/'.Str::random(10).'.'.$extention;
        $image_300_200 = $images_path.'/'.Str::random(10).'.'.$extention;

        Image::make($image)->save(public_path($image_def));
        Image::make($image)->fit(150,150)->save(public_path($image_150));
        Image::make($image)->fit(90,90)->save(public_path($image_90));
        Image::make($image)->fit(300,200)->save(public_path($image_300_200));

        $images['image_def'] = $image_def;
        $images['image_150'] = $image_150;
        $images['image_90'] = $image_90;
        $images['image_300_200'] = $image_300_200;
        $this->images = $images;
        $this->save();
        Debugbar::info($this->images);
    }
}
