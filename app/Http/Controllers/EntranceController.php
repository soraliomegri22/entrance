<?php

namespace App\Http\Controllers;

use App\Love;
use Illuminate\Http\Request;
use App\Women;
use App\Men;

class EntranceController extends Controller
{
    public function list()
    {
        $men_lists = Men::all();
        $women_lists = Women::all();
        return view('feeling.index', ['men_lists' => $men_lists, 'women_lists' => $women_lists]);
    }

    public function men_create()
    {
        return view('feeling.men_create');
    }

    public function women_create()
    {
        return view('feeling.women_create');
    }

    public function men_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
        ]);
        $men = new Men;
        $men->name = $request->name;
        $men->save();

        return view('feeling.store', ['status' => true]);
    }

    public function women_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
        ]);
        $women = new Women;
        $women->name = $request->name;
        $women->save();

        return view('feeling.store');
    }

#編集
    public function men_edit($id)
    {
        $men_lists = Men::find($id);
        return view('feeling.men_edit', ['men_lists' => $men_lists]);
    }

    public function men_update(Request $request)
    {
        $article = Men::find($request->id);
        $article->name = $request->name;
        $article->save();

        return view('feeling.update');
    }

    public function women_edit(Request $request, $id)
    {
        $women_lists = Women::find($id);
        return view('feeling.women_edit', ['women_lists' => $women_lists]);
    }

    public function women_update(Request $request)
    {
        $article = Women::find($request->id);
        $article->name = $request->name;
        $article->save();

        return view('feeling.update');
    }

#削除
    public function men_show(Request $request, $id)
    {
        $men_lists = Men::find($id);
        return view('feeling.men_show', ['men_lists' => $men_lists]);
    }

    public function men_delete(Request $request)
    {
        Men::destroy($request->id);
        return view('feeling.delete');
    }

    public function women_show(Request $request, $id)
    {
        $women_lists = Women::find($id);
        return view('feeling.women_show', ['women_lists' => $women_lists]);
    }

    public function women_delete(Request $request)
    {
        Women::destroy($request->id);
        return view('feeling.delete');
    }

#feeling
    #最初の確認ページ
    function feeling_start(Request $request)
    {
        #一覧用データ(ごめんなさい意外)
        $men_all_list = Men::where('id', '!=', 1)->get();
        $women_all_list = Women::where('id', '!=', 1)->get();

        #feeling相手リセット
        foreach ($men_all_list as $men) {
            $men->women_id_1 = 0;
            $men->women_id_2 = 0;
            $men->women_id_3 = 0;
            $men->save();
        }
        foreach ($women_all_list as $women) {
            $women->men_id_1 = 0;
            $women->men_id_2 = 0;
            $women->men_id_3 = 0;
            $women->save();
        }
        return view('feeling.feeling_start', ['men_all_list' => $men_all_list, 'women_all_list' => $women_all_list]);

    }

#男性
    #男性の名前確認
    public function men_correct($id)
    {
        $men = Men::find($id);

        return view('feeling.men_correct', ['men' => $men]);
    }

    #誰が気になるか３人選ぶ
    public function men_choice($id)
    {
        $men = Men::find($id);
        $women_lists = Women::all()->pluck('name', 'id');
        return view('feeling.men_choice', ['men' => $men, 'women_lists' => $women_lists]);
    }

    #データを更新する & 誰を選んだか確認する
    public function men_feeling_update(Request $request)
    {
        $article = Men::find($request->id);
        $article->women_id_1 = $request->women_id_1;
        $article->women_id_2 = $request->women_id_2;
        $article->women_id_3 = $request->women_id_3;
        $article->save();

        $feeling_women_1 = Women::find($request->women_id_1)->name ?? 'にいい人はいません';
        $feeling_women_2 = Women::find($request->women_id_2)->name ?? 'にいい人はいません';
        $feeling_women_3 = Women::find($request->women_id_3)->name ?? 'にいい人はいません';

        #次の確認
        $men_next = Men::where('id', '>', 1)
            ->where('women_id_1', 0)
            ->value('id');

        if ($men_next === null) {
            return view('feeling.men_choice_check', [
                'status' => true,
                'feeling_women_1' => $feeling_women_1,
                'feeling_women_2' => $feeling_women_2,
                'feeling_women_3' => $feeling_women_3,
                'next' => 'women_correct/' . Women::where('id', '>', 1)->first()->id
            ]);
        }
        return view('feeling.men_choice_check', [
            'status' => true,
            'feeling_women_1' => $feeling_women_1,
            'feeling_women_2' => $feeling_women_2,
            'feeling_women_3' => $feeling_women_3,
            'next' => 'men_correct/' . $men_next]);
    }

