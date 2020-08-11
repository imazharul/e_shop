@extends('layout')
@section('content')


<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>

        <div class="table-responsive cart_info">
           
            <?php
                $contents=Cart::getContent();
                // echo "<pre>";
                // 	print_r($contents);
                // 	echo "</pre>";
                // 	exit();
                ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td class="action">Action</td>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ( $contents as $v_content) {?>
                        
                    <tr>
                        <td class="cart_product">
                        <a href=""><img src="{{URL::to($v_content->attributes->image)}}" height="80px"; width="80px"; alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            
                        </td>
                        <td class="cart_price">
                            <p>{{$v_content->price}} Tk</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                            <form action="{{url('/update_cart')}}" method="post">
                                    {{ csrf_field() }}
                                {{-- <a class="cart_quantity_up" href=""> + </a> --}}
                                <input class="cart_quantity_input" type="text" name="qty" value="{{Cart::getTotalQuantity()}}" autocomplete="off" size="2">
                                <input type="hidden" name="id" value="{{$v_content->id}}">
                                {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                                <input type="submit" name="submit" value="Update" class="btn-btn-sm ">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{Cart::getSubTotal()}}</p>
                        </td>
                        <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{URL::to('/delete_to_cart/'.$v_content->id)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

    <section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <form action="{{url('/orderplase')}}" method="POST">
            {{ csrf_field() }}
		        <div class="breadcrumbs">
                    <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Payment method</li>
                    </ol>
		            </div>
		            <div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							<p class="text-center">Created with bootsrap button and using radio button</p>
					</div>
					<div class="paymentWrap">

						{{-- <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
				            <label class="btn paymentMethod active">
				            	<div class="method visa"></div>
				                <input type="radio" name="payment_gatway" value="handcash" checked> 
				            </label>
				            <label class="btn paymentMethod">
				            	<div class="method master-card"></div>
				                <input type="radio" name="payment_gatway" value="handcash"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method amex"></div>
				                <input type="radio" name="payment_gatway" value="handcash">
				            </label>
				             <label class="btn paymentMethod">
			             		<div class="method vishwa"></div>
				                <input type="radio" name="payment_gatway" value="handcash"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method ez-cash"></div>
				                <input type="radio" name="payment_gatway" value="handcash"> 
				            </label> 
				         
                        </div>         --}}

                        <input type="radio" name="payment_method" value="handcash" checked> Hand-Cash <br>
                        <input type="radio" name="payment_method" value="cart" checked> Dabit-cart <br>
                        <input type="radio" name="payment_method" value="bkash" checked> Bkash <br>
                    
                        <input type="submit" name="submit" class="btn-btn-primary" value="Done">
					</div>
					{{-- <div class="footerNavWrap clearfix">
						<div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> Done </div>
					</div> --}}
                </div>
            </form>
	</div>
</section><!--/#do_action-->

@endsection