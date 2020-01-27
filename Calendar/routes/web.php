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

Route::get('/dash', function () {
    return view('layouts.dashboard');
});

// ADMIN ROUTES

Route::get('edit_lessons', function () {
    return view('lessons');
});

Route::get('cancel_lessons', function () {
    return view('cancel_lesson');
});

Route::get('calendar', function () {
    return view('calendar');
});