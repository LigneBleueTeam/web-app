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

Route::get('/home', 'Controller@index')->name('home');

//LOGIN
Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/actionlogin', 'Controller@actionlogin')->name('actionlogin');

// USERS
Route::get('/users', 'UserController@index')->name('users');
Route::get('/adduser', function () {
    return view('adduser');
})->name('adduser');
Route::post('/addinguser', 'UserController@addinguser');
Route::get('/edituser/{id}', 'UserController@edituser');
Route::post('/editinguser', 'UserController@editinguser');

// ACTIVITIES
Route::get('/activities', 'ActivityController@index')->name('activities');
Route::get('/addactivity', function () {
    return view('addactivity');
})->name('addactivity');
Route::post('/addingactivity', 'ActivityController@addingactivity');
Route::get('/editactivity/{id}', 'ActivityController@editactivity');
Route::post('/editingactivity', 'ActivityController@editingactivity');

//PROGRAMS
Route::get('/programs', 'ProgramController@index')->name('programs');
Route::get('/addprogram', function () {
    return view('addprogram');
})->name('addprogram');
Route::post('/addingprogram', 'ProgramController@addingprogram');
Route::get('/editprogram/{id}', 'ProgramController@editprogram');
Route::post('/editingprogram', 'ProgramController@editingprogram');
