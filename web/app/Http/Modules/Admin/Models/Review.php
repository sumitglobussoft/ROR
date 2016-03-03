<?php

namespace App\Http\Modules\Admin\Models;

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
            $data = func_get_arg(0);
            try {
                $result = DB::table("review")
                    ->insert($data);
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
            $reportid = func_get_arg(0);
            try {
                $result = DB::table("report")
                    ->leftjoin('user_meta', 'user_meta.user_id', '=', 'report.user_id')
                    ->leftjoin('review', 'review.report_id', '=', 'report.report_id')
                    ->select('user_meta.display_name', 'review.*', 'report.report_title', 'report.report_text', 'report.report_id')
                    ->where("report.report_id", $reportid)
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

    public function getPendingReviews()
    {

        try {
            $result = DB::table("review")
                ->leftjoin('user_meta', 'user_meta.user_id', '=', 'review.user_id')
                ->leftjoin('report', 'review.report_id', '=', 'report.report_id')
                ->select('user_meta.display_name', 'review.*', 'report.report_title')
                ->where("review.status", 0)
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

    public function getApprovedReviews()
    {

        try {
            $result = DB::table("review")
                ->leftjoin('user_meta', 'user_meta.user_id', '=', 'review.user_id')
                ->leftjoin('report', 'review.report_id', '=', 'report.report_id')
                ->select('user_meta.display_name', 'review.*', 'report.report_title')
                ->where("review.status", 1)
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

    public function getUnapprovedReviews()
    {

        try {
            $result = DB::table("review")
                ->leftjoin('user_meta', 'user_meta.user_id', '=', 'review.user_id')
                ->leftjoin('report', 'review.report_id', '=', 'report.report_id')
                ->select('user_meta.display_name', 'review.*', 'report.report_title')
                ->where("review.status", 2)
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

    public function getReviewDetailsById()
    {
        if (func_num_args() > 0) {
            $reviewid = func_get_arg(0);
            try {
                $result = DB::table("review")
                    ->leftjoin('report', 'review.report_id', '=', 'report.report_id')
                    ->where("review_id", $reviewid)
                    ->select('review.*', 'report.report_title', 'report.report_text')
                    ->first();
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


    public function updateReview()
    {
        if (func_num_args() > 0) {
            $reviewid = func_get_arg(0);
            $data = func_get_arg(1);
            try {
                $result = DB::table("review")
                    ->where('review_id', $reviewid)
                    ->update($data);
            } catch (QueryException $e) {
                echo $e;
            }
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
    }

    public function deleteReview()
    {
        if (func_num_args() > 0) {
            $reviewid = func_get_arg(0);
            try {
//               $result = DB::delete("DELETE a.*, b.* FROM category a LEFT JOIN subcategory b ON b.category_id = a.category_id WHERE a.category_id = ".$categoryid);
                $result = DB::table("review")
                    ->where('review_id', $reviewid)
                    ->delete();

            } catch (QueryException $e) {
                echo $e;
            }
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
    }

    public function createSubCategory()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                    ->insert($data);
            } catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }

    public function getSubCategory()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                    ->leftjoin('user_meta', 'user_meta.user_id', '=', 'subcategory.user_id')
                    ->leftjoin('category', 'category.category_id', '=', 'subcategory.category_id')
                    ->where('subcategory.category_id', $categoryid)
                    ->select('user_meta.display_name', 'category.category_name', 'subcategory.*')
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

    public function getCategoryById()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::table("category")
                    ->where('category.category_id', $categoryid)
                    ->select('category.category_name')
                    ->first();
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

    public function updateSubCategory()
    {
        if (func_num_args() > 0) {
            $subcategoryid = func_get_arg(0);
            $data = func_get_arg(1);
            try {
                $result = DB::table("subcategory")
                    ->where('subcategory_id', $subcategoryid)
                    ->update($data);
            } catch (QueryException $e) {
                echo $e;
            }
//            print_r($result);die;
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
    }

    public function deleteSubCategory()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                    ->where('subcategory_id', $categoryid)
                    ->delete();
            } catch (QueryException $e) {
                echo $e;
            }
//            print_r($result);die;
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
    }


}
