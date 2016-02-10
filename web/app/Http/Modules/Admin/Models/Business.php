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

class Business extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    private static $_instance = null;

    protected $table = 'business';

    protected $fillable = ['name', 'email', 'password', 'username', 'last_name', 'role', 'status'];
    protected $hidden = ['password', 'remember_token'];

    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new Business();
        return self::$_instance;
    }


    public function getAllBusiness()
    {

        if (func_num_args() > 0) {
            $where = func_get_arg(0);
            $result = DB::table($this->table)
                ->get();

            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }

    }


    public function InsertBusinessData()
    {

        if (func_num_args() > 0) {
            $data = func_get_arg(0);

            try {
                $result = DB::table($this->table)
                    ->insert($data);

                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }

    public function GetBusinessDataById()
    {
        if (func_num_args() > 0) {

            $Business_id = func_get_arg(0);

            $result = DB::table($this->table)
                ->where('business_id', $Business_id)
                ->get();
            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }

    }

    public function UpdateBusinessdata()
    {
        if (func_num_args() > 0) {
            $updateBusinessData = func_get_arg(0);
            $Business_id = func_get_arg(1);

            try {
                $updatedResult = DB::table($this->table)
                    ->where('business_id', $Business_id)
                    ->join('category', $this->table . '.category_id', '=', 'category.category_id')
                    ->join('subcategory', $this->table . '.category_id', '=', 'subcategory.category_id')
                    ->update($updateBusinessData);
                // ->insertGetId($data);
//                print_r($updatedResult);
//                die;
                return $updatedResult;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }


    public function DeleteBusinessInfo()
    {
        if (func_num_args() > 0) {
            $BusinessId = func_get_arg(0);
            try {
                $delete = DB::table($this->table)
                    ->where('business_id', $BusinessId)
                    ->delete();
                return $delete;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }

    public function getAllDetails($where,$selectedColumns=['*'])
    {

        if (func_num_args() > 0) {
            $where = func_get_arg(0);
            $result = DB::table($this->table)
                ->join('category', $this->table . '.category_id', '=', 'category.category_id')
                ->join('subcategory', $this->table . '.category_id', '=', 'subcategory.category_id')
//                    ->where('subcategory.category_id', $categoryid)
                ->select($selectedColumns)
                ->get();

            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }

    }


}
