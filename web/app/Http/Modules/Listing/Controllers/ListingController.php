<?php

namespace App\Http\Modules\Listing\Controllers;


use App\Http\Modules\Listing\Models\Business;
use App\Http\Modules\Listing\Models\Category;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;


class ListingController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Date 22/02/2016
     */

    public function listing(Request $request)
    {

        $objCategory = Category::getInstance();
        $CategoryData = $objCategory->getActiveCategory();
//        print_a($CategoryData);
//        die;
//        $cate_count =count($CategoryData);


        return view('Listing.Views.listing.listing', ['CategoryData' => $CategoryData]);

    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Exception
     */
    public function search(Request $request)
    {
        if ($request->isMethod('get')) {

            $keyword = $request->input('keyword');
            $where = $request->input('where');

//
            if ($keyword) {
                $objGetBusiness = new Business();
                $resultByKey = $objGetBusiness->searchBusinessBykeyboard($keyword);
                if ($resultByKey) {
                    echo '<pre>';
                    print_r($resultByKey);
                    die;
                 }
                else{
                    return redirect()->back()->with('succmsg', 'No Listing Found.');
                }
            } elseif ($where) {

                $objBusiness = new Business();
                $resultByAddres = $objBusiness->GetBusinessByAddres($where);
                if ($resultByAddres) {
                    echo '<pre>';
                    print_r($resultByAddres);
                    die;
                } else {
                    return redirect()->back()->with('succmsg', 'No Listing Found.');
                }
            }
        }
        return view('Listing.Views.listing.listing');
    }
    public function demo()
    {
          return 1;
    }

    public function listingAjaxHandler(Request $request)
    {
        $inputData = $request->input();
        $method = $inputData['method'];
        switch ($method) {

            case 'Category':
                $category_id = $request->input('category_id');
                $objsubcategoryById = new Category();
                $resultcategory = $objsubcategoryById->getsubcategory($category_id);
                echo json_encode($resultcategory);
                break;
            case 'SubCategory';
                $subcategory_id = $request->input('subCategory_id');
                $objsubcategoryByname = new Category();
                $resultsubcategory = $objsubcategoryByname->getsubcategoryByname($subcategory_id);
                echo json_encode($resultsubcategory);
                break;
            default:
                break;
        }

    }

    public function addBusinessForListing(Request $request)
    {
        $data = $request->session()->all();
        $user_id = $data['ror_user']['id'];
        $objCategory = Category::getInstance();
        $CategoryData = $objCategory->getActiveCategory();
        $businessData = array();
        if ($request->isMethod('post')) {
            $businessData['user_id'] = $user_id;
            $businessData['business_name'] = $request->input('business_name');
            $businessData['category_id'] = $request->input('category');
            $businessData['subcategory_id'] = $request->input('add_sub_category');
            $businessData['description'] = $request->input('description');
            $businessData['address'] = $request->input('address');
            $businessData['country'] = $request->input('country');
            $businessData['state'] = $request->input('state');
            $businessData['city'] = $request->input('city');
            $businessData['zipcode'] = $request->input('zipcode');
            $businessData['phone'] = $request->input('phone');
            $businessData['web_address'] = $request->input('web_address');
            $businessData['fax'] = $request->input('fax');
            $businessData['url'] = $request->input('url');
            $businessData['status'] = 0;
            $businessData['language'] = $request->input('language');
            $objAddBusiness = Business::getInstance();
            $resultBusiness = $objAddBusiness->InsertBusinessData($businessData);
            return redirect('/');
        }
        return view('Listing.Views.listing.add_business', ['CategoryData' => $CategoryData]);
    }


    public function viewList(Request $request, $category_name, $subcategory_name)
    {

        $objGetcatory = Category::getInstance();
        $result = $objGetcatory->getCategoryByname($subcategory_name);
        $subid = $result[0]->subcategory_id;
        $objGetBusiness = new Business();
        $result = $objGetBusiness->GetBusinessBySubcategoryId($subid);
        if ($result) {
            echo '<pre>';
            print_r($result);
            die;

        } else {

            return redirect()->back()->with('succmsg', 'No Listing Found.');
        }
    }
    public function captcha(){
        return view('Listing.Views.listing.captcha');

    }

    public function pegination(Request $request)
    {
        $letter = $request['letter'];
        if($letter){
            $objgetListing = new Business();
            $Resultbusinessbyletter =$objgetListing->GetBusinessByName($letter);
//            print_r($Resultbusinessbyletter);
//            die;
            if($Resultbusinessbyletter){
                return view('Listing.Views.listing.pegination', ['Resultbusinessbyletter' => $Resultbusinessbyletter]);
            }
            else{
                echo 'error';
            }



        }


        return view('Listing.Views.listing.pegination');
    }


}
