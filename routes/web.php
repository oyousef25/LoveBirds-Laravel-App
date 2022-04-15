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
 * Budget Categories Routes
 */
//Edit an existing category
Route::delete('categories/{category}', 'BudgetCategoriesController@destroy')->name('categories.destroy');
//Update an existing category
Route::patch('categories/{category}', 'BudgetCategoriesController@update')->name('categories.update');
//Create a new category
Route::get('categories/create', 'BudgetCategoriesController@create')->name('categories.create');
//Edit an existing category
Route::get('categories/{category}/edit', 'BudgetCategoriesController@edit')->name('categories.edit');
//Create a new category
Route::post('categories', 'BudgetCategoriesController@store')->name('categories.store');
//All Categories(index)
Route::get('categories', 'BudgetCategoriesController@index')->name('categories.index');
//Category details(show)
Route::get('categories/{category}', 'BudgetCategoriesController@show')->name('categories.show');

/*
 * Guests Routes
 */
//Edit an existing guest
Route::delete('guests/{guest}', 'GuestController@destroy')->name('guests.destroy');
//Update an existing guest
Route::patch('guests/{guest}', 'GuestController@update')->name('guests.update');
//Create a new task
Route::get('guests/create', 'GuestController@create')->name('guests.create');
//Edit an existing guest
Route::get('guests/{guest}/edit', 'GuestController@edit')->name('guests.edit');
//Create a new guest
Route::post('guests', 'GuestController@store')->name('guests.store');
//All Guests(index)
Route::get('guests', 'GuestController@index')->name('guests.index');
//Guest details(show)
Route::get('guests/{guest}', 'GuestController@show')->name('guests.show');

/*
 * Custom Vendors Routes
 */
//Edit an existing vendor
Route::delete('vendors/{vendor}', 'CustomVendorController@destroy')->name('vendors.destroy');
//Update an existing vendor
Route::patch('vendors/{vendor}', 'CustomVendorController@update')->name('vendors.update');
//Create a new vendor
Route::get('vendors/create', 'CustomVendorController@create')->name('vendors.create');
//Edit an existing vendor
Route::get('vendors/{vendor}/edit', 'CustomVendorController@edit')->name('vendors.edit');
//Create a new vendor
Route::post('vendors', 'CustomVendorController@store')->name('vendors.store');
//All vendors(index)
Route::get('vendors', 'CustomVendorController@index')->name('vendors.index');
//Vendor details(show)
Route::get('vendors/{vendor}', 'CustomVendorController@show')->name('vendors.show');

//Partner invitation routes
Route::get('invite', 'InvitePartnerController@invite')->name('invite');
Route::post('invite', 'InvitePartnerController@process')->name('process');
//{token} a required parameter
Route::get('accept/{token}', 'InvitePartnerController@accept')->name('accept');

//Guest confirmation routes
//{token} a required parameter
Route::get('confirm/{token}', 'GuestConfirmationController@confirm')->name('confirm');

/*
 * Main Pages Routes
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/account', 'AccountController@index')->name('account.index');
Route::get('account/{user_id}/edit', 'AccountController@edit')->name('account.edit');
Route::patch('account/{user_id}', 'AccountController@update')->name('account.update');



Auth::routes();
