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

// Route::get('/hello', function () {
//     return 'Hello WOrld!';
// });

// Route::get('/users/{id}', function ($id) {
//     return 'This is user '.$id;
// });

// Route::get('/users/{id}/{name}', function ($id, $name) {
//     return 'This is user '.$name. ' with an id of '.$id;
// });


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/user/{id}', 'HomeController@index')->name('home');
Route::post('/search/videos','PostsController@search')->name('search-video');
Route::post('/search/past-questions', 'PastQuestionController@search')->name('search-past-questions');
Route::post('/past-questions/create', 'PastQuestionController@store')->name('create-past-questions');


Route::resource('users', 'UserController');
Route::resource('posts', 'PostsController');
Route::resource('past-questions', 'PastQuestionController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
