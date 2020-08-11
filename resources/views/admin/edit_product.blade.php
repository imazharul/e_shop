@extends('admin_layout')
@section('admin_content')


			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>
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
						<form class="form-horizontal" action="{{ url('/updateproduct',$product_info->product_id) }}" method="post">
                            {{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name :</label>
							  <div class="controls">
							  <input type="text" class="input-xlarge" name="product_name" value="{{$product_info->product_name}}">
							  </div>
                            </div>

                            <div class="control-group">
								<label class="control-label" for="selectError3">Category Name :</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
                                     <option>Select Category</option>
                                         <?php
									        $all_publistcategory = DB::table('category')
									            ->where('publication_satus',1)
									            ->get();

                                            foreach ($all_publistcategory as $v_category) {?>
                                    
                                                <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                                         <?php } ?>

								  </select>
								</div>
              </div>
                              
              <div class="control-group">
								<label class="control-label" for="selectError3">Manufacture Name :</label>
								<div class="controls">
								  <select id="selectError3" name="manufactur_id">
                                    <option>Select Manufacture</option>
                                       
                                       <?php
								
                                            $all_publicmanufactur = DB::table('manufactur')
                                            ->where('publication_status',1)
                                            ->get();
                                        
                                        foreach ($all_publicmanufactur as $v_manufactur) {?>

                                             <option value="{{$v_manufactur->manufactur_id}}">{{$v_manufactur->manufactur_name}}</option>

                                        <?php } ?>
									
								  </select>
								</div>
                </div>
                            <div class="control-group">
                                <label class="control-label" for="date01">Product Price :</label>
                                <div class="controls">
                                <input type="text" class="input-xlarge" name="product_price" value="{{$product_info->product_price}}">
                                </div>
                              </div>
                            
         
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-success"> Save </button>
							  
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

@endsection()