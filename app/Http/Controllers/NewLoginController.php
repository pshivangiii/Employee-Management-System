<?php

namespace App\Http\Controllers;

use App\AdminDetails;
use App\EmployeeDetails;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class NewLoginController extends Controller
{
    public function getLogin(Request $request)
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
    public function postLogin(Request $request)
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

    public function getAdminLogin(Request $request)
    {
        try
        {
            $value = $request->session()->get('email');
            if(!empty($value))
            { 
                $users=AdminDetails::getLogin($value,$request);
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

    public function postAdminLogin(Request $request)
    {
        try
        {
            $email=$request->input('email');

            $password=$request->input('password');

            $users=AdminDetails::login($email,$password,$request);

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
  
}
    
      

