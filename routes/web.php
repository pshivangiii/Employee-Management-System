<?php

use Illuminate\support\Facades\Route;
use Illuminate\Support\Facades\DB;

use  App\Http\Controllers\RegController;

// use App\Jobs\SendWelcomeEmailJob;

use App\Info;
 
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

//Main dashboard of project
Route::get('/dashboard','RegisterController@showDashboard');

Route::group(['middleware'=>'session'],function(){

    //Payroll Portal
    Route::get('/payroll_details/{email}','PayrollController@showPayslip');

    //Show users and delete operation
    Route::get('show','FeaturesController@showEmployees');
    Route::delete('/show/{id}','FeaturesController@deleteEmployee');
    
    //Show team details to manager
    Route::get('/team_details/{team}','EmployeeController@myTeam');

    //Apply Attendance
    Route::get('/attendancePortal/{email}','AttendanceController@showAttendancePortal');
    Route::get('markAttendance/{id}','AttendanceController@markAttendance');
    Route::post('markAttendance/{id}','AttendanceController@submitAttendance');

    //Approve Attendance
    Route::get('/showAttendanceRequests','AttendanceController@showAttendanceRequests');
    Route::get('/approve_attendance/{email}','AttendanceController@showRequestDetail');
    Route::post('/approve_attendance/{email}','AttendanceController@approveAttendance');

    //Show list of employees 
    Route::get('/showEmployees','FeaturesController@showAllEmployees');

    //Show and edit details
    Route::get('/ownprofile/{email}','FeaturesController@viewProfile');
    Route::get('/ownprofile/own/{email}','FeaturesController@showDetails');
    Route::post('/ownprofile/own/{email}','FeaturesController@editOwnProfile');

    //To add a new user
    Route::get('/adduser','FeaturesController@viewAddUserPage');
    Route::post('/adduser','FeaturesController@addUserPost');

    //Edit Employee's details
    Route::get('edit/{email}','EmployeeController@showEmployeeDetail');
    Route::post('edit/{email}','EmployeeController@editDetails');

});


Route::get('/registration','RegisterController@showRegPage');
Route::post('/registration','RegisterController@registerAuthenticate');


Route::get('/login','LoginController@showLoginPage');
Route::post('/login','LoginController@authenticateLogin');


Route::get('/adminRegistration','RegisterController@viewRegistrationPage');
Route::post('/adminRegistration','RegisterController@authenticateRegistration');


Route::get('/adminLogin','LoginController@showAdminLogin');
Route::post('/adminLogin','LoginController@authenticateAdminLogin');


Route::get('/logout','LoginController@showLogoutPage'); 
Route::post('/logout','LoginController@logout'); 



