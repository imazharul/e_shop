<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

//Frontent route........
Route::get('/','HomeController@index'); //content site
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_manufactur/{category_id}','HomeController@show_product_by_manufactur');
Route::get('/view_product/{product_id}','HomeController@product_details_by_id');

//Card Route here.........
Route::post('/add_to_cart','CartController@add_to_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete_to_cart/{id}','CartController@delete_to_cart');
Route::post('/update_cart','CartController@update_cart');


//Checkout Route here......
Route::get('/login_check','CheckoutController@login_check');
Route::post('/customer_rejistration','CheckoutController@CheckoutController');
Route::get('/checkout','CheckoutController@checkout');

//Customer login.............
Route::post('/customer_login','CheckoutController@customer_login');
Route::post('/customer_logout','CheckoutController@customer_logout');

//shopping Route here.......not work properly
Route::post('/shop','CheckoutController@shop');

//Payment Route here..........
Route::get('/payment','CheckoutController@payment');
Route::post('/orderplase','CheckoutController@order_plase');

//Manage order route here.........
Route::get('/manageorder','OrderController@manage_order');
Route::get('/order_unactive/{order_id}','OrderController@o_unactive');
Route::get('/order_active/{order_id}','OrderController@o_active');
Route::get('/order_delete/{order_id}','OrderController@o_delete');
Route::get('/order_view/{order_id}','OrderController@o_view');

// Dalibary man route here...........
Route::get('/dalibaryman','DalibarymanController@index');
Route::post('/adddalibaryman','DalibarymanController@adddalibaryman');
Route::get('/show_dalibaryman','DalibarymanController@show_dalibaryman');
Route::get('/editdelibariman/{dalibaryman_id}','DalibarymanController@editdelibariman');
Route::post('/updatedalibaryman/{dalibaryman_id}','DalibarymanController@updatedalibaryman');
Route::get('/deletedelibariman/{dalibaryman_id}','DalibarymanController@deletedelibariman');
Route::get('/activedelibariman/{dalibaryman_id}','DalibarymanController@activedelibariman');
Route::get('/unactivedelibariman/{dalibaryman_id}','DalibarymanController@unactivedelibariman');

//Backhand route..........
Route::get('/logout','SupperAdminController@logout'); //supperadmin logout 
Route::get('/admin','AdminController@index'); //content site
Route::get('/dashboard','SupperAdminController@show_dashboard'); //deasbord site
Route::post('/admin_dashboard','adminController@dashboard'); //deasbord site


// Category Route..........
Route::get('/addcategory','CategoryController@index');
Route::get('/allcategory','CategoryController@allcategory');
Route::post('/saveaddcategory','CategoryController@saveaddcategory');
Route::get('/unactive/{category_id}','CategoryController@unactive');
Route::get('/active/{category_id}','CategoryController@active');
Route::get('/edit/{category_id}','CategoryController@edit');
Route::post('/updatecategory/{category_id}','CategoryController@updatecategory');
Route::get('/delete/{category_id}','CategoryController@delete');
// Route::get('/seacrh','CategoryController@seacrh');

 
// Manufactur or Brand Route here...........
Route::get('/addmanufactur','ManufacturController@index');
Route::post('/saveaddmanufactur','ManufacturController@saveaddmanufactur');
Route::get('/allmanufactur','ManufacturController@allmanufactur');
Route::get('/un/{manufactur_id}','ManufacturController@un');
Route::get('/ac/{manufactur_id}','ManufacturController@ac');
Route::get('/ed/{manufactur_id}','ManufacturController@ed');
Route::post('/updatemanufactur/{manufactur_id}','ManufacturController@up');
Route::get('/de/{manufactur_id}','ManufacturController@de');

// Products Route here........
Route::get('/addproduct','ProductController@index');
Route::post('/saveaddproduct','ProductController@saveaddproduct');
Route::get('/allproduct','ProductController@allproduct');
Route::get('/unactiveproduct/{product_id}','ProductController@unactiveproduct');
Route::get('/activeproduct/{product_id}','ProductController@activeproduct');
Route::get('/editproduct/{product_id}','ProductController@editproduct');
Route::post('/updateproduct/{product_id}','ProductController@updateproduct');
Route::get('/deleteproduct/{product_id}','ProductController@deleteproduct');

// Slider Route......

Route::get('/addslider','SliderController@index');
Route::post('/saveaddslider','SliderController@saveaddslider');
Route::get('/allslider','SliderController@allslider');
Route::get('/unactiveslider/{slider_id}','SliderController@unslider');
Route::get('/activeslider/{slider_id}','SliderController@acslider');
Route::get('/deleteslider/{slider_id}','SliderController@delslider');

// review Route here.............
Route::Post('/addreview','ReviewController@addreview');


