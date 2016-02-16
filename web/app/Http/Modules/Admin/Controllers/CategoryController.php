<?php

namespace App\Http\Modules\Admin\Controllers;


use Illuminate\Http\Request;

use App\Http\Modules\Admin\Models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

use App\Http\Modules\Admin\Models\User;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
//    public function __call(){
//
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        return view("Admin\admin")
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard(Request $data)
    {
//        echo "<pre>";
//        print_r(Session::all());
//        die;
//        $userModel = new User();
//        $users = User::all();
//        echo "<pre>";
//        foreach ($users as $user => $userval) {
//            echo $userval;
//        }
//        die;
//        echo "<pre>";
//        print_r($users);
//        die;
   if ($data->isMethod('post')) {
       
//       echo getcwd();die;
//            $email = $data->input('email');
//            $password = $data->input('password');  
            $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma","wmv");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
//print_r($_FILES['file']);die;
if ((($_FILES["file"]["type"] == "video/mp4") 
||  ($_FILES["file"]["type"] == "video/x-ms-wmv")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 36246026)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("uploads/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      getcwd()."/uploads/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";die;
  }
        }
        return view("Admin/Views/admin/dashboard");
        

    }

    public function category(Request $data)
    {
        $objCategory = new category();
        $result=$objCategory->getCategory();
//        echo "<pre>";print_r($result);die;
       
             if($result)
                 return view('Admin/Views/category/category',['category_data' => $result]);
             else
                 return view('Admin/Views/category/category')->withErrors([
                        'errMsg' => 'Error in Add Category.'
                    ]);

    }

 public function addCategory(Request $data)
    {
    
         $userid = Auth::user()->id; 

        if ($data->isMethod('post')) {
            
            $categoryname = $data->input('category');
            $categorystatus = $data->input('categorystatus');          
            $this->validate($data, [
                'category' => 'required'
               
            ], ['category.required' => 'Invalid Name']
            );
            $categoryData=array();
            $categoryData['category_name'] = $categoryname;
            $categoryData['status'] = $categorystatus;
            $categoryData['created_date'] = date('Y-m-d H:i:s');
            $categoryData['user_id']=$userid;
            
             $objCategory = new category();
             $result=$objCategory->createCategory($categoryData);
             if($result)
                 return redirect('/admin/category');
             else
                 return redirect('/admin/category')->withErrors([
                        'errMsg' => 'Error in Add Category.'
                    ]);
            
             
        }
    }
     public function updateCategory(Request $data)
    {
                $userid = Auth::user()->id; 

        if ($data->isMethod('post')) {
            $categoryid = $data->input('editcategoryid');
            $categoryname = $data->input('editcategoryname');
            $categorystatus = $data->input('editcategorystatus');
            $this->validate($data, [
                'editcategoryname' => 'required'               
            ], ['editcategoryname.required' => 'Invalid Name']
            );
            $categoryData=array();
            $categoryData['category_name'] = $categoryname;
            $categoryData['status'] = $categorystatus;
            $categoryData['user_id']=$userid;
            
             $objCategory = new category();
             $result=$objCategory->updateCategory($categoryid,$categoryData);
//             die($result);
             if($result)
                 return redirect('/admin/category');
             else
                 return redirect('/admin/category')->withErrors([
                        'errMsg' => 'Update Not Changed'
                    ]);
        }
    

    }
    
         public function deleteCategory(Request $data)
    {
    
         $userid = Auth::user()->id; 

        if ($data->isMethod('post')) {
            $categoryid = $data->input('deletecategoryid');
            
             $objCategory = new category();
             $result=$objCategory->deleteCategory($categoryid);
//             die($result);
             if($result)
                 return redirect('/admin/category');
             else
                 return redirect('/admin/category')->withErrors([
                        'errMsg' => 'Error in Delete'
                    ]);
        }
    }
           public function subcategory($categoryid,Request $data)
    {

         $userid = Auth::user()->id;
             $objCategory = new category();
             $result=$objCategory->getSubCategory($categoryid);
              if($result)
                 return view('Admin/Views/category/subcategory',['subcategory_data' => $result,'category_name'=>$result[0]->category_name,'category_id'=>$categoryid]);
             else{
                 $category=$objCategory->getCategoryById($categoryid);
                 $result=array();
                return view('Admin/Views/category/subcategory',['subcategory_data' => $result,'category_name'=>$category->category_name,'category_id'=>$categoryid]);
             }
       
    }
     public function addSubCategory(Request $data)
    {
    
         $userid = Auth::user()->id; 

        if ($data->isMethod('post')) {
            
            $addcategoryid = $data->input('addcategoryid');
            $subcategoryname = $data->input('subcategory');
            $subcategorystatus = $data->input('subcategorystatus');          
            $this->validate($data, [
                'subcategory' => 'required'
               
            ], ['subcategory.required' => 'Invalid Name']
            );
            $subcategoryData=array();
            $subcategoryData['category_id'] = $addcategoryid;
            $subcategoryData['subcategory_name'] = $subcategoryname;
            $subcategoryData['status'] = $subcategorystatus;
            $subcategoryData['created_date'] = date('Y-m-d H:i:s');
            $subcategoryData['user_id']=$userid;
            
             $objCategory = new category();
             $result=$objCategory->createSubCategory($subcategoryData);
             if($result)
                 return redirect('/admin/subcategory/'.$addcategoryid);
             else
                 return redirect('/admin/subcategory/'.$addcategoryid)->withErrors([
                        'errMsg' => 'Error in Add Sub Category.'
                    ]);
            
             
        }
    }
     public function updateSubCategory(Request $data)
    {
             $userid = Auth::user()->id; 

        if ($data->isMethod('post')) {
            
            $categoryid = $data->input('editcategoryid');

            $subcategoryid = $data->input('editsubcategoryid');
            $subcategoryname = $data->input('editsubcategoryname');
            $subcategorystatus = $data->input('editsubcategorystatus');
            $this->validate($data, [
                'editsubcategoryname' => 'required'               
            ], ['editsubcategoryname.required' => 'Invalid Name']
            );
            $categorySubData=array();
            $categorySubData['subcategory_name'] = $subcategoryname;
            $categorySubData['status'] = $subcategorystatus;
            $categorySubData['user_id']=$userid;
            
             $objCategory = new category();
             $result=$objCategory->updateSubCategory($subcategoryid,$categorySubData);
//             die($result);
             if($result)
                 return redirect('/admin/subcategory/'.$categoryid);
             else
                 return redirect('/admin/subcategory/'.$categoryid)->withErrors([
                        'errMsg' => 'Update Not Changed'
                    ]);
        }
  
    }
    
         public function deleteSubCategory(Request $data)
    {
    
         $userid = Auth::user()->id; 

        if ($data->isMethod('post')) {
            $subcategoryid = $data->input('deletesubcategoryid');
             $categoryid = $data->input('deletecategoryid');
             $objCategory = new category();
             $result=$objCategory->deleteSubCategory($subcategoryid);
//             die($result);
             if($result)
                 return redirect('/admin/subcategory/'.$categoryid);
             else
                 return redirect('/admin/subcategory/'.$categoryid)->withErrors([
                        'errMsg' => 'Error in Delete'
                    ]);
        }
    }
    


}
