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
 * Main Pages Routes
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

//Route::get('/planning', function () {
//    return view('planning');
//});

Route::get('/guests', function () {
    return view('guests');
});

Route::get('/vendors', function () {
    return view('vendors');
});

Route::get('/account', function () {
    return view('account');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
