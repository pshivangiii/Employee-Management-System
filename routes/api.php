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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



//List of all the users with manual paginator
Route::get('/showUsers','SearchController@showUsers');
Route::get('/nextUsers/{id}','SearchController@nextUsers');
Route::get('/prevUsers/{id}','SearchController@prevUsers');

//Manual Filter to filter out on the basis of team, designation, id and email
// Route::get('/search','SearchController@showfilter');
// Route::get('/searchit','SearchController@showFilteredResult');

Route::get('/viewUsers','SearchController@showfilter');


Route::get('/showPayroll/{email}','PayrollController@showPayslip');

