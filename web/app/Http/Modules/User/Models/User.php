<?php

namespace App\Http\Modules\User\Models;


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


    /**
     * @param $userId
     * @return mixed
     * @author siresh ranajn <siteshranjan@globussoft.com>
     */
    public function getUserById($userId)
    {
        $result = User::whereId($userId)->first();
        return $result;
    }


    public function getUserDetailsById()
    {
        if (func_num_args() > 0) {
            $user_id = func_get_arg(0);

            $result = DB::table('users')
                ->join('user_meta', 'user_meta.user_id', '=', 'users.id')
                ->where('users.id', $user_id)
                ->first();

            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    public function updateUserProfileData()
    {
        if (func_num_args() > 0) {
            $userdata = func_get_arg(0);

            $user_id = func_get_arg(1);


            try {
                $updatedResult = DB::table($this->table)
                    ->where('id', $user_id)
                    ->update($userdata);
                // ->insertGetId($data);
                return $updatedResult;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }


    public function getUserDetails()
    {
        if (func_num_args() > 0) {
            $userId = func_get_arg(0);

            $result = DB::table('users')
                ->where('users.id', $userId)
                ->first();

            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    public function UpdateUserPassword()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $userId = func_get_arg(1);
            try {
                $updatedResult = DB::table($this->table)
                    ->where('id', $userId)
                    ->update($data);
                // ->insertGetId($data);
                return $updatedResult;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    public function checkMail()
    {
        if (func_num_args() > 0) {
            $email = func_get_arg(0);

            $result = DB::table("users")
                ->select()
                ->where('email', $email)
                ->first();
            return $result;
        } else {
            throw new Exception('Argument not passed');
        }
    }

    public function forgotPassword()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $userId = func_get_arg(1);

            try {
                $updatedResult = DB::table($this->table)
                    ->where('id', $userId)
                    ->update($data);
                // ->insertGetId($data);

                return $updatedResult;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    public function addNewUser()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
//            print_r($data);
//            die;

            try {
                $result = DB::table($this->table)
                    ->insertGetId($data);
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }


}
