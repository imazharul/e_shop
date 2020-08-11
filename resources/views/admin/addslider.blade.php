@extends('admin_layout')
@section('admin_content')


			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
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
						<form class="form-horizontal" action="{{ url('/saveaddslider') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
						  <fieldset>
					
                              <div class="control-group">
                                <label class="control-label" for="fileInput"> Slide Image :</label>
                                <div class="controls">
                                  <input class="input-file uniform_on" name="slider_image" id="fileInput" type="file">
                                </div>
                              </div> 

                              
                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status :</label>
							  <div class="controls">
								<input type="checkbox" name="slider_publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Slide </button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

@endsection()