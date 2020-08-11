<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

use Illuminate\Http\Requests;

class OrderController extends Controller
{
    public function manage_order()
    {
      $all_order_info= DB::table('order')
            ->join('customer','order.customer_id','=','customer.customer_id')
            ->select('order.*','customer.customer_name')
            ->get();

            // echo "<pre>";
            // print_r($all_order_info);
            // echo "</pre>";
            // exit();
            $manage_order=view('admin.manage_order')
                          ->with('all_order_info',$all_order_info);
            return view('admin_layout')
                          ->with('admin.manage_order',$manage_order);

      //return view('admin.manage_order');
    }

    public function o_unactive($order_id)
    {
            DB::table('order')
            ->where('order_id',$order_id)
            ->update(['order_status' => 0 ]);
            Session::put('message','Order Unactive succesfully.....!');
            return Redirect::to('manageorder');

    }

    public function o_active($order_id)
    {
      DB::table('order')
            ->where('order_id',$order_id)
            ->update(['order_status' => 1 ]);
            Session::put('message','Order Active succesfully.....!');
            return Redirect::to('manageorder');

    }

    public function o_delete(Request $request, $order_id)
    {
      $order_info= DB::table('order')
                       ->where('order_id',$order_id)
                       ->delete();

                       Session::put('message','Order Delete succesfully.....!');
                       return Redirect::to('/manageorder');
    }

    public function o_view($order_id)
    {
      $order_by_id= DB::table('order')
            ->join('customer','order.customer_id','=','customer.customer_id')
            ->join('order_details','order.order_id','=','order_details.order_details_id')
            ->join('ship','order.ship_id','=','ship.ship_id')
            ->select('order.*','order_details.*','ship.*','customer.*')
            ->first();

            $mangae_order_view=view('admin.order_view')
                          ->with('order_by_id',$order_by_id);
            return view('admin_layout')
                          ->with('admin.order_view.',$mangae_order_view);
      //return view('admin.order_view');
    }
}
