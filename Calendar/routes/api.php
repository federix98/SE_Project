<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('degrees', 'DegreeController@index');
Route::get('degrees/{degree}', 'DegreeController@show');
Route::post('degrees', 'DegreeController@store');
Route::put('degrees/{id}', 'DegreeController@update');
Route::delete('degrees/{id}', 'DegreeController@destroy');