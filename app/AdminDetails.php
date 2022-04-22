<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminDetails extends Model
{
    protected $table="admin_details";
    protected $primaryKey="id";

    /**
     * @param String $email
     * @param String $password
    */
    public static function adminRegistrationModel($email,$password)
    {
        $reg=new AdminDetails();
        $reg->email=$email;
        $reg->password=$password;
        $reg->save();
    }
    
    /**
     * @param String $email
     * @param String $password
     * @param $request
    */
    public static function authenticateLogin($email,$password,$request)
    {
        $check=AdminDetails::where(['email'=>$email,'password'=>$password])->get();
        if(count($check)>0)
        {
            $users=AdminDetails::where(['email'=>$email,'password'=>$password])->get();
            $request->session()->put('email',$email);
            $users=compact('users');
            return $users;
        }
    }    

    /**
     * @param String $email
     * @param $request
    */
    public static function enableLogin($email,$request)
    {
         $check=AdminDetails::where(['email'=>$email])->get();
         if(count($check)>0)
         {
            $users=AdminDetails::where(['email'=>$email])->get();
            $users=compact('users');
            return $users;
         }
    }
}
