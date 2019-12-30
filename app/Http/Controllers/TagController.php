<?php

namespace App\Http\Controllers;
use Barryvdh\Debugbar\Facade as Debugbar;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function search(Request $request)
    {
        return response()->json(Tag::search($request->name));
    }

    public function index()
    {
        return response()->json(Tag::all());
    }

    public function show($name)
    {
        $tag = Tag::getByName($name);
        return view('tag',compact('tag'));
    }

    public function load(Request $request)
    {
        $tag = Tag::getByName($request->name);
        $articles = $tag->chunkLoad($request->amount);
        return response()->json($articles);
    }
}
