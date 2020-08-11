<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use app\Http\Requests;

use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class SliderController extends Controller
{
    public function index()
    {
        return view('/admin.addslider');
    }
    
    public function saveaddslider(Request $request)
    {
        $data=array();
      
       $data['slider_publication_status']=$request->slider_publication_status;
    
       $image=$request->file('slider_image');
        if($image)
        {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='slider/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['slider_image']=$image_url;
                DB::table('slide')->insert($data);
                Session::put('message','Slider Image added succesfully.....!');
                return Redirect::to('/addslider');
            }
        }
        $data['slider_image']='';
        DB::table('slide')->insert($data);
                Session::put('message','Slider image added without succesfully.....!');
                return Redirect::to('/addslider');

    }
    public function allslider()
    {
        $allsliderinfo= DB::table('slide')->get(); 
        $manageslide= view('admin.all_slider') 
                         ->with('allsliderinfo',$allsliderinfo); 
        return view('admin_layout')
                        ->with('admin.all_slider',$manageslide); 
        //return view('/admin.all_slider');
    }

    public function unslider($slider_id)
    {
        DB::table('slide')
            ->where('slider_id',$slider_id)
            ->update(['slider_publication_status' => 0 ]);
            Session::put('message','Slide Picture Unactive succesfully.....!');
            return Redirect::to('/allslider');
    }

    public function acslider($slider_id)
    {
        DB::table('slide')
            ->where('slider_id',$slider_id)
            ->update(['slider_publication_status' => 1 ]);
            Session::put('message','Slide Active succesfully.....!');
            return Redirect::to('/allslider');
    }

    public function delslider(Request $request, $slider_id )
    {
        $slider_info= DB::table('slide')
                       ->where('slider_id',$slider_id )
                       ->delete();

                       Session::put('message','Slider  Delete succesfully.....!');
                       return Redirect::to('/allslider');
    }

                
}
