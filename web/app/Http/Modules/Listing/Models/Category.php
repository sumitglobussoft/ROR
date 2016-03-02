<?php


namespace App\Http\Modules\Listing\Models;

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

    public function getsubcategory()
    {
        if (func_num_args() > 0) {
            $category_id = func_get_arg(0);
            try {
                $result = DB::table("category")
                    ->leftjoin('subcategory', 'subcategory.category_id', '=', 'category.category_id')
                    ->where('subcategory.category_id', $category_id)
//                    ->where('status', 1)
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

    }

    public function getsubcategoryByname()
    {

        if (func_num_args() > 0) {
            $subcategory_id = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                    ->where('subcategory_id', $subcategory_id)
//                    ->where('status', 1)
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

    }

    public function getCategoryByname()
    {
        if (func_num_args() > 0) {
            $subcategory_name = func_get_arg(0);
            try {
                $result = DB::table("subcategory")
                    ->where('subcategory_name', $subcategory_name)
//                    ->where('status', 1)
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
  }
}
