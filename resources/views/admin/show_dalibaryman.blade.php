@extends('admin_layout')
@section('admin_content')


<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All DalibaryMan</h2>
						
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
								  <th> ID</th>
								  <th> Name</th>
                                  <th> Discription</th>
                                  <th> Image</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  
			@foreach ($show_dalibaryman_info as $v_dalibaryman) 
	 
			<tbody>
				<tr>
					<td>{{$v_dalibaryman ->dalibaryman_id }}</td>
					<td class="center">{{$v_dalibaryman->dalibaryman_name }}</td>
                    <td class="center">{{$v_dalibaryman->dalibaryman_description}}</td>
                    <td><img src="{{URL::to($v_dalibaryman->dalibaryman_image)}}" style="width: 120px; height: 120px"></td>
					
					<td class="center">
						@if($v_dalibaryman->status==1)

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
					
					@if($v_dalibaryman->status==1)
				<a class="btn btn-danger" href="{{URL::to('/unactivedelibariman',$v_dalibaryman->dalibaryman_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
					@else
					<a class="btn btn-success" href="{{URL::to('/activedelibariman',$v_dalibaryman->dalibaryman_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
					@endif
					<a class="btn btn-info" href="{{URL::to('/editdelibariman',$v_dalibaryman->dalibaryman_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{URL::to('/deletedelibariman',$v_dalibaryman->dalibaryman_id)}}" id="delete">
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