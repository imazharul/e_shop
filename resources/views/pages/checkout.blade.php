@extends('layout')
@section('content')

    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="register-req">
            <p>Please fillup the information</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12">
                    <div class="shopper-info">
                        <div class="col-sm-12">
                            <div class="signup-form"><!--sign up form-->
                                <h2> Shopper information !</h2>
                            <form action="{{url('/shop')}}" method="POST">

                                {{ csrf_field() }}

                                    <input type="text" placeholder="Full Name" required="" name="first_name" required="">
                                    <input type="text" placeholder="Email Address" name="last_name" required="">
                                    <input type="text" placeholder="Password" name="email" required="">
                                    <input type="text" placeholder="address" name="address" required="">
                                    <input type="text" placeholder="mobile_number" name="mobile_number" required="">
                                    <input type="text" placeholder="city" name="city" required="">

                                    <button type="submit" class="btn btn-default">Done</button>
                                    {{-- <button type="reset" class="btn">Cancel</button> --}}
                                </form>
                            </div><!--/sign up form-->
                        </div>
                    </div>
                </div>
                            
            </div>
        </div>
    </div>



@endsection()