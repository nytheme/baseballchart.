<?php

Route::get('/', function () { return view('home'); });
//ログイン関連
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//Route::get(URI, コントローラのアクション)->name(ルート名);
Route::get('home', 'HomeController@index')->name('home');

//カープ選手リスト
Route::get('carp.list', 'CarpListController@index')->name('carp.list');
Route::get('carp.create', 'CarpListController@indexCreate')->name('carp.create');
Route::delete('carp.pitcher/{id}', 'CarpPitchersController@destroy')->name('pitcher.destroy');
Route::delete('carp.fielder/{id}', 'CarpFieldersController@destroy')->name('fielder.destroy');
 
//カープ野手成績登録
Route::get('carp.create_stats', 'CarpFieldersController@indexCreate_stats')->name('carp.create_stats');
Route::post('statistics', 'CarpFieldersController@store')->name('statistic.store');
//カープ投手成績登録
Route::get('carp.create_p_stats', 'CarpPitchersController@indexCreate_p_stats')->name('carp.create_p_stats');
Route::post('pitcher_stats', 'CarpPitchersController@store')->name('pitcher_stat.store');
//カープ成績ページ
Route::get('carp.fielders', 'CarpFieldersController@indexFielders')->name('carp.fielders');
Route::get('carp.fielder', 'CarpFieldersController@indexFielder')->name('carp.fielder');
Route::get('carp.pitchers', 'CarpPitchersController@indexPitchers')->name('carp.pitchers');
Route::get('carp.pitcher', 'CarpPitchersController@indexPitcher')->name('carp.pitcher');