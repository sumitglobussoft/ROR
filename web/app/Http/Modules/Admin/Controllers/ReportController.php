<?php

namespace App\Http\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Modules\Admin\Models\Category;
use App\Http\Modules\Admin\Models\Report;
use App\Http\Modules\Admin\Models\Review;
use App\Http\Modules\Admin\Models\Users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Modules\Admin\Models\User;
use Illuminate\Support\Facades\Session;
use Config;

class ReportController extends Controller {

//    public function __call(){
//
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $apiurl = Config::get('app.apiurl');
        $this->apiurl = $apiurl;
    }

    public function index() {
        //
//        return view("Admin\admin")
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function ajaxAction(Request $data) {
        if ($data->isMethod('post')) {
            $method = $data->input('method');
            switch ($method) {
                case "getsubcategory":
                    $categoryid = $data->input('categoryid');
                    $objCategory = new category();
                    $result = $objCategory->getActiveSubCategory($categoryid);
                    echo json_encode($result);
                    die;
                    break;

                case "editreport":
                    $reportid = $data->input('reportid');
                    $objReport = new report();
                    $result = $objReport->getReportById($reportid);
                    Session::forget('report');
                    $reportstepone = array();
                    $reportstepone['companyname'] = $result->company_or_individual_name;
                    $reportstepone['aka'] = $result->company_or_individual_aka;
                    $reportstepone['webaddress'] = $result->web_address;
                    $reportstepone['locationtype'] = $result->location_type;
                    $reportstepone['streetaddress'] = $result->street_address;
                    $reportstepone['city'] = $result->city;
                    $reportstepone['state'] = $result->state;
                    $reportstepone['zipcode'] = $result->zip_code;
                    $reportstepone['country'] = $result->country;
                    $reportstepone['fax'] = $result->fax;
                    $reportstepone['phone'] = $result->phone;
                    $reportstepone['email'] = $result->email_address;
                    Session::put('report.stepone', $reportstepone);
                    Session::put('report.id', $reportid);
                    $reportsteptwo = array();
                    $reportsteptwo['title'] = $result->report_title;
                    $reportsteptwo['category'] = $result->category_id;
                    $reportsteptwo['subcategory'] = $result->subcategory_id;
                    Session::put('report.steptwo', $reportsteptwo);
                    redirect('/admin/reportstepfour');
                    die;
                    break;
                case "viewreport":
                    $reportid = $data->input('reportid');
                    $objReport = new report();
                    $report = $objReport->getReportDetailsById($reportid);
                    $reportarray = (array) $report;
                    $file = $objReport->getReportFileDetailsById($reportid);
                    $filearray = (array) $file;
                    $reportarray['files'] = $filearray;
                    echo json_encode($reportarray);
                    die;
                    break;
                case "getreviewdetails":
                    $reviewid = $data->input('reviewid');
                    $objReview = new review();
                    $result = $objReview->getReviewDetailsById($reviewid);
                    echo json_encode($result);die;

                   case "getreports":
                    $objReport = new report();
                    $result=$objReport->getAllReports();
                     echo json_encode($result);die;
                default :
                    break;
            }
        }
    }
    public function storeSession($reportid, Request $data) {
        $objReport = new report();
        $result = $objReport->getReportById($reportid);
        Session::forget('report');
        $reportstepone = array();
        $reportstepone['companyname'] = $result->company_or_individual_name;
        $reportstepone['aka'] = $result->company_or_individual_aka;
        $reportstepone['webaddress'] = $result->web_address;
        $reportstepone['locationtype'] = $result->location_type;
        $reportstepone['streetaddress'] = $result->street_address;
        $reportstepone['city'] = $result->city;
        $reportstepone['state'] = $result->state;
        $reportstepone['zipcode'] = $result->zip_code;
        $reportstepone['country'] = $result->country;
        $reportstepone['fax'] = $result->fax;
        $reportstepone['phone'] = $result->phone;
        $reportstepone['email'] = $result->email_address;
        Session::put('report.stepone', $reportstepone);
        Session::put('report.id', $reportid);
        $reportsteptwo = array();
        $reportsteptwo['title'] = $result->report_title;
        $reportsteptwo['category'] = $result->category_id;
        $reportsteptwo['subcategory'] = $result->subcategory_id;
        Session::put('report.steptwo', $reportsteptwo);
        $reportstepthree = array();
        $reportstepthree['report_text'] = $result->report_text;
        $reportstepthree['transaction'] = $result->is_online_transaction;
        $reportstepthree['card'] = $result->is_credit_card_used;
        $reportstepthree['reporter_displayname'] = $result->display_name;
        Session::put('report.stepthree', $reportstepthree);
        return redirect('/admin/filereport');
        die;
    }

    public function removeSession(Request $data) {
        if(Session::has('report')){
            Session::forget('report');
        }
     return redirect('/admin/filereport');
    }

     public function fileReport(Request $data) {
          if(Session::has('report.user_id')){
            $userid = Session::get('report.user_id');
          }
          else{
            $userid = Auth::user()->id;
          }
        if ($data->isMethod('post')) {
            $steponecompanyname = $data->input('steponecompanyname');
            $steponeakaname = $data->input('steponeakaname');
            $steponewebaddress = $data->input('steponewebaddress');
            $steponelocationtype = $data->input('steponelocationtype');
            if ($steponelocationtype == 1) {
                $steponestreet = "";
                $steponecity = "";
                $steponestate = "Nationalwide";
                $steponezip = "";
                $steponecountry = "";
            } else if ($steponelocationtype == 2) {
                $steponestreet = "";
                $steponecity = "";
                $steponestate = "Internet";
                $steponezip = "";
                $steponecountry = "";
            } else {
                $steponestreet = $data->input('steponestreet');
                $steponecity = $data->input('steponecity');
                $steponestate = $data->input('steponestate');
                $steponezip = $data->input('steponezip');
                $steponecountry = $data->input('steponecountry');
            }
            $steponefax = $data->input('steponefax');
            $steponephone = $data->input('steponephone');
            $steponeemail = $data->input('steponeemail');
            Session::forget('report.stepone');
            $reportstepone = array();
            $reportstepone['companyname'] = $steponecompanyname;
            $reportstepone['aka'] = $steponeakaname;
            $reportstepone['webaddress'] = $steponewebaddress;
            $reportstepone['locationtype'] = $steponelocationtype;
            $reportstepone['streetaddress'] = $steponestreet;
            $reportstepone['city'] = $steponecity;
            $reportstepone['state'] = $steponestate;
            $reportstepone['zipcode'] = $steponezip;
            $reportstepone['country'] = $steponecountry;
            $reportstepone['fax'] = $steponefax;
            $reportstepone['phone'] = $steponephone;
            $reportstepone['email'] = $steponeemail;
            Session::put('report.stepone', $reportstepone);
            return redirect('/admin/filereport?step=2');
        }
        if ($data->isMethod('get')) {
            $step = $data->input('step');
            if ($step == 2) {
                $objCategory = new category();
                $category = $objCategory->getActiveCategory();
                 if (Session::has('report.stepone') && Session::has('report.steptwo')) {
                    $steponesession = Session::get('report.stepone');
                    $steptwosession = Session::get('report.steptwo');
                    $objCategory = new category();
                    $subcategory = $objCategory->getActiveSubCategory($steptwosession['category']);
                    if(!$subcategory)
                        $subcategory=array();
                    return view('Admin/Views/report/filereport', ['sessiondata' => $steponesession,'sessiontwodata' => $steptwosession, 'category' => $category,'subcategory'=>$subcategory]);
                }
                else if (Session::has('report.stepone')) {
                    $steponesession = Session::get('report.stepone');
                    return view('Admin/Views/report/filereport', ['sessiondata' => $steponesession, 'category' => $category]);
                } else {
                    return redirect('/admin/filereport');
                }
            } else if ($step == 3) {
                $objUser = new user();
                $reportuser = $objUser->getReportUserInfo($userid);
                if(Session::has('report.stepthree')){
                    $stepthreesession = Session::get('report.stepthree');
                   return view('Admin/Views/report/filereport', ['userdata' => $reportuser,'stepthreesession'=>$stepthreesession]); 
                }
                else if (Session::has('report.stepone') && Session::has('report.steptwo')) {
                    return view('Admin/Views/report/filereport', ['userdata' => $reportuser]);
                }
               else if (Session::has('report.stepone')) {
                   return redirect('/admin/filereport?step=2');
               } 
                else {
                    return redirect('/admin/filereport');
                }
            } else if ($step == 4) {
                if (Session::has('report.stepone') && Session::has('report.steptwo') && Session::has('report.stepthree')) {
                    if (Session::has('report.id')) {
                        $reportid = Session::get('report.id');
                    } else {
                        return redirect('/admin/filereport');
                    }
                    $objReport = new report();
                    $reportresponse = $objReport->getReportFilesById($reportid);
                    return view('Admin/Views/report/filereport', ['reportfiledata' => $reportresponse]);
                }
                else if(Session::has('report.stepthree')){
                    $stepthreesession = Session::get('report.stepthree');
                   return view('Admin/Views/report/filereport', ['userdata' => $reportuser,'stepthreesession'=>$stepthreesession]); 
                }
                else if (Session::has('report.stepone') && Session::has('report.steptwo')) {
                    return view('Admin/Views/report/filereport', ['userdata' => $reportuser]);
                }
               else if (Session::has('report.stepone')) {
                   return redirect('/admin/filereport?step=2');
               } 
                else {
                    return redirect('/admin/filereport');
                }


            } else if ($step == 5) {
                if (Session::has('report.stepone') && Session::has('report.steptwo') && Session::has('report.stepthree')) {
                    if (Session::has('report.id')) {
                        $reportid = Session::get('report.id');
                    } else {
                        return redirect('/admin/filereport');
                    }
                    return view('Admin/Views/report/filereport');
                }
                else if(Session::has('report.stepthree')){
                    $stepthreesession = Session::get('report.stepthree');
                   return view('Admin/Views/report/filereport', ['userdata' => $reportuser,'stepthreesession'=>$stepthreesession]); 
                }
                else if (Session::has('report.stepone') && Session::has('report.steptwo')) {
                    return view('Admin/Views/report/filereport', ['userdata' => $reportuser]);
                }
               else if (Session::has('report.stepone')) {
                   return redirect('/admin/filereport?step=2');
               } 
                else {
                    return redirect('/admin/filereport');
                }
            } else {
                // This is for edit report getting from session.
                if (Session::has('report.stepone') && Session::has('report.id')) {
                    $steponedata = Session::get('report.stepone');
                    return view('Admin/Views/report/filereport', ['steponedata' => $steponedata]);
                }
                else if(Session::has('report.stepone'))
                {
                    $steponedata = Session::get('report.stepone');
                    return view('Admin/Views/report/filereport', ['steponedata' => $steponedata]);
                }
                return view('Admin/Views/report/filereport');
            }
        }

        return view('Admin/Views/report/filereport');
    }

    public function reportStepTwo(Request $data) {
        if(Session::has('report.user_id')){
            $userid = Session::get('report.user_id');
          }
          else{
            $userid = Auth::user()->id;
          }

        if ($data->isMethod('post')) {
            $steptwocompanyname = $data->input('steptwocompanyname');
            $steptwodescriptive = $data->input('steptwodescriptive');
            $steptwocity = $data->input('steptwocity');
            $steptwostate = $data->input('steptwostate');
            $steptwocategory = $data->input('steptwocategory');
            $steptwosubcategory = $data->input('steptwosubcategory');
            $reportsteptwo = array();
            $reportsteptwo['title'] = $steptwocompanyname . $steptwodescriptive . $steptwocity . $steptwostate;
            $reportsteptwo['category'] = $steptwocategory;
            $reportsteptwo['subcategory'] = $steptwosubcategory;

            Session::put('report.steptwo', $reportsteptwo);
            if (Session::has('report.stepone')) {
                $steponesession = Session::get('report.stepone');
            } else {
                return redirect('/admin/filereport');
            }
            $reportdata = array();
            $reportdata['user_id'] = $userid;
            $reportdata['category_id'] = $steptwocategory;
            $reportdata['subcategory_id'] = $steptwosubcategory;
            $reportdata['company_or_individual_name'] = $steponesession['companyname'];
            $reportdata['company_or_individual_aka'] = $steponesession['aka'];
            $reportdata['web_address'] = $steponesession['webaddress'];
            $reportdata['descriptive_words'] = $steptwodescriptive;
            $reportdata['report_title'] = $reportsteptwo['title'];
            $reportdata['street_address'] = $steponesession['streetaddress'];
            $reportdata['city'] = $steponesession['city'];
            $reportdata['state'] = $steponesession['state'];
            $reportdata['country'] = $steponesession['country'];
            $reportdata['fax'] = $steponesession['fax'];
            $reportdata['zip_code'] = $steponesession['zipcode'];
            $reportdata['email_address'] = $steponesession['phone'];
            $reportdata['phone'] = $steponesession['phone'];

            if (Session::has('report.id')) {
                $reportid = Session::get('report.id');
                $objReport = new report();
                $reportresponse = $objReport->updateReportStepTwo($reportdata, $reportid);
                return redirect('/admin/filereport?step=3');
            } else {
                $objReport = new report();
                $reportresponse = $objReport->createReport($reportdata);
                Session::put('report.id', $reportresponse);
                return redirect('/admin/filereport?step=3');
            }
        }
    }

    public function reportStepThree(Request $data) {
        if(Session::has('report.user_id')){
            $userid = Session::get('report.user_id');
          }
          else{
            $userid = Auth::user()->id;
          }
        if ($data->isMethod('post')) {
            $stepthreereport = $data->input('stepthreereport');
            $stepthreecard = $data->input('stepthreecard');
            $stepthreetransaction = $data->input('stepthreetransaction');
            $stepthreedisplayname = $data->input('stepthreedisplayname');
            $stepthreecity = $data->input('stepthreecity');
            $stepthreestate = $data->input('stepthreestate');
            $stepthreecountry = $data->input('stepthreecountry');
            $reportstepthree = array();
            $reportstepthree['report_text'] = $stepthreereport;
            $reportstepthree['transaction'] = $stepthreecard;
            $reportstepthree['card'] = $stepthreetransaction;
            $reportstepthree['reporter_displayname'] = $stepthreedisplayname;
            $reportstepthree['reporter_city'] = $stepthreecity;
            $reportstepthree['reporter_state'] = $stepthreestate;
            $reportstepthree['reporter_country'] = $stepthreecountry;
            Session::forget('report.stepthree');
            Session::put('report.stepthree', $reportstepthree);

            if (Session::has('report.id')) {
                $reportid = Session::get('report.id');
            } else {
                return redirect('/admin/filereport');
            }

            $reportdata = array();
            $reportdata['report_text'] = $stepthreereport;
            $reportdata['is_credit_card_used'] = $stepthreecard;
            $reportdata['is_online_transaction'] = $stepthreetransaction;
            $reportdata['display_name'] = $stepthreedisplayname;
            $objReport = new report();
            $reportresponse = $objReport->insertReportStepThree($reportdata, $reportid, $userid);
            return redirect('/admin/filereport?step=4');
        }
    }

    public function reportStepFour(Request $data) {
        
        $x = Session::All();
        echo "<pre>";
        print_r($x);
        die;
        return view('Admin/Views/report/filereport');
    }

    public function reportStepFive(Request $data) {
          if(Session::has('report.user_id')){
            $userid = Session::get('report.user_id');
          }
          else{
            $userid = Auth::user()->id;
          }
        if ($data->isMethod('post')) {
            if (Session::has('report.id')) {
                $reportid = Session::get('report.id');
            } else {
                return redirect('/admin/filereport');
            }
            $stepfivetc = $data->input('stepfivetc');
            $stepfivecontact = $data->input('stepfivecontact');
             $reportdata = array();
             $reportdata['tc'] = $stepfivetc;
            $reportdata['contact_investigation'] = $stepfivecontact;
             $objReport = new report();
            $reportresponse = $objReport->updateReportStepFive($reportdata, $reportid, $userid);
            if (Session::has('report')) {
            Session::forget('report');
            }
            return redirect('/admin/listfilereport');
          }
//        return view('Admin/Views/report/filereport');
    }

    public function uploadImage(Request $data) {
        if(Session::has('report.user_id')){
            $userid = Session::get('report.user_id');
          }
          else{
            $userid = Auth::user()->id;
          }
        if (Session::has('report.id')) {
            $reportid = Session::get('report.id');
        } else {
            return redirect('/admin/filereport');
        }
        if ($data->isMethod('post')) {
            $stepfourcaption = $data->input('stepfourphotocaption');
            $destinationpath = getcwd().'/assets/uploads/reports/' . $userid . '/' . $reportid . '/images/';
            if (!(is_dir($destinationpath))) {
                if (!$result = mkdir($destinationpath, 0777, true)) {
                    die('could not create directory');
                }
            }
            $allowedExts = array("jpg", "jpeg", "gif", "png", "tif");
            $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $basefilename = pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME);
            $basefilename = str_replace(' ', '_', $basefilename);
            $date = date('Y-m-d H:i:s');
            $currentdate = strtotime($date);
//            echo $currentdate;die;
            if (( ($_FILES["photo"]["type"] == "image/pjpeg")
                    || ($_FILES["photo"]["type"] == "image/gif")
                    || ($_FILES["photo"]["type"] == "image/jpeg")
                    || ($_FILES["photo"]["type"] == "image/png")
                    || ($_FILES["photo"]["type"] == "image/tif"))
                    && ($_FILES["photo"]["size"] < 50000000)
                    && in_array($extension, $allowedExts)) {
                if ($_FILES["photo"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["photo"]["error"] . "<br />";
                    die;
                } else {
//                    echo "Upload: " . $_FILES["photo"]["name"] . "<br />";
//                    echo "Type: " . $_FILES["photo"]["type"] . "<br />";
//                    echo "Size: " . ($_FILES["photo"]["size"] / 1024) . " Kb<br />";
//                    echo "Temp file: " . $_FILES["photo"]["tmp_name"] . "<br />";

                    if (file_exists($destinationpath . $_FILES["photo"]["name"])) {
                        echo $_FILES["photo"]["name"] . " already exists. ";
                    } else {
                        
//                        move_uploaded_file($_FILES["photo"]["tmp_name"], $destinationpath.$_FILES["photo"]["name"]);
                        $finalpath = $destinationpath . $basefilename . '_' . $currentdate . '.' . $extension;
                        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $finalpath)) {
                            $reportdata = array();
                            $databasepath='/assets/uploads/reports/' . $userid . '/' . $reportid . '/images/';
                            $dbpath=$databasepath . $basefilename . '_' . $currentdate . '.' . $extension;
                            $reportdata['report_id'] = $reportid;
                            $reportdata['file_type'] = 0;
                            $reportdata['file_path'] = $dbpath;
                            $reportdata['caption'] = $stepfourcaption;
                            $reportdata['name'] = $basefilename;


                            $objReport = new report();
                            $reportresponse = $objReport->insertReportFile($reportdata);
                            echo "Stored in: " . $destinationpath . $destinationpath . $basefilename . '_' . $currentdate . '.' . $extension;
                            return redirect('/admin/filereport?step=4');
                        } else {
                            echo "error in upload";
                            die;
                        }
                    }
                }
            } else {
                echo "Invalid file";
                die;
            }
        }
    }

    public function uploadVideo(Request $data) {
        if(Session::has('report.user_id')){
            $userid = Session::get('report.user_id');
          }
          else{
            $userid = Auth::user()->id;
          }
        if (Session::has('report.id')) {
            $reportid = Session::get('report.id');
        } else {
            return redirect('/admin/filereport');
        }
        if ($data->isMethod('post')) {
            $stepfourcaption = $data->input('stepfourvideocaption');
            $destinationpath =getcwd().'/assets/uploads/reports/' . $userid . '/' . $reportid . '/videos/';
            if (!(is_dir($destinationpath))) {
                if (!$result = mkdir($destinationpath, 0777, true)) {
                    die('could not create directory');
                }
            }
            
//            $allowedExts = array("3gp", "asf", "avi", "dv", "flv", "mov", "mp4", "mpg", "mpeg", "mpeg2", "ogg", "pcm", "rm", "vob", "wav", "webm","wmv");
           $allowedExts = array("3gp", "mp4",  "ogg",  "webm");
            $extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
            $basefilename = pathinfo($_FILES['video']['name'], PATHINFO_FILENAME);
            $basefilename = str_replace(' ', '_', $basefilename);
            $date = date('Y-m-d H:i:s');
            $currentdate = strtotime($date);
            if ((($_FILES["video"]["type"] == "video/mp4")
                    || ($_FILES["video"]["type"] == "video/ogg")
//                    || ($_FILES["video"]["type"] == "video/x-ms-wmv")
//                    || ($_FILES["video"]["type"] == "video/x-ms-asf")
//                    || ($_FILES["video"]["type"] == "application/x-troff-msvideo")
                    || ($_FILES["video"]["type"] == "video/3gpp")
                    
//                    || ($_FILES["video"]["type"] == "video/avi")
//                    || ($_FILES["video"]["type"] == "video/msvideo")
//                    || ($_FILES["video"]["type"] == "video/x-msvideo")
//                    || ($_FILES["video"]["type"] == "video/x-dv")
//                    || ($_FILES["video"]["type"] == "video/quicktime")
//                    || ($_FILES["video"]["type"] == "video/mpeg")
//                    || ($_FILES["video"]["type"] == "video/mpeg")
//                    || ($_FILES["video"]["type"] == "application/vnd.rn-realmedia")
//                    || ($_FILES["video"]["type"] == "audio/x-wav")
//                    || ($_FILES["video"]["type"] == "audio/wav")
//                    || ($_FILES["video"]["type"] == "application/vnd.xara")
                     || ($_FILES["video"]["type"] == "video/webm"))
                    && ($_FILES["video"]["size"] < 50000000)
                    && in_array($extension, $allowedExts)) {
                if ($_FILES["video"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["video"]["error"] . "<br />";
                    die;
                } else {
//                    echo "Upload: " . $_FILES["photo"]["name"] . "<br />";
//                    echo "Type: " . $_FILES["photo"]["type"] . "<br />";
//                    echo "Size: " . ($_FILES["photo"]["size"] / 1024) . " Kb<br />";
//                    echo "Temp file: " . $_FILES["photo"]["tmp_name"] . "<br />";

                    if (file_exists($destinationpath . $_FILES["video"]["name"])) {
                        echo $_FILES["video"]["name"] . " already exists. ";
                    } else {
//                        move_uploaded_file($_FILES["photo"]["tmp_name"], $destinationpath.$_FILES["photo"]["name"]);
                        $finalpath = $destinationpath . $basefilename . '_' . $currentdate . '.' . $extension;
                        if (move_uploaded_file($_FILES["video"]["tmp_name"], $finalpath)) {
                            $databasepath='/assets/uploads/reports/' . $userid . '/' . $reportid . '/videos/';
                            $dbpath=$databasepath . $basefilename . '_' . $currentdate . '.' . $extension;
                            $reportdata = array();
                            $reportdata['report_id'] = $reportid;
                            $reportdata['file_type'] = 1;
                            $reportdata['file_path'] = $dbpath;
                            $reportdata['caption'] = $stepfourcaption;
                            $reportdata['name'] = $basefilename;


                            $objReport = new report();
                            $reportresponse = $objReport->insertReportFile($reportdata);
                            echo "Stored in: " . $destinationpath . $destinationpath . $basefilename . '_' . $currentdate . '.' . $extension;
                            return redirect('/admin/filereport?step=4');
                        } else {
                            echo "error in upload";
                            die;
                        }
                    }
                }
            } else {
                echo "Invalid file";
                die;
            }
        }
    }

    public function uploadYouTube(Request $data) {
        if(Session::has('report.user_id')){
            $userid = Session::get('report.user_id');
          }
          else{
            $userid = Auth::user()->id;
          }
        if (Session::has('report.id')) {
            $reportid = Session::get('report.id');
        } else {
            return redirect('/admin/filereport');
        }
        if ($data->isMethod('post')) {

            $stepfouryoutube = $data->input('stepfouryoutube');

            $reportdata = array();
            $reportdata['report_id'] = $reportid;
            $reportdata['file_type'] = 2;
            $reportdata['file_path'] = $stepfouryoutube;
            $objReport = new report();
            $reportresponse = $objReport->insertReportFile($reportdata);
            return redirect('/admin/filereport?step=4');
        }
    }
    
    
    
    
      public function listFileReport(Request $data)
    {
        $objReport = new report();
          if ($data->isMethod('post')) {
            $stepfouryoutube = $data->input('stepfouryoutube');
          }
        $result=$objReport->getAllReports();
       
             if($result)
                 return view('Admin/Views/report/list-file-report',['report_data' => $result]);
             else
                 return view('Admin/Views/report/list-file-report')->withErrors([
                        'errMsg' => 'Error in Add Category.'
                    ]);

    }
       public function pendingReport(Request $data) {
        $objReport = new report();
        $result = $objReport->getPendingReports();
        if ($result)
            return view('Admin/Views/report/pending-report', ['pending_report_data' => $result]);
        else
            return view('Admin/Views/report/pending-report')->withErrors([
                        'errMsg' => 'Error in Add Category.'
                    ]);
    }
    public function approvedReport(Request $data) {
        $objReport = new report();

        $result = $objReport->getApprovedReports();

        if ($result)
            return view('Admin/Views/report/approved-report', ['approved_report_data' => $result]);
        else
            return view('Admin/Views/report/approved-report')->withErrors([
                        'errMsg' => 'Error in Add Category.'
                    ]);
    }
    public function unapprovedReport(Request $data) {
        $objReport = new report();

        $result = $objReport->getUnapprovedReports();

        if ($result)
            return view('Admin/Views/report/unapproved-report', ['unapproved_report_data' => $result]);
        else
            return view('Admin/Views/report/unapproved-report')->withErrors([
                        'errMsg' => 'Error in Add Category.'
                    ]);
    }
      public function changeReportStatus(Request $data)
    {
           if ($data->isMethod('post')) {
            $changereportid = $data->input('changereportid');
            $currentstatus = $data->input('currentstatus');
            $objReport = new report();
            $data=array("status"=>$currentstatus);
            
            $result=$objReport->changeReportStatus($changereportid,$data);
            if($result){
               return redirect('/admin/listfilereport');  
            }
            else{
                return redirect('/admin/listfilereport')->withErrors([
                        'errMsg' => 'Error in Add Category.'
                    ]); 
            }
          }
        
    }
    
       public function deleteReport(Request $data) {

        if ($data->isMethod('post')) {
            $reportid = $data->input('deletereportid');
            $objReport = new report();
            $result = $objReport->deleteReport($reportid);
            if ($result)
                return redirect('/admin/listfilereport');
            else
                return redirect('/admin/listfilereport')->withErrors([
                            'errMsg' => 'Error in Delete'
                        ]);
        }
    }

    public function addReportUser($userid,Request $data) {
            Session::forget('report');
            Session::put('report.user_id', $userid);

            return redirect('/admin/filereport');

            
    }

     public function viewReport($reportid,Request $data) {
                    $objReport = new report();
                    $report = $objReport->getReportDetailsById($reportid);
                    $reportarray = (array) $report;
                    $file = $objReport->getReportFileDetailsById($reportid);
                    $filearray = (array) $file;
                    $reportarray['files'] = $filearray;
                    // echo "<pre>";print_r($reportarray);die;
                   return view('Admin/Views/report/viewreport', ['report_data' => $reportarray]);

            
    }
    

}
