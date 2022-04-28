<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminDetails extends Model
{
    protected $table="admin_details";
    protected $primaryKey="id";
    protected $fillable = [
        'id',
        'email',
        'password'
    ];

    /**
     * @param String $email
     * @param String $password
    */
    public static function adminRegistrationModel($email,$password)
    {
        if((!empty($email)) && (!empty($password)))  
        {
            $reg=new AdminDetails();
            $reg->email=$email;
            $reg->password=$password;
            $reg->save();
        }
    }
    
    /**
     * @param String $email
     * @param String $password
     * @param $request
    */
    public static function authenticateLogin($email,$password)
    {
     if((!empty($email)) && (!empty($password)))  
     {
        $check=AdminDetails::where(['email'=>$email,'password'=>$password])->get();
        if(count($check)>0)
        {
            $users=AdminDetails::where(['email'=>$email,'password'=>$password])->get();
            $users=compact('users');
            return $users;
        }
     }
    }    

    /**
     * @param String $email
     * @param $request
    */
    public static function enableLogin($email)
    {
        if(empty($email))
        {
            return "EMAIL NEEDED!";
        }
         $check=AdminDetails::where(['email'=>$email])->get();
         if(count($check)>0)
         {
            $users=AdminDetails::where(['email'=>$email])->get();
            $users=compact('users');
            return $users;
         }
    }
}
