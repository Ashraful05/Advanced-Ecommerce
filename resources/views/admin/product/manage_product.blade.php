@extends('admin.admin_master')
@section('title','Manage Product')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product List <span class="badge badge-pill badge-danger">{{ count($products) }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Product Name English</th>
                                    <th>Product Quantity (Piece)</th>
                                    <th>Product Price ($)</th>
                                    <th>Product Discount</th>
                                    <th>Product Thumbnail</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $row => $product)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $product->product_name_english }}</td>
                                        <td>{{ $product->product_quantity }} Piece</td>
                                        <td>{{ $product->selling_price }} $</td>
                                        <td>
                                            @if($product->discount_price == Null)
                                                <span class="badge badge-pill badge-danger">No Discount</span>
                                            @else
                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount/$product->selling_price) * 100;
                                                @endphp
                                                <span class="badge badge-pill badge-danger">{{ round($discount) }}%</span>

                                            @endif
                                        </td>
                                        <td><img src="{{ asset($product->product_thumbnail) }}" style="height: 60px;width: 50px;" alt=""></td>
                                        <td>
                                            @if($product->status==1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td width="50%">
                                            <a href="{{ route('details-product',$product->id) }}" class="btn btn-info" title="Product Details">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('edit-product',$product->id) }}" class="btn btn-primary" title="Edit">
                                                <i class="fa fa-pencil" ></i>
                                            </a>
                                            <a href="{{ route('delete-product',$product->id) }}" id="delete" class="btn btn-danger" title="Delete">
                                                <i class="fa fa-trash" ></i>
                                            </a>
                                            @if($product->status==1)
                                                <a href="{{ route('inactive-product',$product->id) }}" class="btn btn-danger" title="Inactive Now">
                                                    <i class="fa fa-arrow-down"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('active-product',$product->id) }}" class="btn btn-success" title="Active Now">
                                                    <i class="fa fa-arrow-up"></i>
                                                </a>
                                            @endif
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
