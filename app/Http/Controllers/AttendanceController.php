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
        try
        {
            return view('attendancePortal');
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
     }

    public function showAttendancePortal(Request $request,$email)
     {
        try
        {
            $users=EmployeeDetails::specificDataa($email);
            return view('calendar',['users'=>$users]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
     }

    public function markAttendance($id)
     {
        try
        {
            $users=EmployeeDetails::dataById($id);
            return view('newfinal',['users'=>$users]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
     }

    public function submitAttendance(Request $request,$id) 
     {
        try
        {
            $email = $request->input('email');
            $password = $request->input('psw');
            $team = $request->input('team');
            $attendance = $request->input('attendance');
            EmployeeDetails::updateData($id,$email,$password,$team,$attendance);
            echo "Attendance updated successfully.";
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
     }

    public function showAttendanceRequests()
     {
        try
        {
            $users=EmployeeDetails::approval();
            return view('approveRequest',['users'=>$users]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
     }

    public function showRequestDetail(Request $request,$email) 
     {
        try
        {
            $users=EmployeeDetails::specificDataa($email);
            return view('approveAttendance',['users'=>$users]);    
        }  
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }  
     }

     public function approveAttendance(Request $request,$email)
     {
        try
        {
            $email = $request->input('email');
            $password = $request->input('psw');
            $team = $request->input('team');
            $designation = $request->input('designation');
            $attendance = $request->input('attendance');
            $approved = $request->input('approved');
            EmployeeDetails::updateAttendance($email,$attendance,$approved);
            echo "Attendance updated successfully.";
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
