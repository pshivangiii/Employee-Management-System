<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use App\AttendanceRecord;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidateRequest;

class AttendanceController extends Controller
{
    public function showAttendancePortal($email)
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
        return view('calendar',['users'=>$users]);
     }

    public function markAttendance($id)
     {
        if(empty($id))
        {
            return redirect('/dashboard');
        }
        try
        {
            $users=EmployeeDetails::dataById($id);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('newfinal',['users'=>$users]);
     }

    public function submitAttendance(Request $request) 
     {
        try
        {
            $email = $request->input('email');
            $attendance = $request->input('attendance');
            EmployeeDetails::markAttendance($email,$attendance);
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

    public function showAttendanceRequests()
     {
        try
        {
            $users=EmployeeDetails::showPendingRequests();
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return view('approveRequest',['users'=>$users]);
     }

    public function showRequestDetail($email) 
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
        return view('approveAttendance',['users'=>$users]);     
     }

     public function approveAttendance(Request $request,$email)
     {
        if(empty($email))
        {
            return redirect('/dashboard');
        }
        $email = $request->input('email');
        $password = $request->input('psw');
        $team = $request->input('team');
        $designation = $request->input('designation');
        $attendance = $request->input('attendance');
        $approved = $request->input('approved');
        try
        {
            EmployeeDetails::updateAttendance($email,$attendance,$approved);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
        return redirect('/showAttendanceRequests')->with('status', 'Updated Successfully');
     }
}
