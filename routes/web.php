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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', 'LoginController@authenticate');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'pendaar', 'middleware' => ['auth']], function () {
    Route::get('/post/own', 'PostController@ownIndex');
    Route::get('/post/{post}/update', 'PostController@updatePost');
    Route::apiResource('post', 'PostController');

    Route::get('/', function () {
        $category = \App\Models\Post\Post::CATEGORY;
        return view('post.post', compact('category'));
    });
});
