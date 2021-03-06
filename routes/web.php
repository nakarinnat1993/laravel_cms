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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/post/{post}', 'Blog\PostController@show')->name('blog.show');
Route::get('blog/category/{category}', 'Blog\PostController@category')->name('blog.category');
Route::get('blog/tag/{tag}', 'Blog\PostController@tag')->name('blog.tag');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('tags', 'TagsController');
});
Route::group(['middleware' => ['auth','verifyAdmin']], function () {
    Route::get('user', 'UserController@index')->name('users.index');
    Route::post('user/{user}/makeadmin', 'UserController@makeadmin')->name('users.makeadmin');
});
