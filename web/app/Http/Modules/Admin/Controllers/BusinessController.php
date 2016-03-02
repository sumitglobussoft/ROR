<?php

namespace App\Http\Modules\Admin\Controllers;

use App\Http\Modules\Admin\Models\Business;
use App\Http\Modules\Admin\Models\Category;
use App\Http\Modules\Admin\Models\User;
use App\Http\Modules\Admin\Models\Usersmeta;
use Illuminate\Http\Request;

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

class BusinessController extends Controller
{
    private $imageWidth = 1024;//TO BE USED FOR IMAGE RESIZING
    private $imageHeight = 1024;//TO BE USED FOR IMAGE RESIZING

    /*
     * Business Controller
     * Date 07-02-2015
     * author Sitesh Ranjan
     *
     */

     public function allbusinessDetails()
    {


        $objBusinessModel = Business::getInstance();
        $where['rawQuery'] = 1;
        $selectedColumns = ['business.*', 'category.category_name', 'subcategory.subcategory_name','user_meta.full_name','user_meta.primary_phone'];
        $allBusiness = $objBusinessModel->getAllDetails($selectedColumns);
//        echo '<pre>';
//        print_r($allBusiness);
//        die;



        $objCategory = new Category();
        $categoryData = $objCategory->getActiveCategory();
//        echo '<pre>';
//        print_r($allBusiness);
//        die;

        return view('Admin.Views.business.manage_business', ['allBusiness' => $allBusiness], ['categoryData' => $categoryData]);
    }