#女性
    #女性の名前確認
    public function women_correct($id)
    {
        $women = Women::find($id);

        return view('feeling.women_correct', ['women' => $women]);
    }

    #誰が気になるか３人選ぶ
    public function women_choice($id)
    {
        $women = Women::find($id);
        $men_lists = Men::all()->pluck('name', 'id');
        return view('feeling.women_choice', ['women' => $women, 'men_lists' => $men_lists]);
    }

    #データを更新する & 誰を選んだか確認する
    public function women_feeling_update(Request $request)
    {
        $article = Women::find($request->id);
        $article->men_id_1 = $request->men_id_1;
        $article->men_id_2 = $request->men_id_2;
        $article->men_id_3 = $request->men_id_3;
        $article->save();

        $feeling_men_1 = Men::find($request->men_id_1)->name ?? 'にいい人はいません';;
        $feeling_men_2 = Men::find($request->men_id_2)->name ?? 'にいい人はいません';;
        $feeling_men_3 = Men::find($request->men_id_3)->name ?? 'にいい人はいません';;

        #次の確認
        $women_next = Women::where('id', '>', 1)
            ->where('men_id_1', 0)
            ->value('id');

        if ($women_next === null) {
            return view('feeling.women_choice_check', [
                'status' => true,
                'feeling_men_1' => $feeling_men_1,
                'feeling_men_2' => $feeling_men_2,
                'feeling_men_3' => $feeling_men_3,
                'next' => 'result_check'
            ]);
        }
        return view('feeling.women_choice_check', [
            'status' => true,
            'feeling_men_1' => $feeling_men_1,
            'feeling_men_2' => $feeling_men_2,
            'feeling_men_3' => $feeling_men_3,
            'next' => 'women_correct/' . $women_next
        ]);
    }

