<?php

//namespace App\Http\Modules\Supplier\Controllers;
namespace App\Http\Modules\User\Controllers;
include public_path() . "/../vendor/mandrill/src/Mandrill.php";


//use App\User;
use App\Http\Modules\User\Models\MailTemplate;
use App\Http\Modules\User\Models\Report;
use Illuminate\Http\Request;
use App\Http\Modules\User\Models\User;
use App\Http\Modules\User\Models\Usersmeta;
use App\Http\Modules\User\Models\location;
use App\Http\Modules\User\Models\Review;
use Illuminate\Support\Facades\Input;
//use App\Http\Modules\User\Models\Usersmeta;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mandrill;
use DB;
use Illuminate\Support\Facades\View;
use Image;
use Validator;

use Redirect;
use File;
use Illuminate\Support\Facades\Storage;

//use FlashSale\Http\Modules\Supplier\Models\User;
//use App\Http\Modules\Supplier\Models\Usersmeta;

use Illuminate\Support\Facades\Session;


class UserController extends Controller
{


    private $imageWidth = 1024;//TO BE USED FOR IMAGE RESIZING
    private $imageHeight = 1024;//TO BE USED FOR IMAGE RESIZING


    public function login(Request $request)
    {

        if (Session::has('ror_user')) {


            return redirect('/');
        }
     if ($request->isMethod('post')) {
            $email = $request->input('email');
            $password = $request->input('password');

//            dd($request->all());
            if (Auth::attempt(['email' => $email, 'password' => $password])) {

//            if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))){

                $objModelUsers = User::getInstance();
                $userDetails = $objModelUsers->getUserById(Auth::id());
                   if ($userDetails->role == 0) {
                  $sessionName = 'ror_user';
                    Session::put($sessionName, $userDetails['original']);

                    return redirect()->intended('/');
                } else {
                    return Redirect::back()->with(['status' => 'error', 'msg' => 'invalid creds.']);
                }
            } else {
//                dd(Auth::attempt(['email' => $email, 'password' => $password]));
                return Redirect::back()->with(['status' => 'error', 'msg' => 'invalid creds.']);
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
                $objModelUsers = User::getInstance();
                $data = array('email' => $request['email'],
                    'password' => Hash::make($request['signUpPassword']),//bcrypt($request['password']),
                    'report_login_active' => 1,
                    'business_login_active' => 1,
                    'role' => 0);
                $user = $objModelUsers->addNewUser($data);

                if ($user) {
                    $userDetails = $objModelUsers->getUserById($user);
                    $userMetaData['user_id'] = $userDetails['original']['id'];
                    $userMetaData['full_name'] = $request->input('full_name');

                    $objModelUserMeta = new Usersmeta();
                    $usermetaDetails = $objModelUserMeta->InsertUserMeta($userMetaData);

                    if ($usermetaDetails) {
                        return redirect()->intended('/login');
                    } else {
                        return view("User/Views/user/login")->withErrors([
                            'registerErrMsg' => 'Something went wrong, please try again.',
                        ]);

                    }
                } else {
                    return view("User/Views/user/register")->withErrors([
                        'registerErrMsg' => 'Something went wrong, please try again.',
                    ]);
                }
            } catch (\Exception $ex) {
                return redirect()->back()->with('exception', 'An exception occurred, please reload the page and try again.');
            }
        }
        return view("User/Views/user/register");
    }

    public function index()
    {

        $objReport = new Report();
        $result=$objReport->getAllLatestReports();

         return view("User/Views/user/index",['result' => $result]);
    }

    public function logout()
    {
//        Session::forget('ror_user');
        Session::flush('ror_user');
        return redirect('/login');

    }

    public function userProfile(Request $request)
    {

        $objCountry = location::getInstance();
        $resultCountry = $objCountry->getCountry();

        $data = $request->session()->all();
        $user_id = $data['ror_user']['id'];

        $objGetUserData = User::getInstance();
        $UserData = $objGetUserData->getUserDetailsById($user_id);


        if ($request->isMethod('post')) {


            $user_id = $data['ror_user']['id'];
            $userProfileData['full_name'] = $request->input('full_name');
            $userProfileData['address'] = $request->input('address');
            $userProfileData['city'] = $request->input('city');
            $userProfileData['state'] = $request->input('state');
            $userProfileData['country'] = $request->input('country');
            $userProfileData['zipcode'] = $request->input('zipcode');
            $userProfileData['primary_phone'] = $request->input('primary_phone');
            $userProfileData['alternate_phone'] = $request->input('alternate_phone');
            $userProfileData['contact_investigate'] = $request->input('contact_investigate');
            $userProfileData['contact_lawyer'] = $request->input('contact_lawyer');
            $userProfileData['notify_report'] = $request->input('notify_report');
            $userProfileData['notify_comment'] = $request->input('notify_comment');
            $userProfileData['contact_ror'] = $request->input('contact_ror');

            $objupdateUsersDataModel = Usersmeta::getInstance();
            $UpdateAdminmetadataUserMeta = $objupdateUsersDataModel->updateUserProfileData($userProfileData, $user_id);

            $user_id = $data['ror_user']['id'];
            $userdata['email'] = $request->input('email');
            $objupdateUsersMetaDataModel = User::getInstance();
            $UpdateAdminmetadataUserMeta = $objupdateUsersMetaDataModel->updateUserProfileData($userdata, $user_id);

            return redirect('/profile');


        }
        return view('User.Views.user.user_profile', ['UserData' => $UserData], ['resultCountry' => $resultCountry]);

    }

