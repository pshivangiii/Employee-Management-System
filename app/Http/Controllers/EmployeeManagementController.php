<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeDetails;

class EmployeeManagementController extends Controller
{
    //
    public function showEmployees()
    {
        $id=1;
        $users=EmployeeDetails::showEmployees($id);
        return view('employeeManagement',['users'=>$users]);
    }
    public function nextShow($id)
    {
        $id=$id+5;
        $users=EmployeeDetails::showEmployees($id);
        return view('nextShow',['users'=>$users]);
    }
    public function prevShow($id)
    {
        $id=$id+5;
        $users=EmployeeDetails::showEmployees($id);
        return view('prevShow',['users'=>$users]);
    }
}
