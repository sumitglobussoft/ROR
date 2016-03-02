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

class Location extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    private static $_instance = null;

    protected $table = 'location';

    protected $fillable = ['name', 'email', 'password', 'username', 'last_name', 'role', 'status'];
    protected $hidden = ['password', 'remember_token'];

    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new Location();
        return self::$_instance;
    }

    public function getCountry()
    {
        try {
            $result = DB::table("location")
                ->where('location_type', 0)
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

    public function getStateById(){

        if(func_num_args()>0){
            $CountryId = func_get_arg(0);
            try{
                $result = DB::table("location")
                    ->where('parent_id',$CountryId)
                    ->where('location_type',1)
                    ->select()
                    ->get();

            }
            catch(QueryException $e){
                echo $e;
                return 0;
            }
            if($result)
                return $result;
            else
                return 0;
  }

     }



}
