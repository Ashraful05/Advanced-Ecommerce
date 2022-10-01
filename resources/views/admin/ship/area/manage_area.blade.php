@extends('admin.admin_master')
@section('title','District List')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Area List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Division Name</th>
                                    <th>District Name</th>
                                    <th>Area Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($areas as $row => $area)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $area['division']['division_name'] }}</td>
                                        <td>{{ $area['district']['district_name'] }}</td>
                                        <td>{{ $area->area_name }}</td>
                                        <td>
                                            <a href="{{ route('edit-area',$area->id) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('delete-area',$area->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
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
                        <h3 class="box-title">Add Area</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('save-area') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Select Division <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" id="" class="form-control">
                                            <option value="" selected disabled>---Select Division---</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
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
                                                <option value="{{ $district->id }}">{{ $district->district_name }}</option>
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
                                        <input type="text" id="area_name" name="area_name" value="" class="form-control" >
                                        @error('area_name')
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
        </div>
    </section>
@endsection




