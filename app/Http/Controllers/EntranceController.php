<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EntranceController;
use Illuminate\Http\Request;
use App\Men;
use App\Women;

// $a = new EntranceController();
// $a->men_list_array = array(0 => '0');

class EntranceController extends Controller
{

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

#feeling
 #最初の確認ページ
    function feeling_start(Request $request) {

        #一覧用データ
        $men_all_list = Men::all();
        $women_all_list = Women::all();
        
        #男性の最初のID
        // $men_first = Men::first()->value('id');
        // print($men_first);

        #feeling相手リセット
        foreach($men_all_list as $men) {
            $men->women_id = 0;
            $men->save();
        }
        foreach($women_all_list as $women) {
            $women->men_id = 0;
            $women->save();
        }
        
        
        // return view('feeling.feeling_start', ['men_all_list' => $men_all_list, 'women_all_list' => $women_all_list ,'men_first' => $men_first, ]);
        return view('feeling.feeling_start', ['men_all_list' => $men_all_list, 'women_all_list' => $women_all_list]);

    }

     #男性の選択画面
     public function men_choice(Request $request, $id){
        $men_list = Men::find($id);
        $women_lists = Women::all()->pluck('name','id');
        return view('feeling.men_choice', ['men_list' => $men_list, 'women_lists' => $women_lists]);
        }

    #男性の確認
    public function men_correct(Request $request, $id) {

        $item = Men::where('women_id', '=', 0)->first();
        
        $men_list = Men::find($id);
        return view('feeling.men_correct', ['men_list' => $men_list]);
    }

#更新処理
    public function men_feeling_update(Request $request) {
        $article = Men::find($request->id);
        $article->women_id = $request->women_id;
        $article->save();
        $feeling_women = Women::find($request->women_id);

        #次の確認
        $men_next = Men::where('women_id', '=', 0)->value('id');

        $women_first = Women::first()->value('id');

        if (is_null($men_next)){
            return view('feeling.men_choice_check', ['feeling_women' => $feeling_women, 'next' => "women_correct/".$women_first]);
          }else{
            return view('feeling.men_choice_check', ['feeling_women' => $feeling_women, 'next' => "men_correct/".$men_next]);
        }
    }

 #保存
    public function men_choice_check(Request $request) {
        $article = Women::find($request->id);
        $article->name = $request->name;
        // $article->body = $request->body;
        $article->save();

        return view('feeling.update');
    }



    public function women_correct(Request $request, $id) {

        $item = Women::where('men_id', '=', 0)->first();
        
        $women_list = Women::find($id);
        return view('feeling.women_correct', ['women_list' => $women_list]);
    }
#女性選択画面
    public function women_choice(Request $request, $id){
        $women_list = Women::find($id);
        $men_lists = Men::all()->pluck('name','id');
        return view('feeling.women_choice', ['women_list' => $women_list, 'men_lists' => $men_lists]);
        }
        
#更新処理
    public function women_feeling_update(Request $request) {
        $article = Women::find($request->id);
        $article->men_id = $request->men_id;
        // $article->body = $request->body;
        $article->save();
        $feeling_men = Men::find($request->men_id);

        #次の確認
        $women_next = Women::where('men_id', '=', 0)->value('id');

        print($women_next);

        if (is_null($women_next)){
            return view('feeling.men_choice_check', ['feeling_women' => $feeling_men, 'next' => "result_check"]);
        }else{
            return view('feeling.men_choice_check', ['feeling_women' => $feeling_men, 'next' => "women_correct/".$women_next]);
        }
    }

    public function result_check(Request $request) {
        #お互いに選んでいる人がいたらそのデータを渡す
        #いなかったら「残念でした」を渡す
        $feeling_success = [];
        $men_lists = Men::all();
        $women_lists = Women::all();

        foreach($men_lists as $men) {
            $feeling_women = Women::find($men->women_id);
            
            if($feeling_women->men_id == $men->id){
                $feeling_success[] = array('men'=> $men->name, 'women'=> $feeling_women->name);
            }
        }
        return view('feeling.result', ['feeling_success' => $feeling_success]);

    }   

    public function result_details(Request $request) {

        $feeling_success = [];
        $men_lists = Men::all();
        $women_lists = Women::all();

        foreach($men_lists as $men) {
            $feeling_women = Women::find($men->women_id);
            
            if($feeling_women->men_id == $men->id){
                $feeling_success[] = array('men'=> $men->name, 'women'=> $feeling_women->name);
            }
        }
        return view('feeling.result_details', ['feeling_success' => $feeling_success]);

    }   

}   
