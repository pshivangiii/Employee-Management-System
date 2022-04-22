<?php

use Illuminate\support\Facades\Route;
use Illuminate\Support\Facades\DB;

use  App\Http\Controllers\RegController;
use App\Http\Middleware\CheckPage;

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
    Route::get('final/{id}','AttendanceController@markAttendance');
    Route::post('final/{id}','AttendanceController@submitAttendance');

    //Approve Attendance
    Route::get('/approval','AttendanceController@showAttendanceRequests');
    Route::get('/approve_attendance/{email}','AttendanceController@showRequestDetail');
    Route::post('/approve_attendance/{email}','AttendanceController@approveAttendance');

    //Show list of employees 
    Route::get('/allEmployees','FeaturesController@showAllEmployees');

    //Show and edit details
    Route::get('/ownprofile/{email}','FeaturesController@viewProfile');
    Route::get('/ownprofile/own/{email}','FeaturesController@showDetails');
    Route::post('/ownprofile/own/{email}','FeaturesController@editOwnProfile');

    //To add a new user
    Route::get('/adduser','FeaturesController@addUser');
    Route::post('/adduser','FeaturesController@addUserPost');

    //Edit Employee's details
    Route::get('edit/{email}','EmployeeController@showEmployeeDetail');
    Route::post('edit/{email}','EmployeeController@editDetails');

});

Route::get('/newreg','RegisterController@showRegPage');
Route::post('/newreg','RegisterController@registerAuthenticate');


Route::get('/newlogin','LoginController@showLoginPage');
Route::post('/newlogin','LoginController@authenticateLogin');


Route::get('/newadminreg','RegisterController@viewRegistrationPage');
Route::post('/newadminreg','RegisterController@authenticateRegistration');


Route::get('/newadminlogin','LoginController@showAdminLogin');
Route::post('/newadminlogin','LoginController@authenticateAdminLogin');


Route::get('/logout','LoginController@showLogoutPage'); 
Route::post('/logout','LoginController@logout'); 


