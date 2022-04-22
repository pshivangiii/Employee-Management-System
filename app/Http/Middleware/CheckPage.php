<?php

namespace App\Http\Middleware;
use App\EmployeeDetails;

use Closure;

class CheckPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $value = $request->session()->get('email');
        if(!empty($value))
        { 
            $users=EmployeeDetails::getLogin($value,$request);
            return view('afterlogin')->with($users);
        
        }
        else{
            return view('/login');
        }
        
        
    }
}
