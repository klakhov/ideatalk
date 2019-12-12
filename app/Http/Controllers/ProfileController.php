<?php

namespace App\Http\Controllers;

use App\User;
use Barryvdh\Debugbar\Facade as Debugbar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($token)
    {
        $user = User::token($token);
        $editable = (Auth::id() == $user->id) ? 1 : 0;
        return view('profile',compact('user','editable'));
    }

    public function edit()
    {
        return view('profile_edit');
    }

    public function update(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar_path = '/uploads/avatars/';
            $avatar = $request->file('avatar');
            $avatar_name = Str::random(10).'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(130,130)->save(public_path($avatar_path.$avatar_name));
            $user = Auth::user();
            $user->avatar = $avatar_path.$avatar_name;
            $user->save();
        }
        return view('profile_edit');
    }
}
