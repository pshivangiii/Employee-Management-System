<?php

namespace App;

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
       if((!empty($email)) && (!empty($password)) && (!empty($team)) && (!empty($designation)))
       {
        $reg=new EmployeeDetails();
        $reg->email=$email;
        $reg->password=$password;
        $reg->team=$team;
        $reg->designation=$designation;
        $reg->save();
       }
    }

     /**
     * @param String $email
     * @param String $password
     * @param $request
     */
    public static function login($email,$password,$request)
    {
        if((!empty($email)) && (!empty($password)))  
        {
         $check=EmployeeDetails::where(['email'=>$email,'password'=>$password])->get();
        
         if(count($check)>0)
        
                {
                    $users=EmployeeDetails::where(['email'=>$email,'password'=>$password])->get();
                    $request->session()->put('email',$email);
                    $users=compact('users');
                    return $users;
                }
        }        
    }

     /**
     * @param String $email
     * @param $request
     */
    public static function getLogin($email,$request)
    {
        if(empty($email))
        {
            return "EMAIL NEEDED!";
        }
        $check=EmployeeDetails::where(['email'=>$email])->get();
        
        if(count($check)>0)
       
               {
                   $users=EmployeeDetails::where(['email'=>$email])->get();
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
            return "EMAIL NEEDED!";
        }
        $data = EmployeeDetails::where('email', $email)->first();
        return $data;
    }

     /**
     * @param String $email
     * @param String $password
     */
    public static function find($email,$password)
    {
        if((!empty($email)) && (!empty($password)))
        {
          $users=EmployeeDetails::where(['email'=>$email,'password'=>$password])->get();
          if(!empty($users))
            {
              return $email;
            }
        }    
    }

    public static function allDatap()
    {
        $users=EmployeeDetails::paginate(3);
        return $users;
    }

    public static function allData()
    {
        $users=EmployeeDetails::all();
        return $users;
    }
        
    public static function markAttendance($email,$attendance)
    {
        if((!empty($email)) && (!empty($attendance)))
        {
            EmployeeDetails::where('email', $email)->update(['pending_requests' => $attendance]);
        }
           
    }

     /**
     * @param String $email
     */
    public static function getEmployeeDetails($email)
    {
        if(empty($email))
        {
            return "EMAIL NEEDED!";
        }
        $data = EmployeeDetails::where('email', $email)->get();
        return $data;
    }

     /**
     * @param $id
     */
    public static function dataById($id)
    {
        if(empty($id))
        {
            return "ID NEEDED!";
        }
        $data = EmployeeDetails::where('id', $id)->get();
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
        if((!empty($id)) && (!empty($email)) && (!empty($password)) && (!empty($team)) && (!empty($designation)))
        {
            EmployeeDetails::where('email', $email)->update(['designation' => $designation]);
            EmployeeDetails::where('email', $email)->update(['team' => $team]);
            EmployeeDetails::where('email', $email)->update(['password' => $password]);
        }
    }

    public static function approval()
    {
        $data=EmployeeDetails::all()->where('pending_requests','>','0');
        return $data;
    }

     /**
     * @param String $email
     * @param String $password
     * @param int $approved
     */
    public static function updateAttendance($email,$attendance,$approved)
    {
        if((!empty($email)) && (!empty($attendance)) && (!empty($approved)))
        {
            EmployeeDetails::where('email', $email)->update(['approved_requests' => $approved]);
            EmployeeDetails::where('email', $email)->update(['pending_requests' => $attendance]);
        }
    }

     /**
     * @param String $id
     */
    public static function deleteData($id)
    {
        if(empty($id))
        {
            return "ID NEEDED!";
        }
        $data = EmployeeDetails::where('id', $id)->delete();
        return $data;
    }

     /**
     * @param String $team
     */
    public static function viewTeam($team)
    {
        if(empty($team))
        {
            return "TEAM NEEDED!";
        }
        $data=EmployeeDetails::where(['team'=>$team])->get();
        return $data;
    }
    //SEARCH FUNCTION 
     /**
     * @param String $search
     */
    public static function searchData($search)  
    {
         $data=EmployeeDetails::where('team',$search)
                            ->orWhere('designation',$search)
                            ->orWhere('email',$search)
                            ->orWhere('id',$search)->get();
         return $data;
    }
    //PAGINATION ON LIST OF USERS
     /**
     * @param String $id
     */
    public static function showUsers($id)
    {
            $data=EmployeeDetails::limit($id)->get();
            return $data;
    }
     /**
     * @param String $id
     */
    public static function nextUsers($id)
    {
        $data=EmployeeDetails::whereBetween('id', [$id,$id+5])->get();
        return $data;
    }
     /** 
     * @param String $id
     */
    public static function prevUsers($id)
    {
        $data=EmployeeDetails::whereBetween('id', [$id-5,$id])->get();
        return $data;
    }
}

