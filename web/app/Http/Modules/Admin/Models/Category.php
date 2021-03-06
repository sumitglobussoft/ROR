<?php

namespace App\Http\Modules\Admin\Models;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Mockery\CountValidator\Exception;

class Category extends Model
{

    private static $_instance = null;
    protected $table = 'category';
    protected $fillable = ['category_name', 'status', 'created_date'];

//    protected $hidden = ['password', 'remember_token'];

    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new Category();
        return self::$_instance;
    }

    public function createCategory()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            try {
                $result = DB::table("category")
                    ->insert($data);
            } catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }

    public function getCategory()
    {
        try {
            $result = DB::table("category")
                ->leftjoin('user_meta', 'user_meta.user_id', '=', 'category.user_id')
                ->select('user_meta.display_name', 'category.*')
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

    public function getActiveCategory()
    {
        try {
            $result = DB::table("category")
                ->where('status', 1)
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

    public function getActiveSubCategory()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                    ->where('status', 1)
                    ->where('category_id', $categoryid)
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
        } else {
            return 0;
        }
    }

    public function updateCategory()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            $data = func_get_arg(1);
            try {
                $result = DB::table("category")
                    ->where('category_id', $categoryid)
                    ->update($data);
            } catch (QueryException $e) {
                echo $e;
            }
//            print_r($result);die;
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
    }

    public function deleteCategory()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::delete("DELETE a.*, b.* FROM category a LEFT JOIN subcategory b ON b.category_id = a.category_id WHERE a.category_id = " . $categoryid);
//                $result = DB::table("category")
//                          ->leftjoin('subcategory', 'category.category_id', '=', 'subcategory.category_id')
//                         ->where('category.category_id', $categoryid)
//                          ->delete();

            } catch (QueryException $e) {
                echo $e;
            }
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
    }

    public function createSubCategory()
    {
        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                    ->insert($data);
            } catch (QueryException $e) {
                echo $e;
            }
            return $result;
        } else {
            return 0;
        }
    }

    public function getSubCategory()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                    ->leftjoin('user_meta', 'user_meta.user_id', '=', 'subcategory.user_id')
                    ->leftjoin('category', 'category.category_id', '=', 'subcategory.category_id')
                    ->where('subcategory.category_id', $categoryid)
                    ->select('user_meta.display_name', 'category.category_name', 'subcategory.*')
                    ->get();
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

    public function getCategoryById()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::table("category")
                    ->where('category.category_id', $categoryid)
                    ->select('category.category_name')
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

    public function updateSubCategory()
    {
        if (func_num_args() > 0) {
            $subcategoryid = func_get_arg(0);
            $data = func_get_arg(1);
            try {
                $result = DB::table("subcategory")
                    ->where('subcategory_id', $subcategoryid)
                    ->update($data);
            } catch (QueryException $e) {
                echo $e;
            }
//            print_r($result);die;
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
    }

    public function deleteSubCategory()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                    ->where('subcategory_id', $categoryid)
                    ->delete();
            } catch (QueryException $e) {
                echo $e;
            }
//            print_r($result);die;
            if ($result)
                return $result;
            else
                return 0;
        } else {
            return 0;
        }
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
     * @param $userId
     * @return mixed
     * @author Akash M. Pai <akashpai@globussoft.com>
     */
    public function getUserById($userId)
    {
        $result = Users::whereId($userId)->first();
        return $result;
    }

    public function temp()
    {

    }

    public function getAvailableUserDetails()
    {

        try {
            $result = Users::where('role', 1)
                ->select(['id', 'username', 'email', 'created_at', 'updated_at', 'status'])
                ->get();

            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAvailableSupplierDetails($where, $selectedColumns = ['*'])
    {
        try {
            $result = Users::whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
//                ->join('location','location.location_type', '=', 'usersmeta.state')
//                ->join('usersmeta', function ($join) {
//                    $join->on('usersmeta.user_id', '=', 'users.id');
//                })
//                ->join('location', function ($join) {
//                    $join->on('location.location_id', '=', 'usersmeta.country');
//                })
//                ->whereRaw($status['rawQuery'], isset($status['bindParams']) ? $status['bindParams'] : array())
                ->select(['users.id', 'users.username', 'users.email', 'users.created_at', 'users.updated_at', 'users.status'])
//                ->select(['usersmeta.*','location.*'])
                ->get();

            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array : $where
     * @return int
     * @throws "Argument Not Passed"
     * @throws
     * @author Vini
     * @uses Authentication
     */
    public function updateUserWhere()
    {

        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $where = func_get_arg(1);
            try {
                $result = Users::whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                    ->update($data);
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            if ($result) {
                return $result;
            } else {
                return 0;
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    /**
     * @param array : $where
     * @return int
     * @throws "Argument Not Passed"
     * @throws
     * @author Vini
     * @uses Delete User
     */
    public function deleteUserDetails($where)
    {
        $sql = Users::whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
            ->delete();
        if ($sql) {
            return $sql;
        } else {
            return 0;
        }
    }

    public function updateUserInfo()
    {

        if (func_num_args() > 0) {
            $data = func_get_arg(0);
            $where = func_get_arg(1);
            try {

                $result = Users::where('id', $where)
                    ->update($data);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            if ($result) {
                return $result;
            } else {
                return 0;
            }
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

    public function getPendingUserDetails($where)
    {//, $status)
        try {
            $result = Users::whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
//                ->whereRaw($status['rawQuery'], isset($status['bindParams']) ? $status['bindParams'] : array())
                ->select(['id', 'username', 'email', 'created_at', 'updated_at', 'status'])
                ->get();

            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getDeletedUserDetails($where, $status)
    {

        try {
            $result = Users::whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                ->whereRaw($status['rawQuery'], isset($status['bindParams']) ? $status['bindParams'] : array())
                ->select(['id', 'username', 'email', 'created_at', 'updated_at', 'status'])
                ->get();

            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getUserInfo($where)
    {

        try {
            $result = Users::whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                ->select()
                ->get();
            return $result;
        } catch (QueryException $e) {
            echo $e;
        }
    }

    public function getAvailableManagerDetails($where)
    {

        try {
            $result = Users::whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                ->join('permission_user_relation', 'users.id', '=', 'permission_user_relation.user_id')
                //   ->join('permissions', 'permission_user_relation.permission_ids','=','permissions.permission_id')
                ->select(['id', 'username', 'email', 'created_at', 'updated_at', 'status'])
                ->get();

            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getUserInfoById($where, $selectedColumns = ['*'])
    {

        try {
            $result = DB::table($this->table)
                ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
                ->join('permission_user_relation', 'permission_user_relation.user_id', '=', 'users.id')
                ->select($selectedColumns)
                ->first();
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function getActiveSubCategoryById()
    {
        if (func_num_args() > 0) {
            $categoryid = func_get_arg(0);
            try {
                $result = DB::table("category")
                    ->join('subcategory', 'subcategory.category_id', '=', 'category.category_id')
                    ->where('subcategory.category_id', $categoryid)
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
        } else {
            return 0;
        }


    }


}
