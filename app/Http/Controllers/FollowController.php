<?php

namespace App\Http\Controllers;

use App\Follow;
use App\User;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        $user_to_follow = User::find($request->user_to_follow_id);
        $user = User::find(Auth::id());
        if(!Follow::check($user_to_follow)){
            $follow = Follow::create([
                'followed_id'=>$user_to_follow->id,
            ]);
            $user->addFollow($follow);
            return response()->json(true);
        }else{
            $user->removeFollow($user_to_follow);
            return response()->json(false);
        }
    }
}
