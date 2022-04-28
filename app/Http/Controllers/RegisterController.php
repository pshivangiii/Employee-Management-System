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
        $request->validate();
        $email=$request->input('email');
        $password=$request->input('password'); 
        $team=$request->input('team');
        $designation=$request->input('designation'); 
        try
        {
            EmployeeDetails::registrationModel($email,$password,$team,$designation);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('newlogin');
    } 
    public function viewRegistrationPage()
    {
        return view('newAdminReg');
    }
    public function authenticateRegistration(RegisterRequest $request)
    {
        $request->validate();
        $email=$request->input('email');
        $password=$request->input('password');
        try
        {
            AdminDetails::adminregistrationModel($email,$password);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('newAdminLogin');
    }
    public function showDashboard()
    {
        return view('dashboard');
    }
}
