<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\Http\Requests;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class ProductController extends Controller
{
    public function index(){
        
        return view('admin.addproduct');
    }

    public function allproduct(){

        $allproductinfo= DB::table('product')
            ->join('category', 'product.category_id','=','category.category_id')
            ->join('manufactur', 'product.manufactur_id','=','manufactur.manufactur_id')
            // ->select('product.*','category.cateory_name','manufacture.manufacture_name')   
            ->get();

            $manageproduct= view('admin.all_product')
                             ->with('allproductinfo',$allproductinfo); 
            return view('admin_layout')
                            ->with('admin.all_product',$manageproduct);
      
    }


    public function saveaddproduct(Request $request)
    {
        $data=array();
        $data['product_name']=$request->product_name;
       $data['category_id']=$request->category_id;
       $data['manufactur_id']=$request->manufactur_id;
       
       $data['product_shord_discription']=$request->product_shord_discription;
       $data['product_long_discription']=$request->product_long_discription;
       $data['product_price']=$request->product_price;
       $data['product_size']=$request->product_size;
       $data['product_color']=$request->product_color;
       $data['product_publication_status']=$request->product_publication_status;
    
       $image=$request->file('product_image');
        if($image)
        {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['product_image']=$image_url;
                DB::table('product')->insert($data);
                Session::put('message','Product added succesfully.....!');
                return Redirect::to('/addproduct');
            }
        }
        $data['product_image']='';
        DB::table('product')->insert($data);
                Session::put('message','Product image added without succesfully.....!');
                return Redirect::to('/addproduct');

    }

    public function unactiveproduct($product_id)
    {
        DB::table('product')
            ->where('product_id',$product_id)
            ->update(['product_publication_status' => 0 ]);
            Session::put('message','Product Unactive succesfully.....!');
            return Redirect::to('allproduct');
    }

    public function activeproduct($product_id)
    {
        DB::table('product')
            ->where('product_id',$product_id)
            ->update(['product_publication_status' => 1 ]);
            Session::put('message','Product Unactive succesfully.....!');
            return Redirect::to('allproduct');
    }
    public function editproduct($product_id)
    {
        $product_info= DB::table('product')
                       ->where('product_id',$product_id)
                       ->first();

        $product_info= view('admin.edit_product')
                       ->with('product_info',$product_info);
        return view('admin_layout')
                       ->with('admin.edit_product',$product_info);

        //return view('admin.edit_catagory');
    }

    
    public function updateproduct(Request $request, $product_id)
    {
        
       $data=array();
      
       $data['product_name']=$request->product_name;
       $data['category_id']=$request->category_id;
       $data['manufactur_id']=$request->manufactur_id;
       $data['product_price']=$request->product_price;

       
       DB::table('product')->where('product_id',$product_id)
       ->update($data);

       Session::put('message','Product Update succesfully.....!');
       return Redirect::to('/allproduct');
        //return $category_id;
    }

    public function deleteproduct(Request $request, $product_id)
    {

        $category_info= DB::table('product')
                       ->where('product_id',$product_id)
                       ->delete();

                       Session::put('message','Product Delete succesfully.....!');
                       return Redirect::to('/allproduct');
    }
    
}
