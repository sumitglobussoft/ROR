<?php

namespace App\Http\Modules\Admin\Controllers;

//include public_path() . "/../vendor/mandrill/src/Mandrill.php";

use App\Http\Modules\Admin\Models\User;
use App\Http\Modules\Admin\Models\Usersmeta;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

use Image;
use Validator;
use Input;
use Redirect;
use File;


class UsersController extends Controller
{
    private $imageWidth = 1024;//TO BE USED FOR IMAGE RESIZING
    private $imageHeight = 1024;//TO BE USED FOR IMAGE RESIZING


    public function users()
    {

        $objUsersModel = User::getInstance();
        $where['rawQuery'] = 1;
        $Allusers = $objUsersModel->getAllUsers($where);

        return view('Admin.Views.users.users', ['Allusers' => $Allusers]);

    }


    public function usersAjaxhandler(Request $request)
    {
        $inputData = $request->input();
        $method = $inputData['method'];


        switch ($method) {

            case 'userJoin':

                $date = date_create();
                $rules = array(
                    'username' => 'required|max:255',
                    'displayname' => 'required|max:255',
                    'password' => 'required|max:255',
                    'address' => 'required|max:255',
                    'email' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'zipcode' => 'required',
                    'country' => 'required',
                    'primary_phone' => 'required',
                    'alternate_phone' => 'required',
                );
                $validator = Validator::make($request->all(), $rules);
//print_r($validator);die;
                if ($validator->fails()) {
                    echo json_encode(['status' => 'error', 'msg' => $validator->messages()], true);
                } else {
//your code
                    $userDataStatus = $request->input('status');
                    $userData['email'] = $request->input('email');
                    $Userpassword = $request->input('password');
                    $password = Hash::make($Userpassword);
                    $userData['password'] = $password;
                    $userData['report_login_active'] = $userDataStatus;
                    $userData['business_login_active'] = 0;
                    $userData['role'] = 0;
                    $userData['updated_at'] = 110123;
//                    echo '<pre>';
//                    print_r($userData);
//                    die;
                    $objUsersDataModel = User::getInstance();
                    $AllusersDetails = $objUsersDataModel->InsertUserDetails($userData);


                    $userMetaData['user_id'] = $AllusersDetails;
                    $userMetaData['display_name'] = $request->input('username');
                    $userMetaData['full_name'] = $request->input('displayname');
                    $userMetaData['address'] = $request->input('address');
                    $userMetaData['city'] = $request->input('city');
                    $userMetaData['state'] = $request->input('state');
                    $userMetaData['country'] = $request->input('country');
                    $userMetaData['zipcode'] = $request->input('zipcode');
                    $userMetaData['primary_phone'] = $request->input('primary_phone');
                    $userMetaData['alternate_phone'] = $request->input('alternate_phone');

                    $objUsersDataModel = Usersmeta::getInstance();
                    $where['rawQuery'] = 1;
                    $UserMeta = $objUsersDataModel->InsertUserMetaData($userMetaData);
                    if ($UserMeta) {
                        echo 2;
                        die;

                    }


                    $objEditUser = User::getInstance();
                    $where['rawQuery'] = 1;
                    $AllusersDetails = $objEditUser->getAllUsersDetails($where);

//                    return view('Admin.Views.users.users', ['Allusers' => $Allusers]);


                }
                break;
            case 'edituser':
                $userData['userid'] = $request->input('userid');

                $ObjgetAllUserDetails = User::getInstance();
                $where['rawQuery'] = 1;
                $allUserDetails = $ObjgetAllUserDetails->getAllUsersDetailsForEdit($userData);

                echo json_encode($allUserDetails);


                break;
            case 'deleteuserinfo';
                $userid['userid'] = $request->input('userid');

                $objDeleteUsersModel = User::getInstance();
                $DeletedUsersDetails = $objDeleteUsersModel->deleteUserDetail($userid);

                $objDeleteUsersMetaModel = Usersmeta::getInstance();
                $DeletedUsersMetaDetails = $objDeleteUsersMetaModel->deleteUserMetaDetail($userid);

                if ($DeletedUsersMetaDetails) {

                    echo 2;
                    die;
                }


                break;

            case 'updateuserinfo':

                $UserStatus = $request->input('status01');
                $updateUserData['password'] = $request->input('password');
                $updateUserData['email'] = $request->input('emailid');
                $updateUserData['report_login_active'] = $UserStatus;
                $updateUserData['business_login_active'] = 0;
                $updateUserData['role'] = 0;
                $updateUserData['updated_at'] = 110123;
                $userid = $request->input('edituserid');
//                echo '<pre>';
//                print_r($updateUserData);
//                die;

                $objUpdateUsersDataModel = User::getInstance();
                $UpdatedUsersDetails = $objUpdateUsersDataModel->UpdateUserDetails($updateUserData, $userid);


                $userid = $request->input('edituserid');
                $updateMetaUserData['display_name'] = $request->input('username');
                $updateMetaUserData['full_name'] = $request->input('displayname');
                $updateMetaUserData['address'] = $request->input('address');
                $updateMetaUserData['city'] = $request->input('city');
                $updateMetaUserData['state'] = $request->input('state');
                $updateMetaUserData['country'] = $request->input('country');
                $updateMetaUserData['zipcode'] = $request->input('zipcode');
                $updateMetaUserData['primary_phone'] = $request->input('primary_phone');
                $updateMetaUserData['alternate_phone'] = $request->input('alternate_phone');

                $objInserUsersDataModel = Usersmeta::getInstance();
                $UpdateusermetadataUserMeta = $objInserUsersDataModel->updateMetaUserData($updateMetaUserData, $userid);

                if ($UpdateusermetadataUserMeta) {

                    echo 2;
                    die;
                }

                break;


            default:
                break;

        }

    }

