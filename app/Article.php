<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends BaseModel
{
    protected $fillable = ['user_id', 'header', 'description', 'body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
