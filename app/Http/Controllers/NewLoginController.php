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
    public function getLoginPage(Request $request)
    {
        try
        {
            $value = $request->session()->get('email');
            
            if(!empty($value))
            { 
                $data=EmployeeDetails::getEmployeeData($value);
                $users=EmployeeDetails::getLogin($value,$request);
                if($data->designation == 'Admin')
                {
                    return view('features')->with($users);
                }
                else
                {
                    return view('afterlogin')->with($users);
                }
            }   
         return view('loginPage');
        }  
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('loginPage');
    }
    public function loginUser(Request $request)
    {
        try
        {
            $email=$request->input('email');

            $password=$request->input('password');

            $users=EmployeeDetails::loginUser($email,$password,$request);

            if(isset($users))
            {
                $request->session()->put('email',$email);
                $data=EmployeeDetails::getEmployeeData($email);
                if($data->designation == 'Admin')
                {
                    return view('features')->with($users);
                }
                else
                {
                    return view('afterlogin')->with($users);
                }
            }
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return redirect('/newlogin');
    }
  
}
    
      

