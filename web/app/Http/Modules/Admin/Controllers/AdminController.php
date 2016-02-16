<?php

namespace App\Http\Modules\Admin\Controllers;


use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

use App\Http\Modules\Admin\Models\User;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
//    public function __call(){
//
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        return view("Admin\admin")
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard(Request $data)
    {
//        echo "<pre>";
//        print_r(Session::all());
//        die;
//        $userModel = new User();
//        $users = User::all();
//        echo "<pre>";
//        foreach ($users as $user => $userval) {
//            echo $userval;
//        }
//        die;
//        echo "<pre>";
//        print_r($users);
//        die;
   if ($data->isMethod('post')) {
       
//       echo getcwd();die;
//            $email = $data->input('email');
//            $password = $data->input('password');  
            $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma","wmv");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
//print_r($_FILES['file']);die;
if ((($_FILES["file"]["type"] == "video/mp4") 
||  ($_FILES["file"]["type"] == "video/x-ms-wmv")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 36246026)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("uploads/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      getcwd()."/uploads/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";die;
  }
        }
        return view("Admin/Views/admin/dashboard");
        

    }

    public function adminlogin(Request $data)
    {

        if (Session::has('ror_admin') || $data->session()->has('ror_admin')) {//|| Session::has('fs_manager')
//             echo "<pre>";print_r(Auth::user());die;
            return redirect('/admin/dashboard');
        }
        if ($data->isMethod('post')) {
            
            $email = $data->input('email');
            $password = $data->input('password');

            $this->validate($data, [
                'email' => 'required|email',
                'password' => 'required',
            ], ['email.required' => 'Invalid email address',
                    'password.required' => 'Invalid password']
            );
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $objModelUsers = Users::getInstance();
              
//                User::getInstance();
                $userDetails = $objModelUsers->getUserById(Auth::id()); //THIS IS TO GET THE MODEL OBJECT

//                $userDetails = DB::table('users')->select()->where('id', 1)->first(); //USED TO GET ROW OBJECT
//                echo "<pre>"; print_r($userDetails); die;

                if ($userDetails->role == 2) {
                   
                    $sessionName = 'ror_admin';
                    Session::put($sessionName, $userDetails['original']);
                    return redirect('/admin/dashboard');
                } else {
                    
                    return redirect('/admin/login')->withErrors([
                        'errMsg' => 'Invalid credentials.'
                    ]);
                }

//                if ($userDetails['role'] == 4) {
//                    $sessionName = 'fs_manager';
//                }

            } else {
                
                return redirect('/admin/login')->withErrors([
                    'errMsg' => 'Invalid credentials.'
                ]);
            }
        }
        return view("/Admin/Layouts/adminlogin");
//        return view("/Admin/Layouts/welcome");

    }


    public function adminLogout()
    {
        Session::forget('ror_admin');
        Session::forget('report');
        
        return redirect('/admin/login');
    }





}
