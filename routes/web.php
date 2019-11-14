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

use Thujohn\Twitter\Facades\Twitter;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/facebook', 'AuthController@redirectToFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'AuthController@handleFacebookCallback');

Route::get('/userTimeline', function()
{
    return Twitter::getUserTimeline(['screen_name' => 'thujohn', 'count' => 20, 'format' => 'json']);
});

Route::get('/homeTimeline', function()
{
    return Twitter::getHomeTimeline(['count' => 20, 'format' => 'json']);
});

Route::get('/searchTwitter', 'HomeController@searchTwitter');
