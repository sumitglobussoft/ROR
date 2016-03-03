<?php


namespace App\Http\Modules\User\Models;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Mockery\CountValidator\Exception;

class Review extends Model
{

    private static $_instance = null;
    protected $table = 'review';
    protected $fillable = ['review_title', 'status', 'created_date'];

//    protected $hidden = ['password', 'remember_token'];

    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new Category();
        return self::$_instance;
    }

    public function createReview()
    {
        if (func_num_args() > 0) {
            $reviewData = func_get_arg(0);

            try {
                $result = DB::table("review")
                    ->orderBy('desc')
                    ->insert($reviewData);

            } catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }


    public function getReviewById()
    {
        if (func_num_args() > 0) {
            $report_id = func_get_arg(0);
            try {
                $result = DB::table("report")
                    ->leftjoin('user_meta', 'user_meta.user_id', '=', 'report.user_id')
                    ->leftjoin('review', 'review.report_id', '=', 'report.report_id')
                    ->select('user_meta.full_name', 'review.*', 'report.report_title', 'report.report_text', 'report.report_id')
                    ->where("report.report_id", $report_id)
                    ->orderBy('review.created_date', 'desc')
                    ->take(5)
                    ->get();
            } catch (QueryException $e) {
                echo $e;
                return 0;
            }
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
    }



    public function getReviews()
    {

        try {
            $result = DB::table("review")
                ->leftjoin('user_meta', 'user_meta.user_id', '=', 'review.user_id')
                ->leftjoin('report', 'review.report_id', '=', 'report.report_id')
                ->select('user_meta.display_name', 'review.*', 'report.report_title')
                ->get();
        } catch (QueryException $e) {
            echo $e;
            return 0;
        }
        if ($result)
            return $result;
        else
            return 0;

    }

    public function getfivenextreview()
    {

        if (func_num_args() > 0) {

            $report_id = func_get_arg(0);
            $limit = func_get_arg(1);
            $offset = func_get_arg(2);

            try {
                $result = DB::table("report")
                    ->leftjoin('user_meta', 'user_meta.user_id', '=', 'report.user_id')
                    ->leftjoin('review', 'review.report_id', '=', 'report.report_id')
                    ->select('user_meta.full_name', 'review.*', 'report.report_title', 'report.report_text', 'report.report_id')
                    ->where("report.report_id", $report_id)
                    ->orderBy('review.created_date', 'desc')
                    ->take($limit)
                    ->skip($offset)
                    ->get();
            } catch (QueryException $e) {
                echo $e;
                return 0;
            }
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
    }


    public function getReviewCount()
    {
        if (func_num_args() > 0) {
            $report_id = func_get_arg(0);
            $result = DB::table('review')
//                ->join('report', 'report.report_id', '=', 'review.review_id')
                ->where('review.report_id', $report_id)
                ->get();

            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }
    }
}
