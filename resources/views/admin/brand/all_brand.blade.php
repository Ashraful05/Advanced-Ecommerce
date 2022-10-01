@extends('admin.admin_master')
@section('title','All Brand')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-7">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Brand List <span class="badge badge-pill badge-danger">{{ count($brands) }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Brand Name English</th>
                                    <th>Brand Name Bangla</th>
                                    <th>Brand Name Hindi</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $row=>$brand)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $brand->brand_name_english }}</td>
                                        <td>{{ $brand->brand_name_bangla }}</td>
                                        <td>{{ $brand->brand_name_hindi }}</td>
                                        <td>
                                            <img src="{{ asset($brand->brand_image) }}"  style="width: 40px; height: 40px;" alt="">

                                        </td>
                                        <td>
                                            <a href="{{ route('edit-brand',$brand->id) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('delete-brand',$brand->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
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

            <div class="col-5">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('save-brand') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Name English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="brand_name_english" name="brand_name_english" value="" class="form-control" >
                                                    @error('brand_name_english')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Name Bangla<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="brand_name_bangla" name="brand_name_bangla" value="" class="form-control">
                                                    @error('brand_name_bangla')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Name Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="brand_name_hindi" id="brand_name_hindi" value="" class="form-control">
                                                    @error('brand_name_hindi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Brand Image</h5>
                                                <div class="controls">
                                                    <input type="file" name="brand_image" id="brand_image" value="" class="form-control">
                                                    @error('brand_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
{{--                                        <div class="col-md-6">--}}
{{--                                            <img id="showImage" src="" style="height: 90px; width: 90px;" alt="">--}}
{{--                                        </div>--}}
                                    </div>


                                    <div class="text-xs-right">
                                        <button type="submit" value="submit" class="btn btn-rounded btn-info">Save</button>
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
