<?php

namespace App\Http\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Modules\Admin\Models\Category;
use App\Http\Modules\Admin\Models\Review;
use App\Http\Modules\Admin\Models\Report;
use App\Http\Modules\Admin\Models\Users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Modules\Admin\Models\User;
use Illuminate\Support\Facades\Session;
use Config;
use Redirect;

class ReviewController extends Controller {

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

    public function review($reportid, Request $data) {

        $objReview = new review();
        $result = $objReview->getReviewById($reportid);
        return view('Admin/Views/review/review', ['reviewdata' => $result, 'reporttitle' => $result[0]->report_title,'reporttext' => $result[0]->report_text]);
    }

    public function listReview(Request $data) {

        $objReview = new review();
        $result = $objReview->getReviews();
        if (!$result) {
            $result = array();
        }
        return view('Admin/Views/review/list-review', ['reviewdata' => $result]);
    }

    public function pendingReview(Request $data) {

        $objReview = new review();
        $result = $objReview->getPendingReviews();
        if (!$result) {
            $result = array();
        }
        return view('Admin/Views/review/pending-review', ['reviewdata' => $result]);
    }

    public function approvedReview(Request $data) {

        $objReview = new review();
        $result = $objReview->getApprovedReviews();
        if (!$result) {
            $result = array();
        }
        return view('Admin/Views/review/approved-review', ['reviewdata' => $result]);
    }

    public function unapprovedReview(Request $data) {

        $objReview = new review();
        $result = $objReview->getUnapprovedReviews();
        if (!$result) {
            $result = array();
        }
        return view('Admin/Views/review/unapproved-review', ['reviewdata' => $result]);
    }

    public function addReview(Request $data) {

        $userid = Auth::user()->id;
        if ($data->isMethod('post')) {

            $reportid = $data->input('addreportid');
            $reviewtitle = $data->input('reviewtitle');
            $reviewtext = $data->input('reviewtext');
            $reviewstatus = $data->input('reviewstatus');
            $this->validate($data, [
                'reviewtitle' => 'required',
                'reviewtext' => 'required',
                    ], ['reviewtitle.required' => 'Invalid Title',
                'reviewtext.required' => 'Invalid Body'
                    ]
            );
            $reviewData = array();
            $reviewData['report_id'] = $reportid;
            $reviewData['status'] = $reviewstatus;
            $reviewData['review_title'] = $reviewtitle;
            $reviewData['review_text'] = $reviewtext;
            $reviewData['created_date'] = date('Y-m-d H:i:s');
            $reviewData['user_id'] = $userid;

            $objReview = new review();
            $result = $objReview->createReview($reviewData);
            if ($result)
                return Redirect::back();
            else
                return Redirect::back()->withErrors([
                            'errMsg' => 'Update Not Changed'
                        ]);
        }
    }

    public function updateReview(Request $data) {
        $userid = Auth::user()->id;
        if ($data->isMethod('post')) {
            $reviewid = $data->input('editreviewid');
            $reportid = $data->input('editreportid');
            $editreviewtitle = $data->input('editreviewtitle');
            $editreviewtext = $data->input('editreviewtext');
            $editreviewstatus = $data->input('editreviewstatus');
            $this->validate($data, [
                'editreviewtitle' => 'required',
                'editreviewtext' => 'required',
                    ], ['editreviewtitle.required' => 'Invalid Title',
                'editreviewtext.required' => 'Invalid Text']
            );
            $reviewData = array();
            $reviewData['review_title'] = $editreviewtitle;
            $reviewData['status'] = $editreviewstatus;
            $reviewData['review_text'] = $editreviewtext;
            $objReview = new review();
            $result = $objReview->updateReview($reviewid, $reviewData);
            if ($result)
                return Redirect::back();
            else
                return Redirect::back()->withErrors([
                            'errMsg' => 'Update Not Changed'
                        ]);
        }
    }

    public function deleteReview(Request $data) {
        $userid = Auth::user()->id;

        if ($data->isMethod('post')) {
            $reviewid = $data->input('deletereviewid');
            $reportid = $data->input('deletereportid');

            $objReview = new review();
            $result = $objReview->deleteReview($reviewid);
            if ($result)
                return Redirect::back();
            else
                return Redirect::back()->withErrors([
                            'errMsg' => 'Not Deleted'
                        ]);
        }
    }

}
