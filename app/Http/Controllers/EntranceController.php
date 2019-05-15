<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Men;
use App\Women;

class EntranceController extends Controller
{
    // public function list(Request $request)
    // {
    // # greetingsテーブルのレコードを全件取得
    // $men_data = Men::all();
    // $women_data = Women::all();
    // # data連想配列に代入&Viewファイルをlist.blade.phpに指定
    // return view('article.list', ['data' => $men_data]);
    // }
    
    public function list() {

        $men_lists = Men::all();
        $women_lists = Women::all();
        return view('feeling.index', ['men_lists' => $men_lists, 'women_lists' => $women_lists]);
    }

    public function men_create() {
        return view('feeling.men_create');
    }

    public function women_create() {
        return view('feeling.women_create');
    }

    public function men_store(Request $request) {
        $men = new Men;
        $men->name = $request->name;
        $men->save();
    
        return view('feeling.store');
    }

    public function women_store(Request $request) {
        $women = new Women;
        $women->name = $request->name;
        $women->save();
    
        return view('feeling.store');
    }

#編集
    public function men_edit(Request $request, $id) {
        $men_lists = Men::find($id);
        return view('feeling.men_edit', ['men_lists' => $men_lists]);
    }

    public function men_update(Request $request) {
        $article = Men::find($request->id);
        $article->name = $request->name;
        // $article->body = $request->body;
        $article->save();

        return view('feeling.update');
    }

    public function women_edit(Request $request, $id) {
        $women_lists = Women::find($id);
        return view('feeling.women_edit', ['women_lists' => $women_lists]);
    }

    public function women_update(Request $request) {
        $article = Women::find($request->id);
        $article->name = $request->name;
        // $article->body = $request->body;
        $article->save();

        return view('feeling.update');
    }

#削除
    public function men_show(Request $request, $id) {
        $men_lists = Men::find($id);
        return view('feeling.men_show', ['men_lists' => $men_lists]);
    }

    public function men_delete(Request $request) {
        Men::destroy($request->id);
        return view('feeling.delete');
    }

    public function women_show(Request $request, $id) {
        $women_lists = Women::find($id);
        return view('feeling.women_show', ['women_lists' => $women_lists]);
    }

    public function women_delete(Request $request) {
        Women::destroy($request->id);
        return view('feeling.delete');
    }

}
