<?php

namespace App\Http\Controllers;

use App\Follow;
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
        $user->follows_count = $user->follows->count();
        $user->followedBy = $user->followedBy();
        $props = json_encode([
            'editable'=>Auth::id() == $user->id,
            'followed'=>Follow::check($user),
        ]);
        return view('profile',compact('user','props'));
    }

    public function edit()
    {
        return view('profile_edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if($request->hasFile('avatar')){
            $avatar_path = '/uploads/avatars/';
            $avatar = $request->file('avatar');
            $avatar_name = Str::random(10).'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(130,130)->save(public_path($avatar_path.$avatar_name));
            $user->avatar = $avatar_path.$avatar_name;
        }
        $user->bio = $request->bio;
        $user->save();
        return view('profile_edit');
    }

    public function publications(Request $request)
    {
        $user = User::token($request->token);
        $articles = $user->publicationsChunkLoad($request->amount);
        return response()->json($articles);
    }
}
