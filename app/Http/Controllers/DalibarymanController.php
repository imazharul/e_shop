<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use app\Http\Requests;
use Illuminate\Support\Str;

use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class DalibarymanController extends Controller
{
    public function index()
    {
        return view('admin.add_dalibaryman');
    }

    public function adddalibaryman(Request $request)
    {
        $data=array();
        $data['dalibaryman_name']=$request->dalibaryman_name;
      
       
       $data['dalibaryman_description']=$request->dalibaryman_description;
      
       $data['status']=$request->status;
    
       $dalibaryman_image=$request->file('dalibaryman_image');
        if($dalibaryman_image)
        {
            $image_name=str_random(20);
            $ext=strtolower($dalibaryman_image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='dalibaryman_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$dalibaryman_image->move($upload_path,$image_full_name);

            if($success){
                $data['dalibaryman_image']=$image_url;
                DB::table('dalibaryman')->insert($data);
                Session::put('message','Dalibaryman added succesfully.....!');
                return Redirect::to('dalibaryman');
            }
        }
        $data['dalibaryman_image']='';
        DB::table('dalibaryman')->insert($data);
                Session::put('message','Dalibaryman image added without succesfully.....!');
                return Redirect::to('dalibaryman');
    }

    public function show_dalibaryman()
    {
        $show_dalibaryman_info= DB::table('dalibaryman')->get(); 

        $manage_dalibaryman_info= view('admin.show_dalibaryman')
                         ->with('show_dalibaryman_info',$show_dalibaryman_info); 
        return view('admin_layout')
                        ->with('admin.show_dalibaryman',$manage_dalibaryman_info);
    }

    public function editdelibariman($dalibaryman_id)
    {
        $edit_dalibaryman_info= DB::table('dalibaryman')
                       ->where('dalibaryman_id',$dalibaryman_id)
                       ->first();

        $manage_dalibaryman_info= view('admin.edit_dalibaryman')
                       ->with('edit_dalibaryman_info',$edit_dalibaryman_info); 
      return view('admin_layout')
                      ->with('admin.manage_dalibaryman_info',$manage_dalibaryman_info);
  
    }


    public function updatedalibaryman(Request $request, $dalibaryman_id)
    {
       $data=array();
       $data['dalibaryman_name']=$request->dalibaryman_name;
       $data['dalibaryman_description']=$request->dalibaryman_description;

       DB::table('dalibaryman')->where('dalibaryman_id',$dalibaryman_id)
       ->update($data);

       Session::put('message','Dalibaryman Update succesfully.....!');
       return Redirect::to('show_dalibaryman');
    }


    public function deletedelibariman(Request $request,$dalibaryman_id)
    {
        $dalibaryman_info= DB::table('dalibaryman')
                       ->where('dalibaryman_id',$dalibaryman_id)
                       ->delete();

                       Session::put('message','Dalibaryman Delete succesfully.....!');
                       return Redirect::to('/show_dalibaryman');
    }

    public function activedelibariman($dalibaryman_id)
    {
        DB::table('dalibaryman')
            ->where('dalibaryman_id',$dalibaryman_id)
            ->update(['status'=>1 ]);
            Session::put('message','Dalibaryman Active succesfully.....!');
            return Redirect::to('/show_dalibaryman');
    }

    public function unactivedelibariman($dalibaryman_id)
    {
        DB::table('dalibaryman')
        ->where('dalibaryman_id',$dalibaryman_id)
        ->update(['status'=>0 ]);
        Session::put('message','Dalibaryman Unactive succesfully.....!');
        return Redirect::to('/show_dalibaryman');

    }
}
