<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use app\Http\Requests;

use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class ManufacturController extends Controller
{
    public function index(){
        return view('admin.addmanufactur');
    }

    public function saveaddmanufactur(Request $request)
    {
        $data=array();
        $data['manufactur_id']=$request->manufactur_id;
        $data['manufactur_name']=$request->manufactur_name;
        $data['manufactur_discription']=$request->manufactur_discription;
        $data['publication_status']=$request->publication_status;
 
        DB::table('manufactur')->insert($data);
        Session::put('message','Manufactur added succesfully.....!');
        return Redirect::to('/addmanufactur');
    }


    public function allmanufactur()
    {
        $allmanufacturinfo= DB::table('manufactur')->get(); //acces the table and get all data
        $managemanufactur= view('admin.all_manufactur') // view the admin folder all_category pages
                         ->with('allmanufacturinfo',$allmanufacturinfo); // join when show use parameter first allcategoryinfo then $allcategoryinfo variable 
        return view('admin_layout')
                        ->with('admin.all_manufactur',$managemanufactur);
    }

    public function un($manufactur_id){
        DB::table('manufactur')
        ->where('manufactur_id',$manufactur_id)
        ->update(['publication_status'=>0]);
        Session::put('message','Manufactur Unactive successfully.......!');
        return Redirect::to('/allmanufactur');
    }
    public function ac($manufactur_id)
    {
        DB::table('manufactur')
            ->where('manufactur_id',$manufactur_id)
            ->update(['publication_status'=>1 ]);
            Session::put('message','Manufactur Active succesfully.....!');
            return Redirect::to('allmanufactur');
    }

    public function ed($manufactur_id)
    {
        $manufactur_info= DB::table('manufactur')
                       ->where('manufactur_id',$manufactur_id)
                       ->first();

        $manufactur_info= view('admin.edit_manufactur')
                       ->with('manufactur_info',$manufactur_info);
        return view('admin_layout')
                       ->with('admin.edit_manufactur',$manufactur_info);

        //return view('admin.edit_catagory');
    }

    public function up(Request $request, $manufactur_id)
    {
       $data=array();
       $data['manufactur_name']=$request->manufactur_name;
       $data['manufactur_discription']=$request->manufactur_discription;

       DB::table('manufactur')->where('manufactur_id',$manufactur_id)
       ->update($data);

       Session::put('message','Manufactur Update succesfully.....!');
       return Redirect::to('/allmanufactur');
        //return $category_id;
    }

    public function de(Request $request,$manufactur_id)
    {
        $manufactur_info= DB::table('manufactur')
                       ->where('manufactur_id',$manufactur_id)
                       ->delete();
                       Session::put('message','Manufactur Delete succesfully.....!');
                       return Redirect::to('/allmanufactur');
    }
}
