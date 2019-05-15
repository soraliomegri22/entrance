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