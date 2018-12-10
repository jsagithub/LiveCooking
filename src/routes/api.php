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
//User
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'UserController@details');
});
//Recepie
Route::get('recepies', 'RecepiesController@index');
Route::get('recepies/{id}', 'RecepiesController@show');
Route::post('recepies', 'RecepiesController@store');
Route::put('recepies', 'RecepiesController@store'); 
Route::delete('recepies/{id}', 'RecepiesController@destroy');