    public function business()
    {


        $objUsersModel = User::getInstance();
        $where['rawQuery'] = 1;
        $Allusers = $objUsersModel->getAllUsers($where);
        return view('Admin.Views.users.business', ['Allusers' => $Allusers]);

    }

    /*
     * Business user
     * @author Sitesh ranjan
     * date 03/02/2016
     */
    public function BusinessAjaxhandler(Request $request)
    {

        $inputData = $request->input();
        $method = $inputData['method'];


        switch ($method) {

            case 'joinBusinessUser':


                $date = date_create();
                $rules = array(
                    'username' => 'required|max:255',
                    'displayname' => 'required|max:255',
                    'password' => 'required|max:255',
                    'address' => 'required|max:255',
                    'email' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'zipcode' => 'required',
                    'country' => 'required',
                    'primary_phone' => 'required',
                    'alternate_phone' => 'required',
                );
                $validator = Validator::make($request->all(), $rules);
//print_r($validator);die;
                if ($validator->fails()) {
                    echo json_encode(['status' => 'error', 'msg' => $validator->messages()], true);
                } else {
//your code
                    $businessUserStatus = $request->input('status');
                    $userData['email'] = $request->input('email');
                    $BusinessUserpassword = $request->input('password');
                    $password = Hash::make($BusinessUserpassword);
                    $userData['password'] = $password;
                    $userData['report_login_active'] = 0;
                    $userData['business_login_active'] = $businessUserStatus;;
                    $userData['role'] = 0;
                    $userData['updated_at'] = 110123;
                    $objUsersDataModel = User::getInstance();
                    $AllusersDetails = $objUsersDataModel->InsertUserDetails($userData);
                    $userMetaData['user_id'] = $AllusersDetails;
                    $userMetaData['display_name'] = $request->input('username');
                    $userMetaData['full_name'] = $request->input('displayname');
                    $userMetaData['address'] = $request->input('address');
                    $userMetaData['city'] = $request->input('city');
                    $userMetaData['state'] = $request->input('state');
                    $userMetaData['country'] = $request->input('country');
                    $userMetaData['zipcode'] = $request->input('zipcode');
                    $userMetaData['primary_phone'] = $request->input('primary_phone');
                    $userMetaData['alternate_phone'] = $request->input('alternate_phone');


                    $objUsersDataModel = Usersmeta::getInstance();
                    $where['rawQuery'] = 1;
                    $UserMeta = $objUsersDataModel->InsertUserMetaData($userMetaData);
                    if ($UserMeta) {
                        echo 2;
                        die;

                    }


                    $objEditUser = User::getInstance();
                    $where['rawQuery'] = 1;
                    $AllusersDetails = $objEditUser->getAllUsersDetails($where);

//                    return view('Admin.Views.users.users', ['Allusers' => $Allusers]);


                }
                break;

            case 'EditBusinessUser':
                $userData['userid'] = $request->input('userid');

                $ObjgetAllUserDetails = User::getInstance();
                $where['rawQuery'] = 1;
                $allUserDetails = $ObjgetAllUserDetails->getAllUsersDetailsForEdit($userData);

                echo json_encode($allUserDetails);


                break;
            case 'DeleteBusinessUserInfo';
                $userid['userid'] = $request->input('userid');

                $objDeleteUsersModel = User::getInstance();
                $DeletedUsersDetails = $objDeleteUsersModel->deleteUserDetail($userid);

                $objDeleteUsersMetaModel = Usersmeta::getInstance();
                $DeletedUsersMetaDetails = $objDeleteUsersMetaModel->deleteUserMetaDetail($userid);

                if ($DeletedUsersMetaDetails) {

                    echo 2;
                    die;
                }


                break;

            case 'UpdateBusinessUserInfo':

                $businessUserStatus = $request->input('status01');
                $updateBusinessUserInfo['password'] = $request->input('password');
                $updateBusinessUserInfo['email'] = $request->input('emailid');
                $updateBusinessUserInfo['report_login_active'] = 1;
                $updateBusinessUserInfo['business_login_active'] = $businessUserStatus;
                $updateBusinessUserInfo['role'] = 0;
                $updateBusinessUserInfo['updated_at'] = 110123;
                $userid = $request->input('edituserid');

                $objUpdateUsersDataModel = User::getInstance();
                $UpdatedUsersDetails = $objUpdateUsersDataModel->UpdateUserDetails($updateBusinessUserInfo, $userid);

                $userid = $request->input('edituserid');
                $updateBusinessUserMetaInfo['display_name'] = $request->input('username');
                $updateBusinessUserMetaInfo['full_name'] = $request->input('displayname');
                $updateBusinessUserMetaInfo['address'] = $request->input('address');
                $updateBusinessUserMetaInfo['city'] = $request->input('city');
                $updateBusinessUserMetaInfo['state'] = $request->input('state');
                $updateBusinessUserMetaInfo['country'] = $request->input('country');
                $updateBusinessUserMetaInfo['zipcode'] = $request->input('zipcode');
                $updateBusinessUserMetaInfo['primary_phone'] = $request->input('primary_phone');
                $updateBusinessUserMetaInfo['alternate_phone'] = $request->input('alternate_phone');


                $objInserUsersDataModel = Usersmeta::getInstance();
                $UpdateusermetadataUserMeta = $objInserUsersDataModel->updateMetaUserData($updateBusinessUserMetaInfo, $userid);

                if ($UpdateusermetadataUserMeta) {
                    echo 2;
                    die;
                }

                break;


            default:
                break;

        }

    }

