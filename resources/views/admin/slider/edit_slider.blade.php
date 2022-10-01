@extends('admin.admin_master')
@section('title','Edit Slider')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('update-slider',$editSlider->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_img" value="{{ $editSlider->slider_image }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Slider Title<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="title" name="title" value="{{ $editSlider->title }}" class="form-control" >
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
                                                    <textarea name="description" id="" class="form-control">{{ $editSlider->description }}</textarea>
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
