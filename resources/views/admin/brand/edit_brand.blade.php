@extends('admin.admin_master')
@section('title','Edit Brand')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('update-brand',$brand->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $brand->id }}">
                            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Name English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="brand_name_english" name="brand_name_english" value="{{ $brand->brand_name_english }}" class="form-control" >
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
                                                    <input type="text" id="brand_name_bangla" name="brand_name_bangla" value="{{ $brand->brand_name_bangla }}" class="form-control">
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
                                                    <input type="text" name="brand_name_hindi" id="brand_name_hindi" value="{{ $brand['brand_name_hindi'] }}" class="form-control">
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
                                        <div class="col-md-6">
                                            <img id="showImage" src="{{ asset($brand->brand_image) }}" style="height: 90px; width: 90px;" alt="">
                                        </div>
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
