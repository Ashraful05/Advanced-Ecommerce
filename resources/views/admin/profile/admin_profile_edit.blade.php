@extends('admin.admin_master')
@section('title','Admin Profile Edit')
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" value="{{ $editData->name }}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email Field <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" value="{{ $editData->email }}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Image Upload<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="image" name="profile_photo_path" class="form-control"> <div class="help-block"></div></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img id="showImage" src="{{ !empty($editData->profile_photo_path)?url('upload/admin_images/'.$editData->profile_photo_path):url('upload/no_image.png') }}" style="height: 90px; width: 90px;" alt="">
                                            </div>
                                        </div>


                                        <div class="text-xs-right">
                                            <button type="submit" value="submit" class="btn btn-rounded btn-info">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <script>
        $(document).ready(function(){
            $('#image').change(function (element){
                var reader = new FileReader();
                reader.onload = function (element){
                    $('#showImage').attr('src',element.target.result);
                }
                reader.readAsDataURL(element.target.files['0']);
            });
        });
    </script>
@endsection



