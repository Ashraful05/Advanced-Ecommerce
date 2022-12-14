@extends('admin.admin_master')
@section('title','All Return Request List')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Return Order List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>{{ $order->amount }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>
                                            @if($order->return_order == 1)
                                                <span class="badge badge-pill badge-primary">Pending</span>
                                            @elseif($order->return_order == 2)
                                                <span class="badge badge-pill badge-success">Success</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-success">Return Success</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>

        </div>
    </section>
@endsection



