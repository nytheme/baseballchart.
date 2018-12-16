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

Route::get('/', function () {
    return view('home');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//Route::get(URI, コントローラのアクション)->name(ルート名);
Route::get('home', 'HomeController@index')->name('home');
Route::get('carp.list', 'CarpListController@index')->name('carp.list');
Route::get('carp.create', 'CarpListController@create')->name('carp.create');
Route::get('carp.fielders', 'CarpFieldersController@index')->name('carp.fielders');
Route::get('carp.pitchers', 'PitchersController@index')->name('carp.pitchers');
//nameは{!! Form::model($player, ['route' => 'player.store']) !!}と同じにする
Route::post('players', 'CarpListController@store')->name('player.store');
//カープ野手成績登録
Route::get('carp.create_stats', 'StatisticsController@index')->name('carp.create_stats');
Route::post('statistics', 'StatisticsController@store')->name('statistic.store');
//カープ投手成績登録
Route::get('carp.create_p_stats', 'PitcherStatsController@index')->name('carp.create_p_stats');
Route::post('pitcher_stats', 'PitcherStatsController@store')->name('pitcher_stat.store');

Route::get('carp.fielders', 'StatisticsController@indexToFielder')->name('carp.fielders');
Route::get('carp.pitchers', 'PitcherStatsController@indexToPitcher')->name('carp.pitchers');