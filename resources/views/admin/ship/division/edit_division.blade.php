@extends('admin.admin_master')
@section('title','Edit Division')
@section('content')
    <div class="col-12"><br>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Division</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('update-division',$division->id) }}" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <h5>Division Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" id="division_name" name="division_name" value="{{ $division->division_name }}" class="form-control" >
                                @error('division_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <button type="submit" value="submit" class="btn btn-rounded btn-info">Update Division</button>
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
