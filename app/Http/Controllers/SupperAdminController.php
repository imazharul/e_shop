<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use app\Http\Requests;

use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class SupperAdminController extends Controller
{
    public function show_dashboard(){
        $this->adminauthcheck();
        return view('admin.dashboard'); //views folder admin_layout page show
    }

    public function adminauthcheck(){
        $admin_id= Session::get('admin_id');
        if($admin_id)
        {
            return;
        }
        else
        {
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        //Session::put('admin_name',null);
        //Session::put('admin_id',null);
        Session::flush();
        return Redirect::to('/admin')->send();
    }
}
