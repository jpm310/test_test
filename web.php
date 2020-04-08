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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@authenticate');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/menu', 'Auth\MenuController@menuShow')->name('menu');

Route::prefix('batch')->middleware('auth', 'can:all-user')->group(function () {
  Route::get('/', 'Auth\BatchController@showMainForm')->name('batch');
  Route::get('/search', function () {
    return redirect()->route('login');
  });
  Route::post('/search', 'Auth\BatchController@showSearchResult')->name('batch_search');
  Route::get('/complete', function () {
    return redirect()->route('login');
  });
  Route::post('/complete', 'Auth\BatchController@showComplete')->name('batch_complete');
});


//受験地一覧表示
Route::prefix("area_master")->middleware("auth", "can:all-user")->group(function () {

  Route::match(['get', 'post'],"/list","Auth\AreaMasterController@showListForm")->name("area_master_list");

  Route::match(['get', 'post'],"/list/search_aft","Auth\AreaMasterController@showListSearchForm")->name("area_master_list_search_aft");

  Route::post("/list/search_aft2", "Auth\AreaMasterController@showListSearch2Form")->name("area_master_list_search_aft2");
});
