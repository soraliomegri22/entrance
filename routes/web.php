<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/young', 'WakamonoController@index')->name('young');
Route::get('/young/add', 'WakamonoController@add')->name('young-add');

Route::post('/young', 'WakamonoController@store')->middleware('auth');

# 入力画面
// Route::get('request/', [
//     'uses' => 'InsertDemoController@getIndex',
//     'as' => 'insert.index'
//   ]);
   
//   # 確認画面
//   Route::post('request/confirm', [
//     'uses' => 'InsertDemoController@confirm',
//     'as' => 'insert.confirm'
//   ]);

//   Route::get("/gathers", "WomenController@getCreate");

Route::get('/men/add', 'MenController@add')->name('men_add');
Route::post('/men/add', 'MenController@create')->name('article_create');

Route::get('/women/add', 'WomenController@add')->name('women_add');
Route::post('/women/add', 'WomenController@create')->name('article_create');

Route::get('/list','EntranceController@list');

Route::get('men_create', 'EntranceController@men_create');
Route::post('men_create', 'EntranceController@men_store');
Route::get('women_create', 'EntranceController@women_create');
Route::post('women_create', 'EntranceController@women_store');

Route::get('men_edit/{id}', 'EntranceController@men_edit');
Route::post('men_edit', 'EntranceController@men_update');
Route::get('women_edit/{id}', 'EntranceController@women_edit');
Route::post('women_edit', 'EntranceController@women_update');

Route::get('men_delete/{id}', 'EntranceController@men_show');
Route::post('men_delete', 'EntranceController@men_delete');
Route::get('women_delete/{id}', 'EntranceController@women_show');
Route::post('women_delete', 'EntranceController@women_delete');


#スタートを押す
Route::get('feeling_start', 'EntranceController@feeling_start');

#
// Route::get('men_create_feeling', 'EntranceController@men_feeling_update');

#男性確認
Route::get('men_correct/{id}', 'EntranceController@men_correct');

// Route::post('men_create_feeling', 'EntranceController@men_feeling_update');

#男性選択画面
Route::get('men_choice/{id}', 'EntranceController@men_choice');
Route::post('men_choice', 'EntranceController@men_feeling_update');

#女性確認
Route::get('women_correct/{id}', 'EntranceController@women_correct');
#女性選択画面
Route::get('women_choice/{id}', 'EntranceController@women_choice');
Route::post('women_choice', 'EntranceController@women_feeling_update');

#結果確認前
Route::get('result_check', 'EntranceController@result_check');

#結果確認
Route::get('result', 'EntranceController@result');

#結果発表詳細
Route::get('result_details', 'EntranceController@result_details');

// Route::get('men_edit/{id}', 'EntranceController@men_edit');
// Route::post('men_edit', 'EntranceController@men_feeling_update');