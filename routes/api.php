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
    Route::apiResource('saved-vendors', 'SavedVendorsController');
    Route::apiResource('planning', 'TaskController');
    Route::apiResource('guests', 'GuestController');
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
