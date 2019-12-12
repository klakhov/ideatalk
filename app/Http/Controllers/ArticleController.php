<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $amount = $request->amount;
        $first_id = Article::firstDecId();
        $start_id = $first_id - $amount;
        $end_id = ($start_id - 10)>0 ? ($start_id - 10) : 1;
        $articles = Article::chunkLoad($end_id, $start_id);
        return response()->json($articles);
    }
}
