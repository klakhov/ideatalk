<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follow extends BaseModel
{
    protected $fillable = ['followed_id'];
    public function followed()
    {
        return $this->hasOne(User::class,'followed_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function check(User $toFollow)
    {
        $user = User::find(Auth::id());
        if($user->follows->where('followed_id','=',$toFollow->id)->first()) return true;
        return false;
    }

}
