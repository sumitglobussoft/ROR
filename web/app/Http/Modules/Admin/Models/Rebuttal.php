<?php

namespace App\Http\Modules\Admin\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
use \Exception;

class Rebuttal extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    private static $_instance = null;

    protected $table = 'rebuttal';

    protected $fillable = ['name', 'email', 'password', 'username', 'last_name', 'role', 'status'];
    protected $hidden = ['password', 'remember_token'];

    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new Rebuttal();
        return self::$_instance;
    }


    public function insertcategorydata()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $userid = func_get_arg(1);
//            print_r($data);
            try {
                $updatedResult = DB::table($this->table)
                    ->where('user_id', $userid)
//                    ->insert($data)
                   ->insertGetId($data);

                return $updatedResult;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }


    }

    public function getReviewId($where, $selectedColumns = ['*']){
        $result = DB::table($this->table)
            ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
            ->select($selectedColumns)
            ->get();
        return $result;
    }


    public function UpdateWriteYourReportData()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
//            print_r($data);
//            die;
            $reviews_id = func_get_arg(1);

            try {
                $updatedResult = DB::table($this->table)
                    ->where('reviews_id' ,$reviews_id)
                    ->update($data);
                // ->insertGetId($data);
                print_r($updatedResult);

                return $updatedResult;


            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }




}
