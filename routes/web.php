<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blog/create', 'PostController@create')->name('blog.create');
Route::post('/blog/store', 'PostController@store')->name('blog.store');
Route::get('/blog/show', 'PostController@show_all')->name('blog.show');
Route::get('/blog/edit/{id}', 'PostController@edit')->name('blog.edit');
Route::post('/blog/update/{id}', 'PostController@update')->name('blog.update');
