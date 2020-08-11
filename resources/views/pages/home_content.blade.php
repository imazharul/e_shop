@extends('layout')
@section('content')

                   <h2 class="title text-center">Features Items</h2>

                             <?php
									foreach ($allpublistproduct as $v_publistproduct) {?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($v_publistproduct->product_image)}}" alt="" style="height: 300px"/>
											<h2>{{ $v_publistproduct->product_price}} Tk</h2>
										<p>{{ $v_publistproduct->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<img src="{{URL::to($v_publistproduct->product_image)}}" alt="" style="height: 300px; width:250px"/>
												<h2>{{ $v_publistproduct->product_price}} Tk</h2>
											<a href="{{URL::to('/view_product/'.$v_publistproduct->product_id)}}"> <p>{{ $v_publistproduct->product_name}}</p></a>
												<a href="{{URL::to('/view_product/'.$v_publistproduct->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" ></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>{{ $v_publistproduct->manufactur_name}}</a></li>
										<li><a href="{{URL::to('/view_product/'.$v_publistproduct->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
									</ul>
								</div>
							</div>
						</div>
						
						<?php } ?>
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								
								<?php
								
								$all_publicmanufactur = DB::table('manufactur')
									->where('publication_status',1)
									->get();
									
									foreach ($all_publicmanufactur as $v_manufactur) {?>
									  <li><a href="{{URL::to('product_by_manufactur/'.$v_manufactur->manufactur_id)}}"> </span>{{$v_manufactur->manufactur_name}}</a></li>
									
									<?php }?>
							</ul>
						</div>
						<?php
									foreach ($allpublistproduct as $v_publistproduct) {?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($v_publistproduct->product_image)}}" alt="" style="height: 180px; width:180px"/>
											<h2>{{ $v_publistproduct->product_price}} Tk</h2>
										<p>{{ $v_publistproduct->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<img src="{{URL::to($v_publistproduct->product_image)}}" alt="" style="height: 300px; width:250px"/>
												<h2>{{ $v_publistproduct->product_price}} Tk</h2>
											<a href="{{URL::to('/view_product/'.$v_publistproduct->product_id)}}"> <p>{{ $v_publistproduct->product_name}}</p></a>
												<a href="{{URL::to('/view_product/'.$v_publistproduct->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" ></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>{{ $v_publistproduct->manufactur_name}}</a></li>
										<li><a href="{{URL::to('/view_product/'.$v_publistproduct->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
									</ul>
								</div>
							</div>
						</div>
						
						<?php } ?>
						{{-- <div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">

											 <div class="productinfo text-center">
												<img src="{{URL::to($v_manufactur->)}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div> 
											
										</div>
									</div>
								</div>
							</div>
						</div> --}}
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<?php
													foreach ($allpublistproduct as $v_publistproduct) {?>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
											

													<img src="{{URL::to($v_publistproduct->product_image)}}" alt="" style="height: 150px; width:90px"/>
												<h2>{{$v_publistproduct->product_price}}</h2>
													<p>{{$v_publistproduct->product_name}}</p>
													<a href="{{URL::to('/view_product/'.$v_publistproduct->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" ></i>Add to cart</a>
													
												</div>
												
											</div>
											
										</div>
									</div>
									<?php }?>
								</div>
							
								<div class="item">	

								</div>
						

							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->

@endsection