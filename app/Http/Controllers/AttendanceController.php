<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use App\AttendanceRecord;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function getAttendance()
    {
       return view('attendancePortal');
    }
    public function showAttendancePortal($email)
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
        return view('calendar',['users'=>$users]);
     }

    public function markAttendance($id)
     {
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

    public function submitAttendance(Request $request,$id) 
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
        return redirect('/login')->with('status', 'attendance marked successfully');
     }

    public function showAttendanceRequests()
     {
        try
        {
            $users=EmployeeDetails::approval();
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
        return redirect('/showAttendanceRequests')->with('status', 'attendance updated successfully');
     }
}
