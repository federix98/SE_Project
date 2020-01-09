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

// Degrees CRUD Routes 
Route::get('degrees', 'DegreeController@index');
Route::get('degrees/{degree}', 'DegreeController@show');
Route::post('degrees', 'DegreeController@store');
Route::put('degrees/{degree}', 'DegreeController@update');
Route::delete('degrees/{degree}', 'DegreeController@destroy');

// Degree Groups CRUD Routes 
Route::get('degree_groups', 'DegreeGroupController@index');
Route::get('degree_groups/{degree_group}', 'DegreeGroupController@show');
Route::post('degree_groups', 'DegreeGroupController@store');
Route::put('degree_groups/{degree_group}', 'DegreeGroupController@update');
Route::delete('degree_groups/{degree_group}', 'DegreeGroupController@destroy');

// Departments CRUD Routes 
Route::get('departments', 'DepartmentController@index');
Route::get('departments/{department}', 'DepartmentController@show');
Route::post('departments', 'DepartmentController@store');
Route::put('departments/{department}', 'DepartmentController@update');
Route::delete('departments/{department}', 'DepartmentController@destroy');

// Teachings CRUD Routes 
Route::get('teachings', 'TeachingController@index');
Route::get('teachings/{teaching}', 'TeachingController@show');
Route::post('teachings', 'TeachingController@store');
Route::put('teachings/{teaching}', 'TeachingController@update');
Route::delete('teachings/{teaching}', 'TeachingController@destroy');
// Teaching Professors
Route::get('teachings/{teaching}/professors', 'TeachingController@getProfessors');
Route::post('teachings/{teaching}/professors', 'TeachingController@storeProfessor');

// Professors CRUD Routes 
Route::get('professors', 'ProfessorController@index');
Route::get('professors/{professor}', 'ProfessorController@show');
Route::post('professors', 'ProfessorController@store');
Route::put('professors/{professor}', 'ProfessorController@update');
Route::delete('professors/{professor}', 'ProfessorController@destroy');