<?php

namespace App\Http\Modules\Report\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

use App\Http\Modules\Admin\Models\User;
use Illuminate\Support\Facades\Session;


class ReportController extends Controller
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

    public function dashboard()
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
        return view("Admin/Views/admin/dashboard");

    }

    public function reportlogin(Request $data)
    {
        die("1232");
        if (Session::has('ror_admin') || $data->session()->has('ror_admin')) {//|| Session::has('fs_manager')
            return redirect('/admin/dashboard');
        }
        if ($data->isMethod('post')) {
            $email = $data->input('email');
            $password = $data->input('password');

            $this->validate($data, [
                'email' => 'required|email',
                'password' => 'required',
            ], ['email.required' => 'Please enter email address or username',
                    'password.required' => 'Please enter a password']
            );
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $objModelUsers = User::getInstance();
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
        return redirect('/admin/login');
    }



}
