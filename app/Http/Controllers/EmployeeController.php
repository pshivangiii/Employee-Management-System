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
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('updateEmp',['users'=>$users]);
    }

    public function showEmployeeDetail(Request $request,$email) 
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
        return view('update',['users'=>$users]);   
    }

    public function editDetails(Request $request,$id)
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
        return "Record updated successfully."; 
    }

    //VIEW TEAM'S DATA IF YOU'RE A MANAGER
    public function myTeam($team)
    {
        try
        {
            $users=EmployeeDetails::viewTeam($team);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }  
        return view('myteam',['users'=>$users]);    
    }
}


