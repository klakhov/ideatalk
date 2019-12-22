<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Barryvdh\Debugbar\Facade as Debugbar;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','profile_token','followers','bio','bookmarks'
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
        'bookmarks'=>'array'
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

}
