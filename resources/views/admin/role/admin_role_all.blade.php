@extends('admin.admin_master')
@section('title','Admin Role')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total Admin User</h3>
                        <a href="{{ route('add.admin') }}" class="btn btn-success" style="float: right;">Add Admin User</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Image  </th>
                                    <th>Name  </th>
                                    <th>Email </th>
                                    <th>Access </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($adminUser as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($item->profile_photo_path) }}" style="height: 50px;width: 50px;" alt="">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->brand==1)
                                                <span class="badge badge-pill badge-success">Brand</span>
                                            @else
                                            @endif
                                            @if($item->category==1)
                                                <span class="badge badge-pill badge-dark">Category</span>
                                            @else
                                            @endif
                                            @if($item->product==1)
                                                <span class="badge badge-pill badge-light">Product</span>
                                            @else
                                            @endif
                                            @if($item->slider==1)
                                                <span class="badge badge-pill badge-danger">Slider</span>
                                            @else
                                            @endif
                                            @if($item->coupons==1)
                                                <span class="badge badge-pill badge-gray">Coupons</span>
                                            @else
                                            @endif
                                            @if($item->shipping==1)
                                                <span class="badge badge-pill badge-important">Shipping</span>
                                            @else
                                            @endif
                                            @if($item->orders==1)
                                                <span class="badge badge-pill badge-secondary-light">Orders</span>
                                            @else
                                            @endif
                                            @if($item->stock==1)
                                                <span class="badge badge-pill badge-inverse">Stock</span>
                                            @else
                                            @endif
                                            @if($item->blog==1)
                                                <span class="badge badge-pill badge-success-light">Blog</span>
                                            @else
                                            @endif
                                            @if($item->setting==1)
                                                <span class="badge badge-pill badge-warning">Setting</span>
                                            @else
                                            @endif
                                            @if($item->returns==1)
                                                <span class="badge badge-pill badge-danger-light">Returns</span>
                                            @else
                                            @endif
                                            @if($item->review==1)
                                                <span class="badge badge-pill badge-primary-light">Review</span>
                                            @else
                                            @endif
                                            @if($item->reports==1)
                                                <span class="badge badge-pill badge-success">Reports</span>
                                            @else
                                            @endif
                                            @if($item->all_user==1)
                                                <span class="badge badge-pill badge-danger">All User</span>
                                            @else
                                            @endif
                                            @if($item->admin_user_role==1)
                                                <span class="badge badge-pill badge-gray">AdminUserRole</span>
                                            @else
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('delete.admin.user',$item->id) }}" id="delete" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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


