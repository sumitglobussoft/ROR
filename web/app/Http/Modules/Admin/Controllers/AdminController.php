<?php

namespace App\Http\Modules\Admin\Controllers;


use App\Http\Modules\Admin\Models\Category;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

use App\Http\Modules\Admin\Models\User;
use App\Http\Modules\Admin\Models\Review;
use App\Http\Modules\Admin\Models\Report;
use App\Http\Modules\Admin\Models\Business;
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

        $objUsersModel = User::getInstance();
        $where['rawQuery'] = 1;
        $Allusers = $objUsersModel->getAllUsers($where);
        $totalUsers = count($Allusers);


//        $objReview = new review();
//        $result1 = $objReview->getReviews();
//        $totalReview =count($result1);

//        $objBusinesszModel = Business::getInstance();
//        $where['rawQuery'] = 1;
//        $selectedColumns = ['business.*', 'category.category_name', 'subcategory.subcategory_name','user_meta.full_name','user_meta.primary_phone'];
//        $allBusinessCount = $objBusinesszModel->getAllDetails($selectedColumns);
//        $totalBusiness =count($allBusinessCount);

//
//        $objReport = new report();
//        $Allreport=$objReport->getAllReports();
//        $totalReport =count($Allreport);
//        print_r($totalReport);
//        die;

        $objCategory = new category();
        $result2 = $objCategory->getActiveCategory();
        $totalCategory = count($result2);


        return view("Admin/Views/admin/dashboard", ['totalUsers' => $totalUsers], ['totalCategory' => $totalCategory]);

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

                if ($userDetails->role == 1) {

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
