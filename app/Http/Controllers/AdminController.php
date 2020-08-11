<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use DB;
use app\Http\Requests;

use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    
    
    public function dashboard(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        
        $m=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();
               
                if($m)
                {
                    Session::put('admin_name',$m->admin_name);
                    Session::put('admin_id',$m->admin_id);
                    return Redirect::to('/dashboard');
                }
               else
               {
                   Session::put('message','Email or password invalid');
                   return Redirect::to('/admin');
               }
    }
}