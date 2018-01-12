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
    return view('home');
})->name('home');

Auth::routes();


Route::get('/profil', 'Profile@index')->middleware('auth')->name('profil');

Route::post('/profil', 'Profile@update')->middleware('auth', 'web')->name('updateProfil');

Route::get('/mathematiques', function () {
    return view('mathematiques');
})->name('mathematiques');

Route::get('/escapecolle', function () {
    return view('informatique');
})->name('informatique');

Route::get('/escape/{id}', 'Escape@index')->name('launchGame');

Route::get('/escape/finish/{uuid}/{id_exo}/{time}/{lvl_difficulty}', 'Escape@finish')->name('finishGameAndSave');

Route::get('/mathematiques/{id}', 'Maths@index')->name('launchStory');

Route::get('/mathematiques/finish/{uuid}/{id_sto}/{time}/{g}/{b}', 'Maths@finish')->name('finishStoryAndSave');

Route::get('/logout', function () {
    Auth::logout();
    return view('home');
})->name('logout');

