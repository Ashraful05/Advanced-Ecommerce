@extends('admin.admin_master')
@section('title','Coupon List')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Coupon List <span class="badge badge-pill badge-danger">{{ count($coupons) }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Coupon Name</th>
                                    <th>Coupon Discount</th>
                                    <th>Coupon Validity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coupons as $row => $coupon)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $coupon->coupon_name }}</td>
                                        <td>{{ $coupon->coupon_discount }}%</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($coupon->coupon_validity)->format('D, d F Y') }}
                                        </td>
                                        <td>
                                            @if($coupon->coupon_validity >= \Carbon\Carbon::now()->format('Y-m-d'))
                                                <span class="badge badge-pill badge-success">Valid</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Invalid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit-coupon',$coupon->id) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('delete-coupon',$coupon->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
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

            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Coupon</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('save-coupon') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Coupon Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="coupon_name" name="coupon_name" value="" class="form-control" >
                                            @error('coupon_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Coupon Discount( % )<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="coupon_discount" name="coupon_discount" class="form-control">
                                            @error('coupon_discount')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Coupon Validity Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="coupon_validity" class="form-control" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                            @error('coupon_validity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" value="submit" class="btn btn-rounded btn-info">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection

