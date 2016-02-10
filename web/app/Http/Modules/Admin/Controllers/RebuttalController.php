<?php

namespace App\Http\Modules\Admin\Controllers;


//include public_path() . "/../vendor/mandrill/src/Mandrill.php";

use App\Http\Modules\Admin\Models\Rebuttal;
use Illuminate\Support\Facades\Input;
use App\Http\Modules\Admin\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

use Illuminate\Support\Facades\Session;
use Image;
use Validator;
//use Input;
use Redirect;
use File;


class RebuttalController extends Controller
{
    private $imageWidth = 1024;//TO BE USED FOR IMAGE RESIZING
    private $imageHeight = 1024;//TO BE USED FOR IMAGE RESIZING


    public function rebuttalguidelines(Request $request)
    {

//      return view('Admin.Views.rebuttal.rebuttal');



        $data = $request->session()->all();
        $user_id =$data['ror_admin']['id'];
//        print_r($user_id);
//        die;


        if ($request->isMethod('post')) {


            $categoryData['relationship_to_company'] = $request->input('relationship_to_company');
            $categoryData['user_id'] = $user_id;
            Session::put('relationship_to_company', $categoryData['relationship_to_company']);

            $objInsertCategory =Rebuttal::getInstance();
            $where['rawQuery'] = 1;
            $review_id =$objInsertCategory->insertcategorydata($categoryData,$user_id);

            Session::put('review_id',$review_id);

//            print_r($categoryDatas);
//            die;

            if (Session::has('relationship_to_company')) {

// die('dsds');

                return redirect('/admin/rebuttal?step=2');



//                 echo'<pre>'; print_r(Session::all());die;
//                return redirect('/admin/rebuttal?step=2');
//               return view('Admin.Views.rebuttal.rebuttal');


            }
            else{

            }



        }
        return view('Admin.Views.rebuttal.rebuttal');

    }


    public function writeyourreport(Request $request)
    {

        if ($request->isMethod('post')) {

        $rebutalInfoData = array('
                rebuttal_title' => $request->input('rebuttal_title'),
                'rebuttal_body' => $request->input('rebuttal_body'),
                'display_name' => $request->input('displayname'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
            );

            Session::put('rebutalInfoData', $rebutalInfoData);
            $data = $request->session()->all();

            $reviews_id =$data['review_id'];
            $rebutalInfoData['relationship_to_company'] =$data['relationship_to_company'];
//            print_r($rebutalInfoData);
//            die;

//            echo'<pre>'; print_r($review_id);die;

            $insertWriteYourReportData = Rebuttal::getInstance();
            $reviews_ids =$insertWriteYourReportData->UpdateWriteYourReportData($rebutalInfoData,$reviews_id);
//            print_r($reviews_ids);
//            die;


            if (Session::has('rebutalInfoData')) {
                return redirect('/admin/rebuttal?step=3');

//                  echo'<pre>'; print_r(Session::all());

            }

        }
        return view('Admin.Views.rebuttal.rebuttal');
    }


    public function reviewandsubmit(Request $request)
    {


        if ($request->isMethod('post')) {

//            print_r($_FILES['manage_image']['name']);


            if ($_FILES['manage_image']['name']) {
                $target_dir = 'assets/uploads/reviewimages/';
                $ext = explode('.', basename($_FILES['manage_image']['name']));
                $file_extension = end($ext);
                $newName = md5(uniqid()) . "." . $file_extension;
                $target_path = $target_dir . "/" . $newName;

                if (move_uploaded_file($_FILES['manage_image']['tmp_name'], $target_path)) {
                    echo " pic uploaded successfully!.<br/><br/>";
                } else {
                    echo "please try again!.<br/><br/>";
                }
                $rebutalInfoData['file_type'] = "/" . $target_path;

                Session::put('file_type', $rebutalInfoData['file_type']);
//                echo'<pre>'; print_r(Session::all());
//                die;
            }
            if ($_FILES['fileToUpload']['name']) {


                $target_dir = 'assets/uploads/reviewimages/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                    if (!file_exists($target_dir)) {
                        die('Failed to create folders...');
                    }
                }
//                print_r($target_dir);
//                die;
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//                print_r($target_file);
                  $video_path=$_FILES['fileToUpload']['name'];
//                print_r($video_path);
//                die;
                if(file_exists($target_dir)) {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                        echo "uploaded ";
                    } else {

                        echo "not uploaded";
                    }
                }else{
                    echo "folder not created";
                }
   }

        }

            }


//            if($request->isMethod('post')){
//
//
//
////                $res = NULL;
////                $res->success = false;
//               $target_dir ="assets/uploads/reviewimages/";
//
////                print_r($target_dir);
////                die;
////                if (!file_exists($target_dir)) {
////                    mkdir($target_dir,0777,true);
////                    if (!file_exists($target_dir)) {
////                        die('Failed to create folders...');
////                    }
////                }
////                            die("i am here");
//                if(file_exists($target_dir)) {
//                    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
////                    print_r($target_file);
////                    die();
//                    $file_size_max = 2147483648;
//                    $uploadOk = 1;
//                    $videoFileType = pathinfo($target_file, PATHINFO_EXTENSION);
////     print_r($videoFileType);
////                    $file_size = $_FILES['files']['size'];
//                    //check file size
////                    if ($file_size <= $file_size_max) {
////                        $uploadOk = 1;
////                    } else {
////                        $this->view->errorupload="Video is too large to upload";
////                        $uploadOk = 0;
////                    }
//                    // Check if file already exists
//                    if (file_exists($target_file)) {
//                        $this->view->errorupload="Sorry, file already exists.";
//                        $uploadOk = 0;
//                    }
//                    // Allow certain file formats
//                    if ($videoFileType != "mp4"){
//                        $this->view->errorupload="Sorry, only .mp4 videos are allowed";
//                        $uploadOk = 0;
//                    }
//                    $target_file='http://localhost.ripoffreport.com/assets/uploads/reviewimages/Recording #170.mp4';
//
//                    print_r($_FILES["fileToUpload"]["tmp_name"],$target_file);
//                    die('test');
//
//                        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
////                            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
//
//                            echo 'done';
//
//                        } else {
//                            echo "Sorry, there was an error uploading your file.";
//                        }
//                    }
//                else{
//
//                    echo 'failed';
//                }






}