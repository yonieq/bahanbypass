<?php

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
Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::group(['middleware' => 'guest'], function() {

    Route::get('/sign-in/github','Auth\LoginController@github');

    Route::get('/sign-in/github/redirect','Auth\LoginController@githubRedirect');

    Route::get('/sign-in/facebook','Auth\LoginController@facebook');

    Route::get('/sign-in/facebook/redirect','Auth\LoginController@facebookRedirect');

    Route::get('/sign-in/twitter','Auth\LoginController@twitter');

    Route::get('/sign-in/twitter/redirect','Auth\LoginController@twitterRedirect');
});


Route::resource('users', 'UserController')->middleware('auth');




Route::resource('pendakis', 'PendakiController');

Route::resource('regus', 'ReguController');

Route::resource('perlengkapans', 'PerlengkapanController');

Route::resource('jalurs', 'JalurController');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Route::get('login/github', 'Auth\LoginController@redirectToProvider');
// Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

// Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
// Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');