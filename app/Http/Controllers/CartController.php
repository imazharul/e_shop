<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
   {
       
        $qty = $request->qty;
        $product_id = $request->product_id;
        $product_info = DB::table('product')
                        ->where('product_id',$product_id)
                        ->first();
        $data['quantity'] = $qty;
        $data['id']  = $product_info->product_id;
        $data['name']  = $product_info->product_name;
        $data['price']  = $product_info->product_price;
        $data['attributes']['image']  = $product_info->product_image;

        Cart::add($data);
        return Redirect::to('/show_cart');

    
    //test

       //return view('pages.add_to_card');
   }
   public function show_cart(){

        $all_publish_category=DB::table('category')
                            ->where('publication_satus',1)
                            ->get();

                
                $manage_publish_category= view('pages.add_to_cart') 
                    ->with('all_publish_category',$all_publish_category);
                return view('layout')
                    ->with('pages.add_to_cart',$manage_publish_category);
   }
   public function delete_to_cart($id)
   {
        Cart::remove($id,0);
        return Redirect::to('/show_cart');
   }
   public function update_cart(Request $request)
   {
       $qty= $request->qty;
       $id= $request->id;

       //Cart::update($id,$qty); // this update function are ont working some error
                                // Need next time work Cart::update function 
       return Redirect::to('/show_cart');
      

   }
}
