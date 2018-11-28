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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/createPost', 'SocialPostsController@redirect');
Route::get('/deletePost/{id}', 'SocialPostsController@delete')->name('deletePost');
Route::get('/editPost', 'SocialPostsController@edit')->name('editPost');


Route::get('/createcomment', 'CommentsController@addComment')->name('createcomment');
Route::get('/updateGender', 'HomeController@updateGender');
