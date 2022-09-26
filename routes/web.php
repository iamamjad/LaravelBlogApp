<?php

use App\Http\Controllers\PostController;
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

Route::resource('post', 'PostController');

Route::get('/', 'PostController@index')->name('post.index');

Route::get('post/show/{id}', 'PostController@show')->name('post.show');

Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::put('post/update/{id}', 'PostController@update')->name('post.update')->middleware('auth');
Route::delete('post/destroy/{id}', 'PostController@destroy')->name('post.destroy')->middleware('auth');
Route::get('post/create/', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('post/store/', 'PostController@store')->name('post.store');


Route::resource('users', 'UserController');
Route::get('user/create/', 'UserController@create')->name('user.create')->middleware('guest');
//Route::get('user/login/', 'UserController@login')->name('user.login');
Route::get('user/login/', 'UserController@login')->name('login')->middleware('guest');
Route::post('/users','UserController@store')->name('users.store');
Route::post('/users/logout','UserController@logout')->name('users.logout')->middleware('auth');
Route::post('/users/authenticate','UserController@authenticate')->name('users.authenticate');

Route::get('/manage', 'PostController@manage')->name('manage')->middleware('auth');
