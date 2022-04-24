<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;

use Session;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{ 
    public function addUser(Request $request)
    {
        try
        {
            return view('addUser');
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    public function addUserPost(Request $request)
    {
        try
        {
            $email=$request->input('email');
            $password=$request->input('psw');
            $team=$request->input('team');
            $designation=$request->input('designation');
            EmployeeDetails::registrationModel($email,$password,$team,$designation); 
            return "NEW EMPLOYEE ADDED";
        }
    catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    public function showEmployees()
    {
        try
        {
            $data=EmployeeDetails::AllData();
            return view('userDetails',['data'=> $data]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    public function deleteEmployee(Request $request,$id)
    {
        try
        {
            EmployeeDetails::deleteData($id);
            return "DELETED SUCCESSFULLY";
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    
    }
    public function showAllEmployees(Request $request)
    {
        try
        {
            $users=EmployeeDetails::AllDatap();
            return view('paginateView',['users'=> $users]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }

    public function getPayroll()
    {
        try
        {
            return view('payroll');
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }

    public function viewProfile(Request $request,$email)
    {
        try
        {
            $users=EmployeeDetails::getEmployeeDetails($email);
            return view('viewOwnProfile',['users'=>$users]); 
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    public function showDetails(Request $request,$email)
    {
        try
        {
            $users=EmployeeDetails::getEmployeeData($email);
            return view('updateOwnProfile',['users'=>$users]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    public function editOwnProfile(Request $request,$id)
    {
        try
        {
            $email = $request->input('email');
            $password = $request->input('psw');
            $team = $request->input('team');
            $designation = $request->input('designation');
            EmployeeDetails::updateProfile($id,$email,$password,$team,$designation);
            echo "Profile updated successfully.";
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


