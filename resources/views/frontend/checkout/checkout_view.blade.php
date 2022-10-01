@extends('frontend.frontend_master')
@section('title')
My Checkout Page
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="breadcrumb">
<div class="container">
<div class="breadcrumb-inner">
    <ul class="list-inline list-unstyled">
        <li><a href="home.html">Home</a></li>
        <li class='active'>Checkout</li>
    </ul>
</div><!-- /.breadcrumb-inner -->
</div><!-- /.container -->
</div>
<div class="body-content">
<div class="container">
<div class="checkout-box ">
    <div class="row">
        <form class="" action="{{ route('checkout-save') }}" method="post">
            @csrf
            <div class="col-md-8">
                <div class="panel-group checkout-steps" id="accordion">
                    <!-- checkout-step-01  -->
                    <div class="panel panel-default checkout-step-01">
                        <div id="collapseOne" class="panel-collapse collapse in">

                            <!-- panel-body  -->
                            <div class="panel-body">
                                <div class="row">
                                    <!-- already-registered-login -->
                                    <div class="col-md-6 col-sm-6 already-registered-login">
                                        <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
                                            <input type="text" name="shipping_name" class="form-control unicase-form-control text-input"
                                                   id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Email<span>*</span></label>
                                            <input type="email" name="shipping_email" class="form-control unicase-form-control text-input"
                                                   id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Phone<span>*</span></label>
                                            <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input"
                                                   id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Post Code<span>*</span></label>
                                            <input type="text" name="post_code" class="form-control unicase-form-control text-input"
                                                   id="exampleInputEmail1" placeholder="Post Code" value="">
                                        </div>

                                    </div>
                                    <!-- already-registered-login -->

                                    <!-- already-registered-login -->
                                    <div class="col-md-6 col-sm-6 already-registered-login">

                                        <div class="form-group">
                                            <h5><b>Select Division</b> <span class="text-danger">*</span></h5>
                                            <select name="division_id" id="select" class="form-control">
                                                <option value="" selected disabled>Select Your Division</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5><b>Select District</b> <span class="text-danger">*</span></h5>
                                            <select name="district_id" id="select" class="form-control">
                                                <option value="" selected disabled>Select Your District</option>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5><b>Select Area</b> <span class="text-danger">*</span></h5>
                                            <select name="area_id" id="select" class="form-control">
                                                <option value="" selected disabled>Select Your Area</option>
                                                @foreach($areas as $area)
                                                    <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('area_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="info-title" ><b>Notes</b> <span>*</span></label>
                                            <textarea name="notes" id=""  class="form-control" placeholder="notes"></textarea>
                                        </div>
                                    </div>
                                    <!-- already-registered-login -->
                                </div>
                            </div>
                            <!-- panel-body  -->

                        </div><!-- row -->
                    </div>
                    <!-- checkout-step-01  -->

                </div><!-- /.checkout-steps -->
            </div>
            <div class="col-md-4">
                <!-- checkout-progress-sidebar -->
                <div class="checkout-progress-sidebar ">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                            </div>
                            <div class="">
                                <ul class="nav nav-checkout-progress list-unstyled">
                                    @foreach($carts as $cart)
                                        <li>
                                            <strong>Image: </strong>
                                            <img src="{{ asset($cart->options->image) }}" style="height: 50px;width: 50px;">
                                        </li>
                                        <li>
                                            <strong>Quantity: </strong>
                                            ({{ $cart->qty }})
                                            <strong>Color: </strong>
                                            {{ $cart->options->color }}
                                            <strong>Size: </strong>
                                            {{ $cart->options->size }}

                                        </li>
                                    @endforeach
                                    <hr>
                                    <li>
                                        @if(Session::has('coupon'))
                                            <strong>Subtotal: </strong> ${{ $cartTotal }}
                                            <hr>
                                            <strong>Coupon Name: </strong> {{ Session::get('coupon')['coupon_name'] }}
                                            ( {{ Session::get('coupon')['coupon_discount'] }} %)
                                            <hr>
                                            <strong>Discount Amount: </strong>${{ Session::get('coupon')['discount_amount'] }}
                                            <hr>
                                            <strong>Grand Total: </strong>${{ Session::get('coupon')['total_amount'] }}
                                            <hr>
                                        @else
                                            <strong>Subtotal: </strong> ${{ $cartTotal }}
                                            <strong>GrandTotal: </strong> ${{ $cartTotal }}
                                        @endif

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- checkout-progress-sidebar -->
            </div>
            <div class="col-md-4">
                <!-- checkout-progress-sidebar -->
                <div class="checkout-progress-sidebar ">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">Select payment method</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Stripe</label>
                                    <input type="radio" name="payment_method" value="stripe">
                                    <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Card</label>
                                    <input type="radio" name="payment_method" value="card">
                                    <img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt="">

                                </div>
                                <div class="col-md-4">
                                    <label for="">Cash</label>
                                    <input type="radio" name="payment_method" value="cash">
                                    <img src="{{ asset('frontend/assets/images/payments/6.png') }}" alt="">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>

                        </div>
                    </div>
                </div>
                <!-- checkout-progress-sidebar -->
            </div>
        </form>
    </div><!-- /.row -->
</div><!-- /.checkout-box -->
</div><!-- /.body-content -->
</div>



<script>
$(document).ready(function(){
$('select[name="division_id"]').on('change',function(){
    var division_id = $(this).val();
    if(division_id){
        $.ajax({
            url:"{{ url('http://localhost/Advanced-Ecommerce/public/district-get/ajax') }}/"+division_id,
            type:"GET",
            dataType:"JSON",
            success:function(data){
                $('select[name="area_id"]').empty();
                var d = $('select[name="district_id"]').empty();
                $.each(data,function (key,value){
                    $('select[name="district_id"]').append('<option value="'+ value.id +'">'+value.district_name+'</option>');
                })

            },
        });
    }else{
        alert('danger');
    }
});
$('select[name="district_id"]').on('change',function(){
    var district_id = $(this).val();
    if(district_id){
        $.ajax({
            url:"{{ url('http://localhost/Advanced-Ecommerce/public/area-get/ajax') }}/"+district_id,
            type:"GET",
            dataType:"JSON",
            success:function(data){
                var d = $('select[name="area_id"]').empty();
                $.each(data,function (key,value){
                    $('select[name="area_id"]').append('<option value="'+ value.id +'">'+value.area_name+'</option>');
                })

            },
        });
    }else{
        alert('danger');
    }
});
});
</script>


@endsection
