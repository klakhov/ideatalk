<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends BaseModel
{
    protected $fillable = ['user_id', 'header', 'description', 'body'];

    static function firstDecId(){
        return Article::orderBy('id','desc')->first()->id;
    }


    static function chunkLoad($end_id, $start_id){
        return Article::orderBy('id','desc')->where([['id','>=',$end_id],['id','<=',$start_id]])->get();
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
