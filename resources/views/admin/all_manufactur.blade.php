@extends('admin_layout')
@section('admin_content')


<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Manufactur</h2>
						
					</div>
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

					<div class="box-content">
						<table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Manufactur ID</th>
								  <th>Manufactur Name</th>
								  <th>Manufactur Discription</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
			@foreach ($allmanufacturinfo as $v_manufactur) 
	 
			<tbody>
				<tr>
					<td>{{$v_manufactur ->manufactur_id}}</td>
					<td class="center">{{$v_manufactur->manufactur_name}}</td>
					<td class="center">{{$v_manufactur->manufactur_discription}}</td>
					
					<td class="center">
						@if($v_manufactur ->publication_status==1)

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
					
					@if($v_manufactur->publication_status==1)
				<a class="btn btn-danger" href="{{URL::to('/un',$v_manufactur->manufactur_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
					@else
					<a class="btn btn-success" href="{{URL::to('/ac',$v_manufactur->manufactur_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
					@endif
					<a class="btn btn-info" href="{{URL::to('/ed',$v_manufactur->manufactur_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{URL::to('/de',$v_manufactur->manufactur_id)}}" id="delete">
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