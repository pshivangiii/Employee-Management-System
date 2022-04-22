<?php

namespace App\Http\Controllers;
use App\EmployeeDetails;
use App\AdminDetails;

use App\Http\Requests\RegisterRequest;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegPage()
    {
        return view('newreg');
    }
    public function registerAuthenticate(RegisterRequest $request)
    {
        try
        {
            $request->validate();
 
            $email=$request->input('email');

            $password=$request->input('psw');
    
            $team=$request->input('team');
    
            $designation=$request->input('designation');

            EmployeeDetails::registrationModel($email,$password,$team,$designation);

            return view('newlogin');
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    } 
    public function viewRegistrationPage()
    {
        return view('newAdminReg');
    }
    public function authenticateRegistration(RegisterRequest $request)
    {
        try
        {
            $request->validate();
            $email=$request->input('email');

            $password=$request->input('psw');
            AdminDetails::adminregistrationModel($email,$password);
            return view('newAdminLogin');
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    public function showDashboard()
    {
        return view('dashboard');
    }
}