    public function adminprofile(Request $request)
    {


        $data = $request->session()->all();
        $user_id = $data['ror_admin']['id'];

        $objAdminUsersModel = User::getInstance();
        $AdminData = $objAdminUsersModel->getAdminDetails($user_id);

        if($request->isMethod('post')){


           $user_id = $data['ror_admin']['id'];
           // $data12['user_id'] = $AdminData->user_id;
            $data12['display_name'] = $request->input('display_name');
            $data12['full_name'] = $request->input('full_name');
            $data12['address'] = $request->input('address');
            $data12['city'] = $request->input('city');
            $data12['state'] = $request->input('state');
            $data12['country'] = $request->input('country');
            $data12['zipcode'] = $request->input('zipcode');
            $data12['primary_phone'] = $request->input('primary_phone');
            $data12['alternate_phone'] = $request->input('alternate_phone');

            $objupdateUsersDataModel = Usersmeta::getInstance();
            $UpdateAdminmetadataUserMeta = $objupdateUsersDataModel->updateAdminMetaUserData($data12, $user_id);

            $user_id = $data['ror_admin']['id'];
            $data122['email'] = $request->input('email');
            $objupdateUsersMetaDataModel = User::getInstance();
            $UpdateAdminmetadataUserMeta = $objupdateUsersMetaDataModel->updateAdminMetaUserData($data122, $user_id);



        }

        return view('Admin.Views.users.profile', ['AdminData' => $AdminData]);


    }


}
