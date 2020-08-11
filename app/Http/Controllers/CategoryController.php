<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use app\Http\Requests;

use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class CategoryController extends Controller
{
    public function index()
    {
        return view("admin.add_category");
    }

    public function allcategory()
    {
        // page lode......
        $allcategoryinfo= DB::table('category')->get(); //acces the table and get all data
        $managecategory= view('admin.all_category') // view the admin folder all_category pages
                         ->with('allcategoryinfo',$allcategoryinfo); // join when show use parameter first allcategoryinfo then $allcategoryinfo variable 
        return view('admin_layout')
                        ->with('admin.all_category',$managecategory); 
        //return view('admin.all_category');
    }
    
    public function saveaddcategory(Request $request)
    {
       $data=array();
       $data['category_id']=$request->category_id;
       $data['category_name']=$request->category_name;
       $data['category_discription']=$request->category_discription;
       $data['publication_satus']=$request->publication_satus;

       DB::table('category')->insert($data);
       Session::put('message','Category added succesfully.....!');
       return Redirect::to('/addcategory');
    }
    
    public function unactive($category_id){
        DB::table('category')
            ->where('category_id',$category_id)
            ->update(['publication_satus' => 0 ]);
            Session::put('message','Category Unactive succesfully.....!');
            return Redirect::to('allcategory');
    }

    public function active($category_id)
    {
        DB::table('category')
            ->where('category_id',$category_id)
            ->update(['publication_satus' => 1 ]);
            Session::put('message','Category Active succesfully.....!');
            return Redirect::to('allcategory');
    }

    public function edit($category_id)
    {
        $category_info= DB::table('category')
                       ->where('category_id',$category_id)
                       ->first();

        $category_info= view('admin.edit_category')
                       ->with('category_info',$category_info);
        return view('admin_layout')
                       ->with('admin.edit_category',$category_info);

        //return view('admin.edit_catagory');
    }
    public function updatecategory(Request $request, $category_id)
    {
        
       $data=array();
      
       $data['category_name']=$request->category_name;
       $data['category_discription']=$request->category_discription;

       DB::table('category')->where('category_id',$category_id)
       ->update($data);

       Session::put('message','Category Update succesfully.....!');
       return Redirect::to('/allcategory');
        //return $category_id;
    }

    public function delete(Request $request, $category_id)
    {

        $category_info= DB::table('category')
                       ->where('category_id',$category_id)
                       ->delete();

                       Session::put('message','Category Delete succesfully.....!');
                       return Redirect::to('/allcategory');
    }

    // public function seacrh(Request $request)
    // {
    //     $seacrh =$request->get('seacrh');
    //     $posts =DB::table('category')->where('category_id','like','%'.$seacrh.'%');
    //     return Redirect::to('/allcategory', ['posts' ->$posts]);
    // }
}
