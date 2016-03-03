<?php


namespace App\Http\Modules\Listing\Models;

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


    public function InsertBusinessData()
    {

        if (func_num_args() > 0) {
            $businessData = func_get_arg(0);

            try {
                $result = DB::table($this->table)
                    ->insert($businessData);
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }

    public function GetBusinessBySubcategoryId()
    {
        if (func_num_args() > 0) {
            $subid = func_get_arg(0);

            try {
                $result = DB::table($this->table)
                    ->where('subcategory_id', $subid)
                    ->get();
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }

    public function searchBusinessBykeyboard()
    {
        if (func_num_args() > 0) {
            $keyword = func_get_arg(0);

            try {
                $result = DB::table($this->table)
                    ->where('business_name', 'like', '%' . $keyword . '%')
                    ->get();
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }

        } else {
            throw new Exception('Argument Not Passed');
        }

    }

    public function GetBusinessByAddres()
    {
        if (func_num_args() > 0) {
            $where = func_get_arg(0);

            try {
                $result = DB::table($this->table)
                    ->where('city', 'like', '%' . $where . '%')
                    ->orWhere('state', 'like', '%' . $where . '%')
                    ->orWhere('country', 'like', '%' . $where . '%')
                    ->get();
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }

    public function GetBusinessByName()
    {
        if (func_num_args() > 0) {
            $letter = func_get_arg(0);


            try {
                $result = DB::table($this->table)
                    ->where('business_name', 'like', $letter . '%')
                    ->get();

                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }


}

