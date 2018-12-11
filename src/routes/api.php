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
//Stars
Route::get('stars', 'StarsController@index');
Route::get('stars/{id}', 'StarsController@show');
Route::post('stars', 'StarsController@store');
Route::put('stars', 'StarsController@store'); 
Route::delete('stars/{id}', 'StarsController@destroy');
//Comments
Route::get('comments', 'CommentsController@index');
Route::get('comment/{id}', 'CommentsController@show');
Route::post('comment', 'CommentsController@store');
Route::put('comment', 'CommentsController@store'); 
Route::delete('comment/{id}', 'CommentsController@destroy');
//Social Networks
Route::get('social', 'SocialNetworksController@index');
Route::get('social/{id}', 'SocialNetworksController@show');
Route::post('social', 'SocialNetworksController@store');
Route::put('social', 'SocialNetworksController@store');
Route::delete('social/{id}', 'SocialNetworksController@destroy');