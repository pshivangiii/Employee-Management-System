<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;

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
        $password=$request->input('psw');
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
        return "NEW EMPLOYEE ADDED";
    }
    public function showEmployees()
    {
        try
        {
            $data=EmployeeDetails::paginatedData();
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('userDetails',['data'=> $data]);
    }
    public function deleteEmployee($id)
    {
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
        return "DELETED SUCCESSFULLY";
    }
    public function showAllEmployees()
    {
        try
        {
            $users=EmployeeDetails::paginatedData();
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
        return view('viewOwnProfile',['users'=>$users]); 
    }
    public function showDetails($email)
    {
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
    public function editOwnProfile(Request $request,$id)
    {
        $email = $request->input('email');
        $password = $request->input('psw');
        $team = $request->input('team');
        $designation = $request->input('designation');
        try
        {
            EmployeeDetails::updateProfile($id,$email,$password,$team,$designation);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return "Profile updated successfully.";
    }
}


