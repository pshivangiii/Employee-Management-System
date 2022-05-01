<?php

namespace App;
use Exception;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    protected $table="employee_details";
    protected $primaryKey="id";
    protected $fillable = [
        'id',
        'email',
        'password',
        'team',
        'designation',
        'pending_requests',
        'approved_requests'
    ];

    /**
     * @param String $email
     * @param String $password
     * @param String $team
     * @param String $designation
     */
    public static function getRegistration($email,$password,$team,$designation)
    {
       if((empty($email)) || (empty($password)) || (empty($team)) || (empty($designation)))
       {
            return null;
       } 
        $reg=new EmployeeDetails();
        $reg->email=$email;
        $reg->password=$password;
        $reg->team=$team;
        $reg->designation=$designation; 
        $reg->save();
    }

     /**
     * @param String $email
     * @param String $password
     */
    public static function login($email,$password)
    {
        if((empty($email)) || (empty($password)))  
        {
            return null;
        }
         $check=Self::where(['email'=>$email,'password'=>$password])->get();
         if(count($check)>0)
                {
                    $users=$check;
                    $users=compact('users');
                    return $users;
                }      
    }

     /**
     * @param String $email
     */
    public static function getLogin($email)
    {
        if(empty($email))
        {
            return null;
        }
        $check=Self::where(['email'=>$email])->get();
        if(count($check)>0)
               {
                   $users=$check;
                   $users=compact('users');
                   return $users;
               }
    }

      /**
     * @param String $email
     */
    public static function getEmployeeData($email)
    {
        if(empty($email))
        {
            return null;
        }
        $data = Self::where('email', $email)->first();
        return $data;
    }

    public static function getPaginatedData()
    {
        $users=Self::paginate(3);
        return $users;
    }

     /**
     * @param String $email
     * @param String $attendance
     */    
    public static function markAttendance($email,$attendance)
    {
        if((empty($email)) || (empty($attendance)))
        {
            return null;
        }
        Self::where('email', $email)->update(['pending_requests' => $attendance]);
    }

     /**
     * @param String $email
     */
    public static function getEmployeeDetails($email)
    {
        if(empty($email))
        {
            return null;
        }
        $data = Self::where('email', $email)->get();
        return $data;
    }

     /**
     * @param $id
     */
    public static function getDataById($id)
    {
        if(empty($id))
        {
            return null;
        }
        $data =Self::where('id', $id)->get();
        return $data;
    }
       
     /**
     * @param String $email
     * @param String $password
     * @param String $team
     * @param String $designation
     */
    public static function updateProfile($id,$email,$password,$team,$designation)
    {
        if((empty($id)) || (empty($email)) || (empty($password)) || (empty($team)) || (empty($designation)))
        {  
            return null;
        }
        Self::where('email', $email)->update(['designation' => $designation, 'team' => $team, 'password' => $password]);
    }

    public static function showPendingRequests()
    {
        $data=Self::all()->where('pending_requests','>','0');
        return $data; 
    }

     /**
     * @param String $email
     * @param String $password
     * @param int $approved
     */
    public static function updateAttendance($email,$attendance,$approved)
    {
        if((empty($email)) || (empty($attendance)) || (empty($approved)))
        {
            return null;
        }
        Self::where('email', $email)->update(['approved_requests' => $approved, 'pending_requests' => $attendance]);
    }

     /**
     * @param String $id
     */
    public static function deleteData($id)
    {
        if(empty($id))
        {
            throw new Exception("Data couldn't be deleted!"); 
        }
        $data = Self::where('id', $id)->delete();
        return $data;
    }

     /**
     * @param String $team
     */
    public static function showTeamMembers($team)
    {
        if(empty($team))
        {   
            return null;
        }
        $data=Self::where(['team'=>$team])->get();
        return $data;
    }
    //SEARCH FUNCTION 
     /**
     * @param String $search
     */
    public static function searchData($search)  
    {
        if(empty($search))
        {
            return null;
        }
        $data=Self::where('team',$search)
                            ->orWhere('designation',$search)
                            ->orWhere('email',$search)
                            ->orWhere('id',$search)->get();
        return $data;
    }
     public static function allData()
    {
        $users=Self::all();
        return $users;
    }
      /**
     * @param String $email
     * @param String $password
     */
    public static function loginUser($email,$password,$request)
    {
        $check=EmployeeDetails::where(['email'=>$email])->get();
        if(count($check)>0)
           {
                $users=$check;
                $users=compact('users');
                return $users;
            }
    }
}

