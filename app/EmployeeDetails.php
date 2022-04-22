<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    protected $table="employee_details";
    protected $primaryKey="id";

    /**
     * @param String $email
     * @param String $password
     * @param String $team
     * @param String $designation
     */
    public static function registrationModel($email,$password,$team,$designation)
    {
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
         $check=EmployeeDetails::where(['email'=>$email,'password'=>$password])->get();
        
         if(count($check)>0)
        
                {
                    $users=EmployeeDetails::where(['email'=>$email,'password'=>$password])->get();
                    $request->session()->put('email',$email);
                    $users=compact('users');
                    return $users;
                }
    }

     /**
     * @param String $email
     * @param $request
     */
    public static function getLogin($email,$request)
    {
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
        $data = EmployeeDetails::where('email', $email)->first();
        return $data;
    }

     /**
     * @param String $email
     * @param String $password
     */
    public static function find($email,$password)
    {
         $users=EmployeeDetails::where(['email'=>$email,'password'=>$password])->get();
          if(!empty($users))
            {
              return $email;
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
        
    public static function updateData($id,$email,$password,$team,$attendance)
    {
         EmployeeDetails::where('email', $email)->update(['pending_requests' => $attendance]);
           
    }

     /**
     * @param String $email
     */
    public static function specificData($email)
    {
        $data = EmployeeDetails::where('email', $email)->get();
        return $data;
    }

     /**
     * @param $id
     */
    public static function dataById($id)
    {
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
        EmployeeDetails::where('email', $email)->update(['designation' => $designation]);
        EmployeeDetails::where('email', $email)->update(['team' => $team]);
        EmployeeDetails::where('email', $email)->update(['password' => $password]);
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
        EmployeeDetails::where('email', $email)->update(['approved_requests' => $approved]);
        EmployeeDetails::where('email', $email)->update(['pending_requests' => $attendance]);
    }

     /**
     * @param String $id
     */
    public static function deleteData($id)
    {
        $data = EmployeeDetails::where('id', $id)->delete();
        return $data;
    }

     /**
     * @param String $team
     */
    public static function viewTeam($team)
    {
        $data=EmployeeDetails::where(['team'=>$team])->get();
        return $data;
    }
}

