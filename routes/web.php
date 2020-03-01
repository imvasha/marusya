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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', 'BlogController@index')->name('blogIndex');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','role:admin');
Route::get('/{post}', 'BlogController@show')->name('showPost');
Route::get('/c/{id}', 'BlogController@showCat')->name('showCat');
Route::get('/d/{date}', 'BlogController@showDate')->name('showDate');
Route::get('/about/you', 'BlogController@about')->name('blogAbout');


// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','role:admin');

Route::group(['prefix' => 'admin'], function () {
// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
	Route::group(['middleware' => ['auth','role:admin']], function () {
        // Route::group(['middleware' => ['role:admin']], function () {
		Route::resources([
            'photos' => 'FotoController',
            'posts' => 'PostController',
            'categories' => 'CategoryController',
            'videos' => 'VideoController',
            'fotos' => 'FotoController',
            'hashtags' => 'HashtagController',
            'comments' => 'CommentController',
            'replies' => 'ReplyController',
            'roles' => 'RoleController',
        ]);
	});
});


