<?php
namespace App\Http\Modules\Admin\Models;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Mockery\CountValidator\Exception;


class Usersmeta extends Model
{

    protected $table = 'user_meta';
    protected $fillable = ['user_id', 'addressline1', 'addressline2', 'city', 'state', 'country', 'zipcode', 'phone'];
    private static $_instance = null;

    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new Usersmeta();
        return self::$_instance;
    }


    public function InsertUserMetaData()
    {

        if (func_num_args() > 0) {
            $data = func_get_arg(0);
//           print_r($data);
//           die;
            try {
                $result = DB::table($this->table)->insert($data);
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }

    public function updateUserMetaData()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);

            $userid = func_get_arg(1);
            try {
                $updatedResult = DB::table($this->table)
                    ->where('user_id', $userid)
                    ->update($data);

                return $updatedResult;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }


    public function deleteUserMetaDetail()
    {

        if (func_num_args() > 0) {
            $userid = func_get_arg(0);
            try {
                $delete = DB::table($this->table)
                    ->where('user_id', $userid)
                    ->delete();
                return $delete;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }


    public function updateAdminMetaUserData()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $userid = func_get_arg(1);
            try {
                $updatedResult = DB::table($this->table)
                    ->where('user_id', $userid)
                    ->update($data);

                return $updatedResult;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

}