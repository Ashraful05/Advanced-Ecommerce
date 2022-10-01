@extends('admin.admin_master')
@section('title','Edit District')
@section('content')
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add District</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('update-district',$district->id) }}" method="post">
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <h5>Select Division <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="division_id" id="" class="form-control">
                                    <option value="" selected disabled>---Select Division---</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}" {{ $division->id == $district->division_id ? "selected" : "" }}>{{ $division->division_name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>District Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" id="district_name" name="district_name" value="{{ $district->district_name }}" class="form-control" >
                                @error('district_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <button type="submit" value="submit" class="btn btn-rounded btn-info">Add New</button>
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
