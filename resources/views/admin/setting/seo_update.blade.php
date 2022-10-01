@extends('admin.admin_master')
@section('title','Seo Setting Update')
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Seo Setting Page</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('update.seo.setting',$seo->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Meta Title<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="meta_title" name="meta_title" value="{{ $seo->meta_title }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Meta Author<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_author" id="meta_author" value="{{ $seo->meta_author }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Meta Keyword<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="meta_keyword" name="meta_keyword" value="{{ $seo->meta_keyword }}" class="form-control" >
                                                        <span class="text-danger" ></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Google Analytics<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="google_analytics" id="google_analytics" value="{{ $seo->google_analytics }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Meta Description<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="meta_description" id="" class="form-control">{!! $seo->meta_description !!}</textarea>
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



