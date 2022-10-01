@extends('admin.admin_master')
@section('title','Manage Slider')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Slider Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $row=>$slider)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>
                                            <img src="{{ asset($slider->slider_image) }}"  style="width: 70px; height: 40px;" alt="">
                                        </td>
                                        <td>
                                            @if($slider->title == Null)
                                                <span class="badge badge-pill badge-danger">No Title</span>
                                            @else
                                                <span class="badge badge-pill badge-success">{{ $slider->title }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $slider->description }}</td>
                                        <td>
                                            @if($slider->status==1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit-slider',$slider->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil" ></i></a>
                                            <a href="{{ route('delete-slider',$slider->id) }}" id="delete" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash" ></i></a>
                                            @if($slider->status==1)
                                                <a href="{{ route('inactive-slider',$slider->id) }}" class="btn btn-danger btn-sm" title="Inactive Now">
                                                    <i class="fa fa-arrow-down"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('active-slider',$slider->id) }}" class="btn btn-success btn-sm" title="Active Now">
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

            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('save-slider') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Slider Title<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="title" name="title" value="" class="form-control" >
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Slider Image</h5>
                                                <div class="controls">
                                                    <input type="file" name="slider_image" id="slider_image" value="" class="form-control">
                                                    @error('slider_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Slider Description<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="description" id="" class="form-control"></textarea>
                                                    @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <button type="submit" value="submit" class="btn btn-rounded btn-info">Save Slider</button>
                                    </div>
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
    <script>
        $(document).ready(function(){
            $('#brand_image').change(function (element){
                var reader = new FileReader();
                reader.onload = function (element){
                    $('#showImage').attr('src',element.target.result);
                }
                reader.readAsDataURL(element.target.files['0']);
            });
        });
    </script>
@endsection
