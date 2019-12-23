<?php

namespace App\Http\Controllers;

use App\Article;
use App\Bookmark;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facade as Debugbar;

class BookmarkController extends Controller
{
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $article = Article::find($request->article_id);
        $bookmark = $user->bookmarks->where('article_id','=',$request->article_id)->first();
        if($bookmark){
            $bookmark->delete();
        }else{
            Bookmark::create([
                'article_id'=>$article->id,
                'user_id'=>$user->id
            ]);
        }
    }

    public function index(Request $request)
    {
        $amount = $request->amount;
        $bookmarks = Bookmark::chunkLoad($amount);
        Debugbar::info($bookmarks);
        return response()->json($bookmarks);
    }

}
