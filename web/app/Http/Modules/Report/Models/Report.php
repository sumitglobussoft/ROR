<?php

namespace App\Http\Modules\Report\Models;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Mockery\CountValidator\Exception;

class Report extends Model
{

    private static $_instance = null;
    protected $table = 'report';
    protected $fillable = ['company_or_individual_name', 'company_or_individual_aka', 'created_date'];

//    protected $hidden = ['password', 'remember_token'];

    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new Report();
        return self::$_instance;
    }

    /*
     * needed
     *
     */

    public function createReport()
    {
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

    /*
     * needed
     *
     */
    public function updateReportStepTwo()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $reportid = func_get_arg(1);
            try {
                $result = DB::table("report")
                    ->where('report_id', $reportid)
                    ->update($data);
            } catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }

    /*
     * Needed
     *
     */
    public function insertReportStepThree()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $reportid = func_get_arg(1);
            $userid = func_get_arg(2);

            try {
                $result = DB::table("report")
                    ->where('report_id', $reportid)
                    ->where('user_id', $userid)
                    ->update($data);

            } catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }

    /*
     * needed
     *
     */

    public function updateReportStepFive()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $reportid = func_get_arg(1);
            $userid = func_get_arg(2);

            try {
                $result = DB::table("report")
                    ->where('report_id', $reportid)
                    ->where('user_id', $userid)
                    ->update($data);

            } catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }

    /*
     * needed
     *
     */
    public function insertReportFile()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);

            try {
                $result = DB::table("report_file")
                    ->insertGetId($data);

            } catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }

    /*
     *
     * needed
     */

    public function getReportFilesById()
    {
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
        } else
            return 0;
    }


}