#結果確認へ
    public function result_check()
    {

        //$love をリセットする
        $mens = Men::get();
        foreach ($mens as $men) {
            $men->love = false;
            $men->save();
        }

        $womens = Women::get();
        foreach ($womens as $women) {
            $women->love = false;
            $women->save();
        }

        return view('feeling.result_check');
    }

    #集計→結果
    public function result()
    {
        Love::query()->delete();
        $men_lists = Men::where('id', '>', 1)->get();
        $women_list = Women::where('id', '>', 1)->get();

        //1-1
        foreach ($women_list as $women) {
            print('1-1 for確認');
            print($women->love);
            if (!$women->love) {
                print('love確認');
                $target_man = Men::find($women->men_id_1);
                if ($target_man->love === 0 && $target_man->women_id_1 === $women->id) {
                    print('フィーリング確認');
                    $love = new Love();
                    $love->count = 1;
                    $love->men_name = $target_man->name;
                    $love->women_name = $women->name;
                    $love->save();
                    $target_man->love = true;
                    $target_man->save();
                    $women->love = true;
                    $women->save();
                }
            }
        }
        //1-2
        foreach ($women_list as $women) {
            print('1-2 for確認');
            if (!$women->love) {
                $target_man = Men::find($women->men_id_1);
                if ($target_man->love === 0 && $target_man->women_id_2 === $women->id) {
                    $love = new Love();
                    $love->count = 1;
                    $love->men_name = $target_man->name;
                    $love->women_name = $women->name;
                    $love->save();
                    $target_man->love = true;
                    $target_man->save();
                    $women->love = true;
                    $women->save();
                }
            }
        }
        //2-1
        foreach ($men_lists as $men) {
            if (!$men->love) {
                $target_woman = Women::find($men->women_id_1);
                if ($target_woman->love === 0 && $target_woman->men_id_2 === $men->id) {
                    $love = new Love();
                    $love->count = 1;
                    $love->women_name = $target_woman->name;
                    $love->men_name = $men->name;
                    $love->save();
                    $target_woman->love = true;
                    $target_woman->save();
                    $men->love = true;
                    $men->save();
                }
            }
        }
        //3-1
        foreach ($men_lists as $men) {
            if (!$men->love) {
                $target_woman = Women::find($men->women_id_1);
                if ($target_woman->love === 0 && $target_woman->women_id_3 === $men->id) {
                    $love = new Love();
                    $love->count = 1;
                    $love->women_name = $target_woman->name;
                    $love->men_name = $men->name;
                    $love->save();
                    $target_woman->love = true;
                    $target_woman->save();
                    $men->love = true;
                    $men->save();
                }
            }
        }
        //1-3
        foreach ($women_list as $women) {
            if (!$women->love) {
                $target_man = Men::find($women->men_id_1);
                if ($target_man->love === 0 && $target_man->women_id_3 === $women->id) {
                    $love = new Love();
                    $love->count = 1;
                    $love->men_name = $target_man->name;
                    $love->women_name = $women->name;
                    $love->save();
                    $target_man->love = true;
                    $target_man->save();
                    $women->love = true;
                    $women->save();
                }
            }
        }
        //2-2
        foreach ($women_list as $women) {
            if (!$women->love) {
                $target_man = Men::find($women->men_id_2);
                if ($target_man->love === 0 && $target_man->women_id_2 === $women->id) {
                    $love = new Love();
                    $love->count = 1;
                    $love->men_name = $target_man->name;
                    $love->women_name = $women->name;
                    $love->save();
                    $target_man->love = true;
                    $target_man->save();
                    $women->love = true;
                    $women->save();
                }
            }
        }
        //3-2
        foreach ($men_lists as $men) {
            if (!$men->love) {
                $target_woman = Women::find($men->women_id_2);
                if ($target_woman->love === 0 && $target_woman->women_id_3 === $men->id) {
                    $love = new Love();
                    $love->count = 1;
                    $love->women_name = $target_woman->name;
                    $love->men_name = $men->name;
                    $love->save();
                    $target_woman->love = true;
                    $target_woman->save();
                    $men->love = true;
                    $men->save();
                }
            }
        }
        //2-3
        foreach ($women_list as $women) {
            if (!$women->love) {
                $target_man = Men::find($women->men_id_2);
                if ($target_man->love === 0 && $target_man->women_id_3 === $women->id) {
                    $love = new Love();
                    $love->count = 1;
                    $love->men_name = $target_man->name;
                    $love->women_name = $women->name;
                    $love->save();
                    $target_man->love = true;
                    $target_man->save();
                    $women->love = true;
                    $women->save();
                }
            }
        }
        foreach ($women_list as $women) {
            if (!$women->love) {
                $target_man = Men::find($women->men_id_3);
                if ($target_man->love === 0 && $target_man->women_id_3 === $women->id) {
                    $love = new Love();
                    $love->count = 1;
                    $love->men_name = $target_man->name;
                    $love->women_name = $women->name;
                    $love->save();
                    $target_man->love = true;
                    $target_man->save();
                    $women->love = true;
                    $women->save();
                }
            }
        }
        $l = Love::get()->all();
        return view('feeling.result', ['love' => $l]);
    }

    public function result_details(Request $request)
    {
        $l = Love::get()->all();
        return view('feeling.result_details', ['feeling_success' => $l]);
    }
}
