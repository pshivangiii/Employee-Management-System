<?php

namespace App\Http\Controllers;
use App\EmployeeDetails;
use App\AdminDetails;
use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;

class NewRegistrationController extends Controller
{
    public function getReg()
    {
        return view('newreg');
    }
    public function reg(RegisterRequest $request)
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
    public function getAdminReg()
    {
        return view('newAdminReg');
    }
    public function postAdminReg(RegisterRequest $request)
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
    public function showRegistrationPage()
    {
        return view('registrationPage');
    }
    public function registerUser(Request $request)
    {
 
            $email=$request->input('email');

            $password=$request->input('psw');
    
            $team=$request->input('team');
    
            $designation=$request->input('designation');

            EmployeeDetails::getRegistration($email,$password,$team,$designation);
            
            // if($designation != 'Admin')
            // {
            // return view('newlogin');
            // }
            
            return redirect('/newlogin');
        
    } 
}