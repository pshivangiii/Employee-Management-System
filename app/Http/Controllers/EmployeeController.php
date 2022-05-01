<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidateRequest;


class EmployeeController extends Controller
{
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

    public function editDetails(ValidateRequest $request,$id)
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
            EmployeeDetails::updateProfile($id,$email,$password,$team,$designation);
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

    //VIEW TEAM'S DATA IF YOU'RE A MANAGER
    public function showTeamMembers($team)
    {
        try
        {
            $users=EmployeeDetails::showTeamMembers($team);
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


