@extends('admin.admin_master')
@section('title','Edit Area')
@section('content')

<div class="col-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Area</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{ route('update-area',$area->id) }}" method="post">
                @csrf
                <div class="col-12">
                    <div class="form-group">
                        <h5>Select Division <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="division_id" id="" class="form-control">
                                <option value="" selected disabled>---Select Division---</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}" {{ $division->id==$area->division_id?"Selected":"" }}>{{ $division->division_name }}</option>
                                @endforeach
                            </select>
                            @error('division_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Select District <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="district_id" id="" class="form-control">
                                <option value="" selected disabled>---Select District---</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" {{ $district->id==$area->district_id?"selected":"" }}>{{ $district->district_name }}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Area Name<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="area_name" name="area_name" value="{{ $area->area_name }}" class="form-control" >
                            @error('area_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" value="submit" class="btn btn-rounded btn-info">Update Area</button>
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
