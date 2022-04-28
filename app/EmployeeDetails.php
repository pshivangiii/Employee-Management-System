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
    public static function registrationModel($email,$password,$team,$designation)
    {
       if((empty($email)) || (empty($password)) || (empty($team)) || (empty($designation)))
       {
        throw new Exception("Problem occured in Registeration!");
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
     * @param $request
     */
    public static function login($email,$password,$request)
    {
        if((empty($email)) || (empty($password)))  
        {
            throw new Exception("Login Failed!");
        }
         $check=Self::where(['email'=>$email,'password'=>$password])->get();
         if(count($check)>0)
                {
                    $users=$check;
                    $request->session()->put('email',$email);
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
            throw new Exception("Please provide email to continue!");
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
            throw new Exception("Employee detials could not be fetched!");
        }
        $data = Self::where('email', $email)->first();
        return $data;
    }

     /**
     * @param String $email
     * @param String $password
     */
    public static function find($email,$password)
    {
        if((empty($email)) || (empty($password)))
        {
            throw new Exception("Please Enter Valid Details!");
        }
          $users=Self::where(['email'=>$email,'password'=>$password])->get();
          if(!empty($users))
            {
              return $email;
            }   
    }

    public static function paginatedData()
    {
        $users=Self::paginate(3);
        return $users;
    }

    public static function allData()
    {
        $users=Self::all();
        return $users;
    }
        
    public static function markAttendance($email,$attendance)
    {
        if((empty($email)) || (empty($attendance)))
        {
            throw new Exception("Could not mark Attendance!");
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
            throw new Exception("Details cannot be fetched!");
        }
        $data = Self::where('email', $email)->get();
        return $data;
    }

     /**
     * @param $id
     */
    public static function dataById($id)
    {
        if(empty($id))
        {
            throw new Exception("No employee found for this id!");
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
            throw new Exception("Profile couldn't be updated!");
        }
        Self::where('email', $email)->update(['designation' => $designation]);
        Self::where('email', $email)->update(['team' => $team]);
        Self::where('email', $email)->update(['password' => $password]);
    }

    public static function approval()
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
            throw new Exception("Could not update Attendance!");
        }
        Self::where('email', $email)->update(['approved_requests' => $approved]);
        Self::where('email', $email)->update(['pending_requests' => $attendance]);
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
    public static function viewTeam($team)
    {
        if(empty($team))
        {   
            throw new Exception("You dont have access!");
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
            throw new Exception("Please enter valid search!");
        }
        $data=Self::where('team',$search)
                            ->orWhere('designation',$search)
                            ->orWhere('email',$search)
                            ->orWhere('id',$search)->get();
        return $data;
    }
}

