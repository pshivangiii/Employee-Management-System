<?php
namespace App\Http\Controllers;


use App\Info;
use App\Adminreg;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


use Session;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //Custom search Filter
    public function showFilter()
    {
        $users=EmployeeDetails::allData();
        return view('filterview',['users'=> $users]);
    }

    public function showFilteredResult(Request $request)
    {
        $search= $request->input('search');
        $data=EmployeeDetails::searchData($search);
        return view('filter',['data'=> $data]);
    }

    //Show users based with manual paginator
    public function showUsers()
    {
      $id=5;
      $data=EmployeeDetails::showUsers($id);
      return view('showUsers',['data'=> $data]);
    }
    public function nextUsers($id)
    {
        $data=EmployeeDetails::nextUsers($id);
        return view('showUsers',['data'=> $data]);
    }
    public function prevUsers($id)
    {
        $data=EmployeeDetails::prevUsers($id);
        return view('showUsers',['data'=> $data]);
    }
}


    



