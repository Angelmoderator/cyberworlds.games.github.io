<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', 'MainController@home')->name('home');

// User
Route::get('/enter', 'MainController@enter')->name('enter');
Route::get('/cart', 'MainController@cart')->name('cart');

// Game

Route::get('/game', 'MainController@game')->name('game');
Route::get('/game/{id}', 'MainController@gameid');

// Route::get('/game/{id}/{name}', function ($id, $name) {
//     return view('game');// 'ID: '. $id. '.name: ' . $name;
// });

// Main
Route::get('/games', 'MainController@games')->name('games');
Route::get('/search', 'MainController@search')->name('search');
Route::get('/release', 'MainController@release')->name('release');
Route::get('/news', 'MainController@news')->name('news');
Route::get('/collection', 'MainController@collection')->name('collection');
Route::get('/statistics', 'MainController@statistics')->name('statistics');

Route::get('/back', 'MainController@back')->name('back');
Route::get('/error', 'MainController@error')->name('error');
Route::post('/error/check', 'MainController@error_Check')->name('contact-form');



// Info
Route::get('/about', 'MainController@about')->name('about');
Route::get('/questions', 'MainController@questions')->name('questions');
Route::get('/social', 'MainController@social')->name('social');



// Fotter
Route::get('/privacy_policy', 'MainController@privacy_policy')->name('privacy_policy');
Route::get('/legal_information', 'MainController@legal_information')->name('legal_information');
Route::get('/user_agreements', 'MainController@user_agreements')->name('user_agreements');



Route::get('/parser/{id}', 'MainController@parser');

// Route::get('/parser', 'MainController@parser');
// Route::get('/refund', 'MainController@/refund');