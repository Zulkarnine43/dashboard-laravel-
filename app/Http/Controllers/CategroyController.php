<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class CategroyController extends Controller
{
    //
    function index()
    {
        return view("admin.category");
    }
  

    function categoryForm()
    {
        $sql="SELECT * FROM `categories` order by id desc";
        
       
        $data=DB::select($sql);
        // foreach($data as $val)
        // {
        //     echo $val->xdesc;
            
        // }
        return view('admin.categoryForm',['data'=>$data]);
    }

    function createCategory(Request $req)
    {
        $req->validate([
            
            'slug' => 'required',
            'xname'=> 'required',
            'xdesc' => 'required'
        ]);
        $cat= new Category();
        $cat->xname=$req->input("xname");
        $cat->slug=$req->input("slug");
        $cat->xdesc=$req->input("xdesc");
        $cat->userid=session('id');
        $cat->xdate=date('Y-m-d');
        $cat->save();

        return redirect('/category-form')->with('success',"Category Create Successfully");

    }
    function updateForm($id)
    {
        $sql="select * from categories where id=".$id;
        $data=DB::select($sql);
        // return $data;
        return view('admin.categoryUpdateForm',['data'=>$data]);
    }
    function updateCategory(Request $req)
    {
        $req->validate([
            
            'slug' => 'required',
            'xname'=> 'required',
            'xdesc' => 'required'
        ]);
        $sql="UPDATE `categories` SET xname='".$req->xname."', slug='".$req->slug."', xdesc='".$req->xdesc."' where id=".$req->id;
        if(DB::update($sql))
            return  redirect('/category-form')->with('success',"Category Update Successfully");
        else
            return "Something Wrong!";
    }
}
