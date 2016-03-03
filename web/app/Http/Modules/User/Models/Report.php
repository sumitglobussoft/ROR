<?php


namespace App\Http\Modules\User\Models;

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


    public function GetReportBysearch()
    {
        if (func_num_args() > 0) {
            $search = func_get_arg(0);
//            die($search);
            try {
                $result = DB::table($this->table)
                    ->where('company_or_individual_name', 'like', '%' . $search . '%')
                    ->orWhere('report_id', 'like', '%' . $search . '%')
                    ->orWhere('company_or_individual_aka', 'like', '%' . $search . '%')
                    ->paginate(4);

                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    public function GetReportDetails()
    {

        if (func_num_args() > 0) {
            $report_id = func_get_arg(0);
//            die($search);
            try {
                $result = DB::table($this->table)
                    ->where('report_id', 'like', '%' . $report_id . '%')
                    ->get();
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }


    }

    public function getAllLatestReports()
    {
        try {
            $result = DB::table("report")
                ->select()
                ->orderBy('report.created_at', 'desc')
                ->paginate(4);

        } catch (QueryException $e) {
            echo $e;
            return 0;
        }
        if ($result)
            return $result;
        else
            return 0;
    }

    public function getMediaFiles()
    {
        if (func_num_args() > 0) {
            $report_id = func_get_arg(0);
            $result = DB::table('report')
                ->join('report_file', 'report.report_id', '=', 'report_file.report_id')
                ->where('report.report_id', $report_id)
                ->get();

            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }
    }
}
