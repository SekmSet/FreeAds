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


Route::get('/', 'ArticleController@index');
Route::get('/profil', 'IndexController@showAction')->middleware('verified')->name('showProfil');

Route::get('/profil/edit', 'IndexController@profilAction')->middleware('verified')->name('editProfil');
Route::post('/profil/edit', 'IndexController@putUpdateUser')->middleware('verified')->name('EditProfil');

Route::get('/article/search', 'ArticleController@searchAction')->name('searchArticle');

Route::resource('/article','ArticleController');
