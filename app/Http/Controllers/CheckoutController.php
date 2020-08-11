<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
use Cart;


use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class CheckoutController extends Controller
{
    // login check page open
    public function login_check()
    {
        return view('pages.login');
    }
    // Save data customer table...........
    public function CheckoutController(Request $request)
    {
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $data['customer_number']=$request->customer_number;

       $customer_info= DB::table('customer')
           ->insertGetId($data);
        
        Session::put('customer_id',$request->customer_id);
        Session::put('customer_name',$request->customer_name);

        return Redirect::to('/checkout');
    }
   // Show Checkout page..............
    public function checkout()
    {
        return view('pages.checkout');
    }

    //save_shipping function
    Public function shop(Request $request)
    {
        $data=array();
        $data['first_name']=$request->first_name;
        $data['last_name']=$request->last_name;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['mobile_number']=$request->mobile_number;
        $data['city']=$request->city;

        $shopping_info= DB::table('ship')->insert($data);
       return view('/pages.payment');
    }

    //Customer function here 
    public function customer_login(Request $request)
    {

        $customer_email=$request->customer_email;
        $customer_password=md5($request->customer_password);

        $customer_login_info=DB::table('customer')
                            ->where('customer_email',$customer_email)
                            ->where('customer_password',$customer_password)
                            ->first();
                    
            if($customer_login_info)
            {
                Session::put('customer_id',$customer_login_info->customer_id);
                return Redirect::to('/checkout');
            }else{
                return Redirect::to('/login_check');
            }
    }
    
    // Logout function 
    public function customer_logout()
    {
        Session::flush();
        return Redirect::to('/');
    }


    //Payment function here.........
    public function payment()
    {
        return view('pages.payment');
    }

    // payment order function here............
    public function order_plase(Request $request)
    {
        $payment_gatway=$request->payment_method;

        // insert data payment table..........
        $pdata=array();
        $pdata['payment_method']=$payment_gatway;
        $pdata['payment_status']='panding';

        $pament_info=DB::table('payment')
                        ->insertGetId($pdata);
        
    // insert data Order table..........
    
        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['ship_id']=Session::get('ship_id');
        $odata['payment_id']=Session::get('payment_id');
        $odata['order_total']=Cart::gettotal();
        $odata['order_status']='panding';
        
        $order_info=DB::table('order')
                    ->insertGetId($odata);
        
    // using Cart session data..........
        $contents=Cart::getContent();
        $oddata=array();

    foreach ($contents as $v_content) 
    {
        $oddata['order_id']=$v_content->order_id;
        $oddata['product_id']=$v_content->id;
        $oddata['product_name']=$v_content->name;
        $oddata['product_price']=$v_content->price;
        $oddata['product_sales_quentity']=$v_content->qty;

        DB::table('order_details')
            ->insert($oddata);

    }

        if($payment_gatway=='handcash')
        {
            Cart::isEmpty();
            return view('pages.handcash');
            
        }
        elseif($payment_gatway=='card')
        {
            echo "card data";
        }
        elseif($payment_gatway=='bkash')
        {
            echo "bkash data";
        }
        else{
            echo "not selected";
        }


    }
}

