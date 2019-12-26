<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','profile_token','followers','bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    static function token($token){
        return User::where('profile_token','=',$token)->first();
    }


    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function points()
    {
       return $this->hasMany('App\Point');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }

    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    public function publicationsChunkLoad($amount)
    {
        $articles = $this->articles->reverse()->splice($amount,10);
        $user = User::find(Auth::id());
        $articles->each(function ($item) use($user){
            $item->bookmarked = !($item->bookmarks->every(function($bookmark) use ($user) {return $bookmark->user_id != $user->id;}));
            $item->pointed = !($item->points->every(function($bookmark) use ($user) {return $bookmark->user_id != $user->id;}));
            $item->points_count = $item->points->count();
        });
        return $articles;
    }

    public function addFollow(Follow $follow)
    {
        return $this->follows()->save($follow);
    }

    public function removeFollow(User $user)
    {
        $follow = $this->follows->where('followed_id','=' ,$user->id)->first();
        $follow->delete();
    }

    public function followedBy()
    {
        return Follow::where('followed_id', '=', $this->id)->count();
    }

}
