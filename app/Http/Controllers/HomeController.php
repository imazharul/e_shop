<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use app\Http\Requests;

use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class HomeController extends Controller
{
    public function index(){
        $allpublistproduct= DB::table('product')
            ->join('category', 'product.category_id','=','category.category_id')
            ->join('manufactur', 'product.manufactur_id','=','manufactur.manufactur_id')
            ->where('product_publication_status',1)
            ->limit(9)
            ->get();

            $managepublistproduct= view('pages.home_content')
                             ->with('allpublistproduct',$allpublistproduct); 
            return view('layout')
                            ->with('pages.home_content',$managepublistproduct);
        //return view('pages.home_content');
    }
//Caregory wase product show function here..............
    public function show_product_by_category($category_id)
    {
        $product_by_category= DB::table('product')
            ->join('category', 'product.category_id','=','category.category_id')
            ->select('product.*','category.category_name')
            ->where('category.category_id',$category_id)
            ->where('product.product_publication_status',1)
            ->limit(18)
            ->get();

            $manage_product_by_category= view('pages.show_product_by_category')
                             ->with('product_by_category',$product_by_category); 
            return view('layout')
                            ->with('pages.show_product_by_category',$manage_product_by_category);
        //return view('pages.show_product_by_category');
    }

    public function show_product_by_manufactur($manufactur_id)
    {
        $product_by_manufactur= DB::table('product')
            ->join('category', 'product.category_id','=','category.category_id')
            ->join('manufactur', 'product.manufactur_id','=','manufactur.manufactur_id')
            ->where('manufactur.manufactur_id',$manufactur_id)
            ->where('publication_status',1)
            ->limit(9)
            ->get();

            $managepublistproduct= view('pages.show_product_by_manufactur')
                             ->with('product_by_manufactur',$product_by_manufactur); 
            return view('layout')
                            ->with('pages.show_product_by_manufactur',$managepublistproduct);

    }
// Product show details function......................
    public function product_details_by_id($product_id)
    {
        $product_by_details= DB::table('product')
            ->join('category', 'product.category_id','=','category.category_id')
            ->join('manufactur', 'product.manufactur_id','=','manufactur.manufactur_id')
            ->where('product.product_id',$product_id)
            ->where('product_publication_status',1)
            ->first();

            $manage_product_by_details= view('pages.product_details')
                             ->with('product_by_details',$product_by_details); 
            return view('layout')
                            ->with('pages.product_details',$manage_product_by_details);
    }
}
