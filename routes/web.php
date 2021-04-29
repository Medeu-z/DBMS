<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/test', function () {
    return view('test');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/al', function () {
    return view('animelist');
});

Route::get('/signup', function () {
    return view('sign');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/a', function () {
    return view('anime');
});

Route::get('/a/acc', function () {
	
    return view('animeN');
});
Route::get('/a/name','App\Http\Controllers\AnimeController@search')->name('search');
Route::get('/a/name2','App\Http\Controllers\AnimeController@search2')->name('search2');
Route::post('/acc/user','App\Http\Controllers\accController@add')->name('add');
Route::post('/acc/del','App\Http\Controllers\accController@del')->name('del');
Route::post('/acc/upd','App\Http\Controllers\accController@upd')->name('upd');
Route::get('/acc/log','App\Http\Controllers\accController@log')->name('log');

Route::post('/a/del','App\Http\Controllers\AnimeController@del')->name('dela');
Route::post('/a/upd','App\Http\Controllers\AnimeController@upd')->name('upda');
