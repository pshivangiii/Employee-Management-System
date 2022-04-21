<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminDetails;
use App\EmployeeDetails;


class LoginController extends Controller
{
    public function showLoginPage(Request $request)
    {
        try
        {
            $value = $request->session()->get('email');
            if(!empty($value))
            { 
                $users=EmployeeDetails::getLogin($value,$request);
                return view('afterlogin')->with($users);
            }
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
    public function authenticateLogin(Request $request)
    {
        try
        {
            $email=$request->input('email');

            $password=$request->input('password');

            $users=EmployeeDetails::login($email,$password,$request);

            if(isset($users))
            {
          
                return view('afterlogin')->with($users);
            }
            else
            {
                return redirect('newlogin');
            }
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }   
    }

    public function showAdminLogin(Request $request)
    {
        try
        {
            $value = $request->session()->get('email');
            if(!empty($value))
            { 
                $users=AdminDetails::enableLogin($value,$request);
                return view('features')->with($users);
            }   
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

    public function authenticateAdminLogin(Request $request)
    {
        try
        {
            $email=$request->input('email');

            $password=$request->input('password');

            $users=AdminDetails::authenticateLogin($email,$password,$request);

            if(isset($users))
            {
                return view('features')->with($users);
            }
            else
            {
                return view('newAdminLogin');
            }
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    function showLogoutPage(Request $request) {
        return view('logout');
    }
    function logout(Request $request) {
        $value = $request->session()->pull('email','default');
    
        $request->session()->forget('email');
 
        $request->session()->flush();
        
        return view('login');
        
        
    }
}
