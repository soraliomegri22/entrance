<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Men;

class MenController extends Controller
{
    public function add()
    {
        return view('article.add');
    }

    public function create(Request $request)
    {
        $article = new Men;
        $article->name = $request->name;
        $article->save();
        return redirect('/');
    }
}
