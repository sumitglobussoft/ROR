<?php

//namespace App\Http\Modules\Supplier\Controllers;
namespace App\Http\Modules\User\Controllers;


//use App\User;
use Illuminate\Http\Request;
use App\Http\Modules\User\Models\User;
//use App\Http\Modules\User\Models\Usersmeta;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\View;
use Image;
use Validator;
use Input;
use Redirect;
use File;
use Illuminate\Support\Facades\Storage;

//use FlashSale\Http\Modules\Supplier\Models\User;
//use App\Http\Modules\Supplier\Models\Usersmeta;
use App\Http\Modules\User\Models\Usersmeta;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{


    private $imageWidth = 1024;//TO BE USED FOR IMAGE RESIZING
    private $imageHeight = 1024;//TO BE USED FOR IMAGE RESIZING


//    public function dashboard()
//    {
//        if (!Session::has('fs_supplier')) {
//            return redirect('/supplier/login');
//        }
//
////        echo "<pre>";
////        print_r(Session::get('fs_supplier')['id']);
////        die;
//        return view("Supplier/Views/supplier/dashboard");
//
//    }

    public function login(Request $request)
    {
//        die('hello');

//dd(Session::all());
        if (Session::has('ror_user')) {


            return redirect('/');
        }


        if ($request->isMethod('post')) {
//            $remember = $request['remember'] == 'on' ? true : false;

            $email = $request->input('email');
            $password = $request->input('password');
//            dd($request->all());



            if (Auth::attempt(['email' => $email, 'password' => $password])) {


// die('dvfxcvxc');

                $objModelUsers = User::getInstance();
                $userDetails = $objModelUsers->getUserById(Auth::id());


                if ($userDetails->role == 0) {

                    $sessionName ='ror_user';
                    Session::put($sessionName, $userDetails['original']);

                    return redirect()->intended('/');
                } else {
                    return view("User/Views/user/login")->withErrors([
                        'errMsg' => 'Invalid credentials.',
                    ]);
                }
            } else {
                die("else");
                return view("User/Views/user/login")->withErrors([
                    'errMsg' => 'Invalid credentials.',
                ]);
            }
        }
        return view("User/Views/user/login");

    }

    public function register(Request $request)
    {

        if (Session::has('ror_user')) {
            return redirect('/');
        }

        if ($request->isMethod('post')) {


            try {

                $user = User::create([
                    'display_name' => $request['first_name'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                     'role' => 1,

                ]);
//                echo '<pre>';
//                print_r($user);
//                die;
//
//
//                $Userpassword = $request->input('password');
//                $password = Hash::make($Userpassword);
//                $userData['password'] = $password;
//                print_r($userData);
//                die;






                if ($user) {
                    Auth::login($user);
                    $objModelUsers = User::getInstance();
                    $userDetails = $objModelUsers->getUserById(Auth::id());

                    $userMetaData['user_id'] = $userDetails['original']['id'];
                    $userMetaData['display_name'] = $request->input('display_name');



                    $objModelUserMeta = new Usersmeta();
                    $usermetaDetails = $objModelUserMeta->InsertUserMeta($userMetaData);


                    $sessionData['userDetails'] = $userDetails['original'];
                    $sessionData['userMetaDetails'] = $userMetaData;

                    Session::put('ror_user',$sessionData);




//                    Session::put('ror_user', $sessionData);

//                     echo'<pre>'; print_r(Session::all());die;
//                        echo '<pre>';
//                        print_r($user);
//                        die;


//                        $objModelUserMeta = new U

//                        echo'<pre>'; print_r(Session::all());die;

                    return redirect()->intended('user/login');
                } else {
                    return view("User/Views/user/register")->withErrors([
                        'registerErrMsg' => 'Something went wrong, please try again.',
                    ]);
                }
            } catch (\Exception $ex) {
                return redirect()->back()->with('exception', 'An exception occurred, please reload the page and try again.');
            }

//            }
        }
        return view("User/Views/user/register");
    }

    public function index()
    {

        return view("User/Views/user/index");
    }

    public function logout()
    {
//        Session::foget('ror_user');

        Session::flush('ror_user');
        return redirect('/login');

    }




}
