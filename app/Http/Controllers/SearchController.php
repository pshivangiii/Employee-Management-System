<?php
namespace App\Http\Controllers;


use App\Info;
use App\Adminreg;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
     //Show users based with manual paginator
    public function showUsers()
    {
       try
       {  
           $id=5;
           $data=EmployeeDetails::showUsers($id);
       }
       catch (\Exception $e) 
       {
           return redirect('error')->with
           (
              'error', $e->getMessage()
           );
       }
       return view('showUsers',['data'=> $data]);
    }
    public function nextUsers($id)
    {
        try
        {
            $data=EmployeeDetails::nextUsers($id);
            return view('showUsers',['data'=> $data]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    public function prevUsers($id)
    {
        try
        {
            $data=EmployeeDetails::prevUsers($id);
            return view('showUsers',['data'=> $data]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }

    // Custom search Filter with pagination
    public function showFilter(Request $request)
    {
            $users = EmployeeDetails::allData();
            $filter_data = []; 
            foreach($users as $row)
            {
                array_push($filter_data, $row);
            }
            $count = count($filter_data); 
            $page = $request->page; 
            $perPage = 3;
            $offset = ($page-1) * $perPage;
            $users = array_slice($filter_data, $offset, $perPage);
            $users = new Paginator($users, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);
            return view('filterview',['users' => $users]);
    }

    public function showFilteredResult(Request $request)
    {
        try
        {
            $search= $request->input('search');
            $data=EmployeeDetails::searchData($search);
            return view('filter',['data'=> $data]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }

    
    //  /**
    //  * @param String $email
    //  * @param String $password
    //  */
    // public static function loginUser($email,$password,$request)
    // {
    //     $check=EmployeeDetails::where(['email'=>$email])->get();
    //     if(count($check)>0)
    //        {
    //             $users=EmployeeDetails::where(['email'=>$email])->get();
    //             $users=compact('users');
    //             return $users;
    //         }
    // }

}


    



