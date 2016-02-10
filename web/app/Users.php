<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
// use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
use \Exception;

class Users extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    private static $_instance = null;

    protected $table = 'users';

    protected $fillable = ['email', 'password', 'report_login_active', 'business_login_active', 'role'];
    protected $hidden = ['password', 'remember_token'];

    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new Users();
        return self::$_instance;
    }

//    public function getUserWhere($email, $password)
//    {
//        $result = User::where('email', $email)
//            ->where('password', bcrypt($password))
//            ->first();
////        $result = User::all();
//        return $result;
//    }
//
//
//    public function getUserByColumnConditionAndValue($columnName, $condition, $coulumnValue)
//    {
//        $result = Users::where($columnName, $condition, $coulumnValue)
//            ->first();
//        return $result;
//    }


    public function getUserById($userId)
    {

        $result = Users::whereId($userId)->first();
        return $result;
    }




}
