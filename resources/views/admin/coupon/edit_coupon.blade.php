@extends('admin.admin_master')
@section('title','Edit Coupon')
@section('content')
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Coupon</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('update-coupon',$coupon->id) }}" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Coupon Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" id="coupon_name" name="coupon_name" value="{{ $coupon->coupon_name }}" class="form-control" >
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
                                    <input type="text" id="coupon_discount" name="coupon_discount" value="{{ $coupon->coupon_discount }}" class="form-control">
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
                                    <input type="date" name="coupon_validity" value="{{ $coupon->coupon_validity }}" class="form-control" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
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
@endsection
