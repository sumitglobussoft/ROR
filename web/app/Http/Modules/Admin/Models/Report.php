<?php

namespace App\Http\Modules\Admin\Models;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Mockery\CountValidator\Exception;

class Report extends Model {

    private static $_instance = null;
    protected $table = 'report';
    protected $fillable = ['company_or_individual_name', 'company_or_individual_aka', 'created_date'];

//    protected $hidden = ['password', 'remember_token'];

    public static function getInstance() {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new Report();
        return self::$_instance;
    }

    public function createReport() {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            try {
                $result = DB::table("report")
                        ->insertGetId($data);
            } catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }
 public function updateReportStepTwo() {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $reportid = func_get_arg(1);
            try {
                $result = DB::table("report")
                        ->where('report_id', $reportid)
                        ->update($data);                        
            }catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }
    public function insertReportStepThree() {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $reportid = func_get_arg(1);
            $userid = func_get_arg(2);
            
            try {
                $result = DB::table("report")
                        ->where('report_id', $reportid)
                        ->where('user_id', $userid)
                        ->update($data);
                        
            }catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }

    public function updateReportStepFive() {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $reportid = func_get_arg(1);
            $userid = func_get_arg(2);
            
            try {
                $result = DB::table("report")
                        ->where('report_id', $reportid)
                        ->where('user_id', $userid)
                        ->update($data);
                        
            }catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }
    
     public function insertReportFile() {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);

            try {
                $result = DB::table("report_file")
                        ->insertGetId($data);
                        
            }catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }
    
     public function getReportFilesById() {
          if (func_num_args() > 0) {
            $reportid = func_get_arg(0);
        try {
            $result = DB::table("report_file")
                    ->where('report_id',$reportid)
                    ->select()
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
          else
              return 0;
    }

     public function getAllReports() {
        try {
            $result = DB::table("report")
                     ->leftjoin('user_meta', 'user_meta.user_id', '=', 'report.user_id')
                    ->leftjoin('category', 'category.category_id', '=', 'report.category_id')
                    ->leftjoin('subcategory', 'subcategory.subcategory_id', '=', 'report.subcategory_id')
                    ->select('user_meta.display_name','category.category_name','subcategory.subcategory_name', 'report.*')
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
       public function getPendingReports() {
        try {
            $result = DB::table("report")
                     ->leftjoin('user_meta', 'user_meta.user_id', '=', 'report.user_id')
                    ->leftjoin('category', 'category.category_id', '=', 'report.category_id')
                    ->leftjoin('subcategory', 'subcategory.subcategory_id', '=', 'report.subcategory_id')
                    ->select('user_meta.display_name','category.category_name','subcategory.subcategory_name', 'report.*')
                    ->where("report.status",0)
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
    public function getApprovedReports() {
        try {
            $result = DB::table("report")
                     ->leftjoin('user_meta', 'user_meta.user_id', '=', 'report.user_id')
                    ->leftjoin('category', 'category.category_id', '=', 'report.category_id')
                    ->leftjoin('subcategory', 'subcategory.subcategory_id', '=', 'report.subcategory_id')
                    ->select('user_meta.display_name','category.category_name','subcategory.subcategory_name', 'report.*')
                     ->where("report.status",1)
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
    public function getUnapprovedReports() {
        try {
            $result = DB::table("report")
                     ->leftjoin('user_meta', 'user_meta.user_id', '=', 'report.user_id')
                    ->leftjoin('category', 'category.category_id', '=', 'report.category_id')
                    ->leftjoin('subcategory', 'subcategory.subcategory_id', '=', 'report.subcategory_id')
                    ->select('user_meta.display_name','category.category_name','subcategory.subcategory_name', 'report.*')
                     ->where("report.status",2)
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
     public function getReportById() {
           if (func_num_args() > 0) {
            $reportid = func_get_arg(0);
        try {
           
        $result = DB::table("report")
                ->where('report_id', $reportid)
                    ->select()
                    ->first();
        } catch (QueryException $e) {
            echo $e;
            return 0;
        }
        if ($result)
            return $result;
        else
            return 0;
           }
            else
            return 0;
           
    }
    public function getCategory() {
        try {
            $result = DB::table("category")
                    ->leftjoin('user_meta', 'user_meta.user_id', '=', 'category.user_id')
                    ->select('user_meta.display_name', 'category.*')
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

    public function getActiveCategory() {
        try {
            $result = DB::table("category")
                    ->where('status', 1)
                    ->select()
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

    public function getActiveSubCategory() {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                        ->where('status', 1)
                        ->where('category_id', $categoryid)
                        ->select()
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
        else {
            return 0;
        }
    }
  public function deleteReport() {
        if (func_num_args() > 0) {
            $reportid = func_get_arg(0);
            try {
                $result = DB::delete("DELETE a.*, b.* FROM report a LEFT JOIN report_file b ON b.report_id = a.report_id WHERE a.report_id = " . $reportid);
//                $result = DB::table("category")
//                          ->leftjoin('subcategory', 'category.category_id', '=', 'subcategory.category_id')
//                         ->where('category.category_id', $categoryid)
//                          ->delete();
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
    public function updateCategory() {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            $data = func_get_arg(1);
            try {
                $result = DB::table("category")
                        ->where('category_id', $categoryid)
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

    public function deleteCategory() {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::delete("DELETE a.*, b.* FROM category a LEFT JOIN subcategory b ON b.category_id = a.category_id WHERE a.category_id = " . $categoryid);
//                $result = DB::table("category")
//                          ->leftjoin('subcategory', 'category.category_id', '=', 'subcategory.category_id')
//                         ->where('category.category_id', $categoryid)
//                          ->delete();
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

    public function createSubCategory() {
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

    public function getSubCategory() {
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
        }
        else {
            return 0;
        }
    }

    public function getCategoryById() {
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
        }
        else {
            return 0;
        }
    }

    public function changeReportStatus() {
        if (func_num_args() > 0) {
            $reportid = func_get_arg(0);
            $data = func_get_arg(1);
            try {
                $result = DB::table("report")
                        ->where('report_id', $reportid)
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
   public function getReportDetailsById() {
           if (func_num_args() > 0) {
            $reportid = func_get_arg(0);
        try {
           
        $result = DB::table("report")
                ->leftjoin('subcategory', 'subcategory.subcategory_id', '=', 'report.subcategory_id')
                ->leftjoin('category', 'category.category_id', '=', 'report.category_id')
                ->where('report_id', $reportid)
                ->select('subcategory.subcategory_name','category.category_name','report.*')
                ->first();
        } catch (QueryException $e) {
            echo $e;
            return 0;
        }
        if ($result)
            return $result;
        else
            return 0;
           }
            else
            return 0;
           
    }
     public function getReportFileDetailsById() {
           if (func_num_args() > 0) {
            $reportid = func_get_arg(0);
        try {
           
        $result = DB::table("report_file")
                ->where('report_id', $reportid)
                ->select()
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
            else
            return 0;
           
    }




}
