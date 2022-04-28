<?php

use Illuminate\support\Facades\Route;
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


//Manual Filter with pagination to filter out on the basis of team, designation, id and email
Route::get('/search','SearchController@showfilter');
Route::post('/search','SearchController@showFilteredResult');
