<?php

namespace App\Http\Controllers;
use Barryvdh\Debugbar\Facade as Debugbar;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Tag::search($request->name));
    }
}
