@extends('admin_layout')
@section('admin_content')


			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Delibary Man</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
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
						<form class="form-horizontal" action="{{ url('/updatedalibaryman',$edit_dalibaryman_info->dalibaryman_id ) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01"> Name :</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="dalibaryman_name" value="{{$edit_dalibaryman_info->dalibaryman_name}}">
							  </div>
                            </div>
                            

              <div class="control-group">

                </div>
                              <div class="control-group hidden-phone">
                                <label class="control-label" for="textarea2"> Discription :</label>
                                <div class="controls">
                                  <textarea class="cleditor" name="dalibaryman_description" rows="3">{{$edit_dalibaryman_info->dalibaryman_description}}</textarea>
                                </div>
                              </div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">  Update </button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

@endsection()