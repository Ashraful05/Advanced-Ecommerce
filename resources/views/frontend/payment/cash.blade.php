@extends('frontend.frontend_master')
@section('title')
    Cash On Delivery Page
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Cash On Delivery</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">

                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Shopping Amount</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">

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
                                                    <hr>
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
                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select payment method</h4>
                                    </div>
                                    <form action="{{ route('cash-order') }}" method="post" id="payment-form">
                                        @csrf
                                        <div class="form-row">
                                            <img src="{{ asset('frontend/assets/images/payments/cash.png') }}" alt="">
                                            <label for="card-element">
                                                <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                                <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                                <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                                <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                                <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                                <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                                <input type="hidden" name="area_id" value="{{ $data['area_id'] }}">
                                                <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                            </label>

                                        </div>
                                        <br>
                                        <button class="btn btn-primary">Submit Payment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>

                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        </div><!-- /.body-content -->
    </div>

@endsection

