@extends('frontend.frontend_master')
@section('title','Cancel Order List')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2">

                </div>

                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr style="background: #e2e2e2">
                                <td class="col-md-1">
                                    <label for="">Date</label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">Total</label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">Payment</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Invoice</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Order</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Actions</label>
                                </td>
                            </tr>

                            @forelse($orders as $order)
                                <tr>
                                    <td class="col-md-1">
                                        <label for="">{{ $order->order_date }}</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">${{ $order->amount }}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">{{ $order->payment_method }}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">{{ $order->invoice_no }}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">
                                            <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }}</span>
                                        </label>
                                    </td>
                                    <td class="col-md-1">
                                        <a href="{{ url('user/order_details/'.$order->id) }}" class="btn btn-sm btn-primary" title="View"><i class="fa fa-eye"></i></a>
                                        <a target="_blank" href="{{ url('user/invoice_download/'.$order->id) }}" class="btn btn-sm btn-danger" title="Invoice" style="margin-top: 5px;"><i class="fa fa-download" style="color: white"></i></a>
                                    </td>
                                </tr>

                            @empty
                                <h2 class="text-danger">Order Not Found!!</h2>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

