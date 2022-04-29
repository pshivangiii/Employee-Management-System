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
    public static function getAdminRegistration($email,$password)
    {
        if((empty($email)) && (empty($password)))  
        {
            return null;
        }
        $reg=new AdminDetails();
        $reg->email=$email;
        $reg->password=$password;
        $reg->save();
    }
    
    /**
     * @param String $email
     * @param String $password
    */
    public static function authenticateLogin($email,$password)
    {
     if((!empty($email)) && (!empty($password)))  
     {
        $check=AdminDetails::where(['email'=>$email,'password'=>$password])->get();
        if(count($check)>0)
        {
            $users=$check;
            $users=compact('users');
            return $users;
        }
     }
    }    

    /**
     * @param String $email
    */
    public static function enableLogin($email)
    {
        if(empty($email))
        {
            return null;
        }
         $check=AdminDetails::where(['email'=>$email])->get();
         if(count($check)>0)
         {
            $users=$check;
            $users=compact('users');
            return $users;
         }
    }
}