     public function businessAjaxhandler(Request $request)
    {
        $inputData = $request->input();
        $method = $inputData['method'];

        switch ($method) {

            case 'AddBusiness':

                $rules = array(
                    'business_name' => 'required|max:255',
                    'category' => 'required|max:255',
                    'add_sub_category' => 'required|max:255',
                    'description' => 'required|max:255',
                    'address' => 'required',
                    'phone' => 'required',
                    'web_address' => 'required',
                );

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    echo json_encode(['status' => 'error', 'msg' => $validator->messages()], true);
                } else {


                    $data = $request->session()->all();
                    $user_id = $data['ror_admin']['id'];

                    $BusinessDataInfo['user_id'] = $user_id;
                    $BusinessDataInfo['business_name'] = $request->input('business_name');
                    $BusinessDataInfo['category_id'] = $request->input('category');
                    $BusinessDataInfo['subcategory_id'] = $request->input('add_sub_category');
//                    print_r($BusinessDataInfo);
//                    die;
                    $BusinessDataInfo['description'] = $request->input('description');
                    $BusinessDataInfo['address'] = $request->input('address');
                    $BusinessDataInfo['phone'] = $request->input('phone');
                    $BusinessDataInfo['web_address'] = $request->input('web_address');
                    $BusinessDataInfo['status'] = $request->input('status');

                    $objAddBusiness = Business::getInstance();
                    $AddedBusiness = $objAddBusiness->InsertBusinessData($BusinessDataInfo);
                    if ($AddedBusiness) {
                        echo 1;
                        die;
                    } else {
                        echo 2;
                    }
                }

                break;

            case
            'EditBusinessInfo':

                $BusinessId = $request->input('business_id');

                $objGetBusinessDataForEdit = Business::getInstance();
                $EditBusinessData = $objGetBusinessDataForEdit->GetBusinessDataById($BusinessId);
//                echo '<pre>';
//                print_r($EditBusinessData);
//                die;

                echo json_encode($EditBusinessData);

                break;

            case 'updateBusinessInfo':


//                $rules = array(
//                    'business_name' => 'required|max:255',
//                    'category' => 'required|max:255',
//                    'sub_category' => 'required|max:255',
//                    'description' => 'required|max:255',
//                    'address' => 'required',
//                    'phone' => 'required',
//                    'web_address' => 'required',
//                    'status01' => 'required',
//                );
//
//                $validator = Validator::make($request->all(), $rules);
//                if ($validator->fails()) {
//                    echo json_encode(['status' => 'error', 'msg' => $validator->messages()], true);
//                }
//              else {

                  $BusinessId = $request->input('business_id');

                  $updateBusinessData['business_name'] = $request->input('business_name');
                  $updateBusinessData['category_id'] = $request->input('category_id');
                  $updateBusinessData['subcategory_id'] = $request->input('subcategory_id');
                  $updateBusinessData['description'] = $request->input('description');
                  $updateBusinessData['address'] = $request->input('address');
                  $updateBusinessData['phone'] = $request->input('phone');
                  $updateBusinessData['web_address'] = $request->input('web_address');
                  $updateBusinessData['status'] = $request->input('status01');
                  $objUpdateBusinessInfo = Business::getInstance();
                  $UpdateDataResult = $objUpdateBusinessInfo->UpdateBusinessdata($updateBusinessData, $BusinessId);
                  if ($UpdateDataResult) {
                      echo 1;
                      die;
                  }
//              }


                break;

            case 'DeleteBusinessInfo':

                $BusinessId = $request->input('business_id');

                $objDeleteBusinessInfo = Business::getInstance();
                $DeletedBusinessResponse = $objDeleteBusinessInfo->DeleteBusinessInfo($BusinessId);
                if ($DeletedBusinessResponse) {
                    echo 1;
                    die;

                }

                break;

            case 'Category':
                $category_id = $request->input('catgory_id');

                $objSubCategory = new Category();
                $SubCategoryData = $objSubCategory->getActiveSubCategoryById($category_id);
//                print_r($SubCategoryData);
//                die;
                echo json_encode($SubCategoryData);
                break;

//            case 'EditCategory':
//                $category_id = $request->input('catgory_id');
//                print_r($category_id);
//                die;


                break;
            default;
                break;

        }
    }

     public function pendingBusiness()
     {

         $objCategory = new Category();
         $categoryData = $objCategory->getActiveCategory();


         $objPendingBusinessModel = Business::getInstance();
         $where['rawQuery'] = 1;
         $selectedColumns = ['business.*', 'category.category_name', 'subcategory.subcategory_name','user_meta.full_name','user_meta.primary_phone'];
         $allpendingBusiness = $objPendingBusinessModel->getPendingBusiness($selectedColumns);


         return view('Admin.Views.business.pending_business',['allpendingBusiness' =>$allpendingBusiness],['categoryData' =>$categoryData]);
   }


     public function approvedBusiness()
        {

          $objCategory = new Category();
            $categoryData = $objCategory->getActiveCategory();


        $objApprovedBusinessModel = Business::getInstance();
        $where['rawQuery'] = 1;
        $selectedColumns = ['business.*', 'category.category_name', 'subcategory.subcategory_name','user_meta.full_name','user_meta.primary_phone'];
        $allApprovedBusiness = $objApprovedBusinessModel->getApprovedBusiness($selectedColumns);


        return view('Admin.Views.business.approved_business',['allApprovedBusiness' =>$allApprovedBusiness],['categoryData' =>$categoryData]);

   }



     public function unapprovedBusiness()
     {
         $objCategory = new Category();
         $categoryData = $objCategory->getActiveCategory();


        $objUnapprovedBusiness = Business::getInstance();
        $where['rawQuery'] = 1;
        $selectedColumns = ['business.*', 'category.category_name', 'subcategory.subcategory_name','user_meta.full_name','user_meta.primary_phone'];
        $allunapprovedBusiness = $objUnapprovedBusiness->getUnapprovedBusiness($selectedColumns);


        return view('Admin.Views.business.unapproved_business',['allunapprovedBusiness' =>$allunapprovedBusiness],['categoryData'=>$categoryData]);


    }

     public function AddBusinessInfoById(Request $request,$user_id){

        $objCategory = new Category();
        $categoryData = $objCategory->getActiveCategory();




     return view('Admin.Views.business.add_business',['user_id' => $user_id],['categoryData'=>$categoryData]);

     }


     public function businessbyidAjaxhandler(Request $request)
    {


        $inputData = $request->input();
        $method = $inputData['method'];

        switch ($method) {

            case 'AddBusinessById':

                $rules = array(
                    'business_name' => 'required|max:255',
                    'category' => 'required|max:255',
                    'add_sub_category' => 'required|max:255',
                    'description' => 'required|max:255',
                    'address' => 'required',
                    'phone' => 'required',
                    'web_address' => 'required',
                    'status' => 'required',
                );

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    echo json_encode(['status' => 'error', 'msg' => $validator->messages()], true);
                } else {


                    $BusinessDataInfo['user_id'] = $request->input('user_id');
                    $BusinessDataInfo['business_name'] = $request->input('business_name');
                    $BusinessDataInfo['category_id'] = $request->input('category');
                    $BusinessDataInfo['subcategory_id'] = $request->input('add_sub_category');
                    $BusinessDataInfo['description'] = $request->input('description');
                    $BusinessDataInfo['address'] = $request->input('address');
                    $BusinessDataInfo['phone'] = $request->input('phone');
                    $BusinessDataInfo['web_address'] = $request->input('web_address');
                    $BusinessDataInfo['status'] = $request->input('status');
//                print_r($BusinessDataInfo);
//                die;

                    $objAddBusiness = Business::getInstance();
                    $AddedBusiness = $objAddBusiness->InsertBusinessData($BusinessDataInfo);
                    if ($AddedBusiness) {
                        echo 1;
                        die;
                    }


//                if($AddedBusiness){
//                     echo 1;
//                    die;
//                }


                }}
        }



            public function AddBusinessData()
            {





            }

}








