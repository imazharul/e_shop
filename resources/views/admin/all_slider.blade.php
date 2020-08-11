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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Slide</h2>
						
					</div>
					
					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Slide ID</th>
                                  <th>Slide Image</th>
								  <th>Status</>
								  <th>Actions</th>
							  </tr>
						  </thead>   

					@foreach ($allsliderinfo as $v_slide)
						 
					    <tbody>
							<tr>
								<td>{{ $v_slide->slider_id }}</td>
								
                               
                                 <td><img src="{{URL::to($v_slide->slider_image)}}" style="width: 120px; height: 120px"></td>
                                 

								<td class="center">
									@if($v_slide->slider_publication_status==1)

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
								
								@if($v_slide->slider_publication_status==1)
							<a class="btn btn-danger" href="{{URL::to('/unactiveslider',$v_slide->slider_id )}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@else
								<a class="btn btn-success" href="{{URL::to('/activeslider',$v_slide->slider_id )}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								@endif
								
									<a class="btn btn-danger" href="{{URL::to('/deleteslider',$v_slide->slider_id )}}" id="delete">
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