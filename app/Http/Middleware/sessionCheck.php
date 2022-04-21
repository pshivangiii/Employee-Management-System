<?php

namespace App\Http\Middleware;
use App\EmployeeDetails;

use Closure;

class sessionCheck
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
         
         if(empty($value)){
            
            return response()->view('dashboard');
         }
       
        return $next($request);
    }
}
