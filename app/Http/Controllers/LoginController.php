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
                $users=EmployeeDetails::getLogin($value);
                return view('afterlogin')->with($users);
            } 
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

    public function authenticateLogin(Request $request)
    {
        try
        {
            $email=$request->input('email');
            $password=$request->input('password');
            $users=EmployeeDetails::login($email,$password);

            if(!isset($users))
            {
                return redirect('newlogin');
            }
            $request->session()->put('email',$email);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }   
        return view('afterlogin')->with($users);
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

    public function authenticateAdminLogin(Request $request)
    {
        try
        {
            $email=$request->input('email');
            $password=$request->input('password');
            $users=AdminDetails::authenticateLogin($email,$password);

            if(!isset($users))
            {
                return view('newAdminLogin');
            }
            $request->session()->put('email',$email);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('features')->with($users);
    }

    function showLogoutPage() 
    {
        return view('logout');
    }

    function logout(Request $request) 
    {
        $value = $request->session()->pull('email','default');
        $request->session()->forget('email');
        $request->session()->flush();
        return redirect('/dashboard'); 
    }
}
