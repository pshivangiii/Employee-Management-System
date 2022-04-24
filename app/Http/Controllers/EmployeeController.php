<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{

//EDIT EMPLOYEE DETAILS
    public function viewEmployees()
    {
        try
        {
            $users=EmployeeDetails::allData();
            return view('updateEmp',['users'=>$users]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }

    public function showEmployeeDetail(Request $request,$email) 
    {
        try
        {
            $users=EmployeeDetails::getEmployeeData($email);
            return view('update',['users'=>$users]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }    
    }

    public function editDetails(Request $request,$id)
    {
        try
        {
            $email = $request->input('email');
            $password = $request->input('psw');
            $team = $request->input('team');
            $designation = $request->input('designation');
            EmployeeDetails::updateProfile($id,$email,$password,$team,$designation);
            echo "Record updated successfully.";
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }

    //VIEW TEAM'S DATA IF YOU'RE A MANAGER
    public function myTeam($team)
    {
        try
        {
            $users=EmployeeDetails::viewTeam($team);
            return view('myteam',['users'=>$users]); 
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


