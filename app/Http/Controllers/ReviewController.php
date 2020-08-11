<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use app\Http\Requests;

use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class ReviewController extends Controller
{
    public function addreview(Request $request)
    {
        $data = array();
        $data['review_name']=$request->review_name;
        $data['review_email']=$request->review_email;
        $data['review_description']=$request->review_description;

        DB::table('review')->insert($data);
        // Session::put('message','Category added succesfully.....!');
        return Redirect::to('/allproduct');

    }

}
