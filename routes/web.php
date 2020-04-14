<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'IndexController@showIndex');

Route::get('/profil', 'IndexController@profilAction')->middleware('verified')->name('showProfil');
Route::post('/profil', 'IndexController@putUpdateUser')->middleware('verified')->name('putProfil');
