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
    // Route::get('show/{limit}','FeaturesController@showEmployees');
    Route::get('show','FeaturesController@showEmployees');
    Route::delete('/show/{id}','FeaturesController@deleteEmployee');
    
    //Show team details to manager
    Route::get('/team_details/{team}','EmployeeController@showTeamMembers');

    //Apply Attendance
    Route::get('/attendancePortal/{email}','AttendanceController@showAttendancePortal');
    // Route::get('final/{id}','AttendanceController@markAttendance');
    // Route::post('final/{id}','AttendanceController@submitAttendance');
    Route::get('markAttendance/{id}','AttendanceController@markAttendance');
    Route::post('markAttendance/{id}','AttendanceController@submitAttendance');

    //Approve Attendance
    // Route::get('/approval','AttendanceController@showAttendanceRequests');
    Route::get('/showAttendanceRequests','AttendanceController@showAttendanceRequests');
    Route::get('/approve_attendance/{email}','AttendanceController@showRequestDetail');
    Route::post('/approve_attendance/{email}','AttendanceController@approveAttendance');

    //Show list of employees 
    Route::get('/showEmployees','FeaturesController@showAllEmployees');

    //Show and edit details
    Route::get('/ownprofile/{email}','FeaturesController@viewProfile');
    Route::get('/ownprofile/own/{email}','FeaturesController@showDetails');
    Route::patch('/ownprofile/own/{email}','FeaturesController@editOwnProfile');
 
    //To add a new user
    Route::get('/userPortal','FeaturesController@viewAddUserPage');
    Route::post('/userPortal','FeaturesController@addUser');

    //Edit Employee's details
    Route::get('edit/{email}','EmployeeController@showEmployeeDetail');
    Route::patch('editdetails/{email}','EmployeeController@editDetails'); 

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







// Route::get('attendance/{email}','AttendanceController@index');
    // Route::post('attendance/{id}','AttendanceController@postIndex');
    // Route::get('att','AttendanceController@getAttendance');
     // Route::get('user', function () {
    //         return view('userDetails');
    //     });
      // Route::get('/employee_details/{id}','EmployeeController@getDetails');
    // Route::post('/employee_details/{id}','EmployeeController@postEmployeeDetails');
    // Route::get('/team','EmployeeController@view');
    // Route::get('/editrecords','EmployeeController@viewEmployees');
    // Route::get('/profile/{id}','EmployeeController@viewProfile');
    
    // Route::get('pv','FeaturesController@getPaginateView');


    
    
    Route::get('/employeeManagement','EmployeeManagementController@showEmployees');
    Route::post('/next/{id}','EmployeeManagementController@nextShow');
    Route::post('/previous/{id}','EmployeeManagementController@prevShow');

    //Same Registration Page for both Admin and Employee
    Route::get('/r','NewRegistrationController@showRegistrationPage');
    Route::post('/r','NewRegistrationController@registerUser');

    //Same Login Page for both Admin and Employee
    Route::get('/newlogin','NewLoginController@getLoginPage');
    Route::post('/newlogin','NewLoginController@loginUser');

    //Filter
    Route::get('/search','SearchController@showFilter');
    Route::get('/searchit','SearchController@showFilteredResult');
    Route::get('/viewUsers','EmployeeController@showPaginatedList');

    Route::get('/showUsers','SearchController@showUsers');
    Route::get('/nextUsers/{id}','SearchController@nextUsers');
    Route::get('/prevUsers/{id}','SearchController@prevUsers');

    Route::get('/dash','NewRegistrationController@getDashboard'); 



    

// Route::get('test', function () {
//     $details['name'] = 'Md Obydullah';
//     $details['email'] = 'hi@obydul.me';

//     dispatch(new SendWelcomeEmailJob($details));

//     dd('sent');
// });


