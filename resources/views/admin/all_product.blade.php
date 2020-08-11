@extends('admin_layout')
@section('admin_content')


<p class="alert-success text align-center">
	<?php

		$message=Session::get('message');
		if($message)
		{
			echo $message;
			Session::put('message',null);
		}	

	?>
</p>
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product ID</th>
								  <th>Product Name</th>
                                  <th>Product Price</th>
                                  <th>Product Image</th>
                                  <th>Category Name</th>
                                  <th>Manufacture Name</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

					@foreach ($allproductinfo as $v_product)
						 
					    <tbody>
							<tr>
								<td>{{ $v_product->product_id }}</td>
								<td class="center">{{ $v_product->product_name }}</td>
                                <td class="center">{{ $v_product->product_price }}</td>

                                 <td><img src="{{URL::to($v_product->product_image)}}" style="width: 120px; height: 120px"></td>
                                 
                                 <td class="center">{{ $v_product->category_name }}</td>
                                 <td class="center">{{ $v_product->manufactur_name }}</td>

								<td class="center">
									@if($v_product->product_publication_status==1)

										<span class="btn btn-success">
											Active
										</span>
									@else 
										<span class="btn btn-danger">
											Unactive
										</span>
									@endif
								</td>

							<td class="center">
								
								@if($v_product->product_publication_status==1)
							<a class="btn btn-danger" href="{{URL::to('/unactiveproduct',$v_product->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@else
								<a class="btn btn-success" href="{{URL::to('/activeproduct',$v_product->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								@endif
								<a class="btn btn-info" href="{{URL::to('/editproduct',$v_product->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/deleteproduct',$v_product->product_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						</tbody>

					@endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection()