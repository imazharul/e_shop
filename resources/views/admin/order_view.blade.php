@extends('admin_layout')
@section('admin_content')

    <div class="row-fluid sortable">
        <div class="box span6">
            <div class="box-header">
                <h2>
                    <i class="halfling-icon align-justify"></i><span class="break">Customer Details</span>
                </h2>
            </div>
            <div class="box-content">
                <table class="table">
                    <thead>
                    {{-- <caption>table title and/or explanatory text</caption> --}}
                        <tr>
                            <th>User Name</th>
                            <th>Mobile Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($order_by_id as $v_ordr)                            
                            @endforeach

                            <td>{{$v_ordr->customer_name}}</td>
                            <td>{{$v_ordr->customer_number}}</td>
                            
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
                <div class="box span6">
            <div class="box-header">
                <h2>
                    <i class="halfling-icon align-justify"></i><span class="break">Shipping Details</span>
                </h2>
            </div>
            <div class="box-content">
                <table class="table">
                    <thead>
                    {{-- <caption>table title and/or explanatory text</caption> --}}
                        <tr>
                            <th>User Name</th>
                            <th>Address</th>
                            <th>Mobile </th>
                            <th>Email </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($order_by_id as $v_or)                                
                            @endforeach

                            <td>{{$v_or->first_name}}</td>
                            <td>{{$v_or->address}}</td>
                            <td>{{$v_or->mobile_number}}</td>
                            <td>{{$v_or->email}}</td>
                            
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
        
        <div class="row-fluid sortable12">

            <div class="box-header">
                <h2>
                    <i class="halfling-icon align-justify"></i><span class="break">Order Details</span>
                </h2>
            </div>
            <div class="box-content">
                <table id="datatableid" class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    {{-- <caption>table title and/or explanatory text</caption> --}}
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Sales Quentity</th>
                            <th>Product Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_by_id as $v_ord)
                        <tr>
                            <td>{{$v_ord->order_details_id}}</td>
                            <td>{{$v_ord->product_name}}</td>
                            <td>{{$v_ord->product_price}}</td>
                            <td>{{$v_ord->product_sales_quentity}}</td>
                            <td>{{$v_ord->product_price*$v_ord->product_sales_quentity}}</td>                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <tr>
                    <td colspan="4">Total with vat: </td>
                    <td><strong>=<td>{{$v_ord->order_total}} Tk</td></td>
                </tr>
           
        </div>
            
        </div>
    </div>


@endsection