<?php

namespace App\Http\Controllers;
use App\EmployeeDetails;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function getAtt($email){
        return view('newFinal');
    }
}
