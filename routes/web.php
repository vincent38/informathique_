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

Route::post('/profil/update', 'Profile@update')->middleware('auth', 'web')->name('updateProfil');

Route::get('/mathematiques', function () {
    return view('mathematiques');
})->name('mathematiques');

Route::get('/escapecolle', function () {
    return view('informatique');
})->name('informatique');

Route::get('/escape/{id}', 'Escape@index')->where(['id' => '[0-9]+'])->name('launchGame');

Route::get('/logout', function () {
    Auth::logout();
    return view('home');
})->name('logout');

/*
| Routes thèmes maths
*/

Route::get('/mathematiques-theme-1', function () {
    return view('maths-th1');
})->name('maths-th1');

Route::get('/mathematiques-theme-2', function () {
    return view('maths-th2');
})->name('maths-th2');

Route::get('/mathematiques-theme-3', function () {
    return view('maths-th3');
})->name('maths-th3');

Route::get('/mathematiques-theme-4', function () {
    return view('maths-th4');
})->name('maths-th4');
