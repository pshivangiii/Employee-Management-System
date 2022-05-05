<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use App\Http\Requests\ValidateRequest;
use Session;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class FeaturesController extends Controller
{ 
    public function viewAddUserPage()
    {
        return view('addUser');
    }

    public function addUser(RegisterRequest $request)
    {
        $request->validate();
        $email=$request->input('email');
        $password=$request->input('password');
        $team=$request->input('team');
        $designation=$request->input('designation');
        try
        {
            EmployeeDetails::getRegistration($email, $password, $team, $designation); 
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return redirect('/adminLogin')->with('status', 'Updated Successfully');
    }

    // public function showEmployees($limit)
    // {
    //     try
    //     {
    //         $users=EmployeeDetails::getPaginatedData($limit);
    //     }
    //     catch (\Exception $e) 
    //     {
    //         return redirect('error')->with
    //         (
    //            'error', $e->getMessage()
    //         );
    //     }
    //     return view('userDetails',['users'=> $users]);
    // }
    public function showEmployees()
    {
        try
        {
            $users=EmployeeDetails::getPaginatedData(3);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('userDetails',['users'=> $users]);
    }

    public function deleteEmployee($id)
    {
        if(empty($id))
        {
            return redirect('/dashboard');
        }
        try
        {
            EmployeeDetails::deleteData($id);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return redirect('/show')->with('status', 'Deleted Successfully');
    }

    public function showAllEmployees(Request $request)
    {
        $limit=$request->input('limit', 3);
        try
        {
            if(!empty($limit))
            
                $users=EmployeeDetails::getPaginatedData($limit);
            
            // else
            // {
            // $users=EmployeeDetails::getPaginatedData(3);
            // }
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('paginateView',['users'=> $users]);
    }

    public function getPayroll()
    {
        return view('payroll');
    }

    public function viewProfile($email)
    {
        if(empty($email))
        {
            return redirect('/dashboard');
        }
        try
        {
            $users=EmployeeDetails::getEmployeeDetails($email);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('viewOwnProfile', compact('users')); 
    }

    public function showDetails($email)
    {
        if(empty($email))
        {
            return redirect('/dashboard');
        }
        try
        {
            $users=EmployeeDetails::getEmployeeData($email);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('updateOwnProfile',['users'=>$users]);
    }

    public function editOwnProfile(ValidateRequest $request,$id)
    {
        if(empty($id))
        {
            return redirect('/dashboard');
        }
        $request->validate();
        $email = $request->input('email');
        $password = $request->input('psw');
        $team = $request->input('team');
        $designation = $request->input('designation');
        try
        {
            EmployeeDetails::updateProfile($id, $email, $password, $team, $designation);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return redirect('/login')->with('status', 'Updated Successfully');
    }
}