    public function userAjaxHandler(Request $request)
    {
        $inputData = $request->input();
        $method = $inputData['method'];

        switch ($method) {

            case 'Forgotpassword':
                $email = $request->input('email');

                $objUsersModel = User::getInstance();
                $exists = $objUsersModel->checkMail($email);
                if ($exists) {
                    $resetcode = mt_rand(100000, 999999);
                    $objMailTemplate = new MailTemplate();
                    $temp_name = "Enter_mail_fp";
                    $mailTempContent = $objMailTemplate->getTemplateByName($temp_name);
                    $key = "lSqqGC9W5IZbmrOzyY60cA";
                    $mandrill = new Mandrill($key);
                    $async = false;
                    $ip_pool = 'Main Pool';
                    $message = array(
                        'html' => $mailTempContent->temp_content,
                        'subject' => "New password",
                        'from_email' => "support@ROR.com",
                        'to' => array(
                            array(
                                'email' => $email,
                                'type' => 'to'
                            )
                        ),
                        'merge_vars' => array(
                            array(
                                "rcpt" => $email,
                                'vars' => array(
                                    array(
                                        "name" => "usermail",
                                        "content" => $email
                                    ),
                                    array(
                                        'name' => 'resetcode',
                                        'content' => $resetcode
                                    )
                                )
                            )
                        ),
                    );

                    $mailrespons = $mandrill->messages->send($message, $async, $ip_pool);
                    if ($mailrespons) {
                        $userId = $exists->id;
                        $data['password'] = bcrypt($resetcode);
                        $objModelUsers = User::getInstance();
                        $userPasswordChanged = $objModelUsers->forgotPassword($data, $userId);

                        if ($userPasswordChanged) {
                            echo 1;
                            die;
                        } else {
                            echo 2;
                            die;
                        }
                    } else {
                        echo 3;
                        die;


                    }

                } else {
                    echo 4;
                    die;

//                    return redirect()->back()->with(['status' => 'error', 'email not exist.']);
                }

               break;

            case 'appendComment';

                $report_id = $request->input('report_id');
                $offset = $request->input('offset');
                $limit = $request->input('limit');

                $nextfivereview = new Review();
                $resultreviewData =$nextfivereview->getfivenextreview($report_id,$limit,$offset);
                echo json_encode($resultreviewData);
                break;

               default:
                break;
        }
    }

    public function changePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->session()->all();
            $userId = $data['ror_user']['id'];

            $objuser = new User();
            $newpassword = $request->input('new_password');
            $renewpassword = $request->input('confirm_password');
            $oldpassword = $request->input('old_password');
            if ($newpassword != $oldpassword) {
                if ($newpassword == $renewpassword) {

                    $currentUserDetails = $objuser->getUserDetails($userId);
                    if (Hash::check($oldpassword, $currentUserDetails->password)) {
                        $newpassword = Hash::make($newpassword);
                        $data = array('password' => $newpassword);
                        $Updatepassword = $objuser->UpdateUserPassword($data, $userId);
                        return redirect('/');


                    } else {

                        echo 'unable to check';
                    }


                } else {
                    die('please give a new password');
                }
            } else {
                die('New and old password should not be same');

            }
        }
        return view('User.Views.user.change_password');

    }

    public function searchReport(Request $request){


        if ($request->isMethod('get')) {

            $search = $request->input('search');

            $objReportdata = new Report();
            $Reportresult =$objReportdata->GetReportBysearch($search);

            $totalcount =count($Reportresult);

            if($Reportresult){

                return view('User.Views.user.search_report',['Reportresult' => $Reportresult,'totalcount' =>$totalcount,'search'=>$search]);
//                 return view('User.Views.user.report_details',['TotalReportresult' =>$TotalReportresult,'result' =>$result,'resultreviewData' =>$resultreviewData,'totalresultreviewcount' =>$totalresultreviewcount]);
            }
  }
        else{
            return view('User.Views.user.search');
        }

 }

    public function ReportDetalils(Request $request, $report_id){

        if ($request->isMethod('post')) {
            $reviewData['review_title'] = $request->input('title');
            $reviewData['review_text'] = $request->input('comment');
            $reviewData['report_id'] =$report_id;
            $data = $request->session()->all();
            $userId = $data['ror_user']['id'];
            $reviewData['user_id'] =$userId;
            $reviewData['status'] =1;

            $objuser = new User();
            $resultuser =$objuser->getUserDetailsById($userId);

            $reviewData['full_name']=$resultuser->full_name;


            $objreview = new Review();
            $objresult =$objreview->createReview($reviewData);


        }


        $objgetreviewData = new Review();
        $resultreviewData =$objgetreviewData->getReviewById($report_id);

        $getreviewCount = new Review();
        $resultreviewcount =$getreviewCount->getReviewCount($report_id);
        $totalresultreviewcount =count($resultreviewcount);


         $objReportdataByName = new Report();
         $TotalReportresult =$objReportdataByName->GetReportDetails($report_id);
         $report_id =    $TotalReportresult[0]->report_id;


        $objReportFile = new Report();
        $result =$objReportFile->getMediaFiles($report_id);

     return view('User.Views.user.report_details',['TotalReportresult' =>$TotalReportresult,'result' =>$result,'resultreviewData' =>$resultreviewData,'totalresultreviewcount' =>$totalresultreviewcount]);
    }


}

