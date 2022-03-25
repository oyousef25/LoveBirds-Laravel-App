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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*
 * Planning Routes
 */
//Edit an existing task
Route::delete('planning/{task}', 'TaskController@destroy')->name('planning.destroy');
//Update an existing task
Route::patch('planning/{task}', 'TaskController@update')->name('planning.update');
//Create a new task
Route::get('planning/create', 'TaskController@create')->name('planning.create');
//Edit an existing task
Route::get('planning/{task}/edit', 'TaskController@edit')->name('planning.edit');
//Create a new task
Route::post('planning', 'TaskController@store')->name('planning.store');
//All Tasks(index)
Route::get('planning', 'TaskController@index')->name('planning.index');
//Task details(show)
Route::get('planning/{task}', 'TaskController@show')->name('planning.show');

/*
 * Guests Routes
 */
//Edit an existing task
Route::delete('guests/{guest}', 'GuestController@destroy')->name('guests.destroy');
//Update an existing task
Route::patch('guests/{guest}', 'GuestController@update')->name('guests.update');
//Create a new task
Route::get('guests/create', 'GuestController@create')->name('guests.create');
//Edit an existing task
Route::get('guests/{guest}/edit', 'GuestController@edit')->name('guests.edit');
//Create a new task
Route::post('guests', 'GuestController@store')->name('guests.store');
//All Tasks(index)
Route::get('guests', 'GuestController@index')->name('guests.index');
//Task details(show)
Route::get('guests/{guest}', 'GuestController@show')->name('guests.show');

/*
 * Main Pages Routes
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();
