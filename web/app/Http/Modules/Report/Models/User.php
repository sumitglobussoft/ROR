<?php

namespace App\Http\Modules\Report\Models;

use App\Users;
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

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    private static $_instance = null;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'username', 'last_name', 'role', 'status'];
    protected $hidden = ['password', 'remember_token'];

    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new User();
        return self::$_instance;
    }

    public function getUserWhere($email, $password)
    {
        $result = Users::where('email', $email)
            ->where('password', bcrypt($password))
            ->first();
//        $result = User::all();
        return $result;
    }

    /**
     * @param $columnName
     * @param $condition
     * @param $coulumnValue
     * @return mixed
     */
    /*
     * TEST FUNCTION
     */
    public function getUserByColumnConditionAndValue($columnName, $condition, $coulumnValue)
    {
        $result = Users::where($columnName, $condition, $coulumnValue)
            ->first();
        return $result;
    }


    /**
     * needed
     *
     */

    public function getReportUserInfo()
    {
        if (func_num_args() > 0) {
            $userid = func_get_arg(0);
            try {
                $result = DB::table("user_meta")
                    ->select('display_name', 'state', 'city', 'address', 'country', 'zipcode')
                    ->where('user_id', $userid)
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


}
