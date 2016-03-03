<?php

namespace App\Http\Modules\Report\Models;

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


    /*
     * needed
     */

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

    /*
     * need
     */
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
