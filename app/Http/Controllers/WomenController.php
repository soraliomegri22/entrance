<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Women;

class WomenController extends Controller
{
    public function add()
    {
        return view('article.women_add');
    }

    public function create(Request $request)
    {
        $article = new Women;
        $article->name = $request->name;
        $article->save();
        return redirect('/');
    }
}
