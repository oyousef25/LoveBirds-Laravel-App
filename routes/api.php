<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    //Custom Vendors Routes
    Route::apiResource('custom-vendors', 'CustomVendorController');
    Route::get('custom-vendor/{email}', 'CustomVendorController@filter');

    Route::apiResource('saved-vendors', 'SavedVendorsController');
    Route::get('saved-vendor/{email}', 'SavedVendorsController@filter');

    Route::apiResource('categories', 'BudgetCategoriesController');
    Route::get('category/{email}', 'BudgetCategoriesController@filter');

    //Tasks
    Route::apiResource('planning', 'TaskController');
    Route::get('tasks/{email}', 'TaskController@filter');

    //Guests
    Route::apiResource('guests', 'GuestController');
    Route::get('guest/{email}', 'GuestController@filter');

    //Account
    Route::get('account/{email}', 'AccountController@getUser');
    Route::put('account/{data}', 'AccountController@updateUser');

    //Invite Partner
    Route::post('account/{email}', 'AccountController@updatePartner');

    /*
     * User Authentication Routes
     */
    Route::post('/login', 'UsersController@login');
    Route::post('/register', 'UsersController@register');
    Route::get('/logout', 'UsersController@logout')->middleware('auth:api');
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
