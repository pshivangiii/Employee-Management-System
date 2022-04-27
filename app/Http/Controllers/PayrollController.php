<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function showPayslip(Request $request,$email)
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
        return view('payrollDetails',['users'=>$users]);
    }
}
