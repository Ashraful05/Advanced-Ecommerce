@extends('admin.admin_master')
@section('title','Site Setting Update')
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Site Setting Page</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('update.site.setting',$setting->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Site Logo<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="logo" name="logo" class="form-control" >
                                                        <span class="text-danger" ></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <img id="showImage" src="{{ asset( $setting->logo) }}" style="height: 90px; width: 90px;" alt="">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Phone One<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="password" name="phone_one" value="{{ $setting->phone_one }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Phone Two<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_two" id="phone_two" value="{{ $setting->phone_two }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Email<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" id="email" name="email" value="{{ $setting->email }}" class="form-control" >
                                                        <span class="text-danger" ></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Company name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="company_name" name="company_name" value="{{ $setting->company_name }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Company Address<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_address" id="company_address" value="{{ $setting->company_address }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Facebook<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="facebook" name="facebook" value="{{ $setting->facebook }}" class="form-control" >
                                                        <span class="text-danger" ></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Twitter<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="twitter" name="twitter" value="{{ $setting->twitter }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Linkedin<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="linkedin" id="linkedin" value="{{ $setting->linkedin }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Youtube<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="youtube" id="youtube" value="{{ $setting->youtube }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <button type="submit" value="submit" class="btn btn-rounded btn-info">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <script>
        $(document).ready(function(){
            $('#logo').change(function (element){
                var reader = new FileReader();
                reader.onload = function (element){
                    $('#showImage').attr('src',element.target.result);
                }
                reader.readAsDataURL(element.target.files['0']);
            });
        });
    </script>
@endsection



