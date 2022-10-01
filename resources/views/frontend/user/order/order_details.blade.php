@extends('frontend.frontend_master')
@section('title','Order Details')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4>Shipping Details</h4></div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th>Shipping Name</th>
                                    <td>{{ $order->name }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Phone</th>
                                    <td>{{ $order->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Email</th>
                                    <td>{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <th>Division</th>
                                    <td>{{ $order->division->division_name }}</td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td>{{ $order->district->district_name }}</td>
                                </tr>
                                <tr>
                                    <th>Area</th>
                                    <td>{{ $order->area->area_name }}</td>
                                </tr>
                                <tr>
                                    <th>Post Code</th>
                                    <td>{{ $order->post_code }}</td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>{{ $order->order_date }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><h4>Order Details of User
                            <span class="text-danger">Invoice: {{ $order->invoice_no }}</span></h4></div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $order->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Type</th>
                                    <td>{{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>Transaction Id</th>
                                    <td>{{ $order->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>Invoice</th>
                                    <td class="text-danger">{{ $order->invoice_no }}</td>
                                </tr>
                                <tr>
                                    <th>Order Total Amount</th>
                                    <td >{{ $order->amount}}</td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td><span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr style="background: #e2e2e2">
                                    <td class="col-md-1">
                                        <label for="">Image</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Product Name</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Product Code</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Color</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Size</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Quantity</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Price</label>
                                    </td>
                                </tr>

                                @foreach($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" style="height: 130px;width: 130px;" alt=""></label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">{{ $item->product->product_name_english }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->product->product_code }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->color }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->size }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->qty }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">${{ $item->price }} (${{ $item->price * $item->qty }}) </label>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                @if($order->status !== "delivered")

                @else

                    @php
                        $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
                    @endphp


                    @if($order)
                        <form action="{{ route('return-order',$order->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="label"> Order Return Reason:</label>
                                <textarea name="return_reason" id="" class="form-control" cols="30" rows="05"></textarea>
                            </div>

                            <button type="submit" class="btn btn-danger">Order Return</button>

                        </form>
                    @else

                        <span class="badge badge-pill badge-warning" style="background: red">You Have send return request for this product</span>

                    @endif

                @endif
                <br><br>
            </div>
        </div>
    </div>
@endsection


