@extends('admin.admin_master')
@section('title','Add Blog Post')
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Blog Post</h4>
                    <a href="{{ route('view.blog.post') }}" class="btn btn-success" style="float: right;">View Blog Post</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('save.blog.post') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select Blog Category <span class="text-danger">*</span></h5>
                                                    <select name="blog_category_id" id="select" class="form-control">
                                                        <option value="" selected disabled>Select Your Blog Category</option>
                                                        @foreach($blogPostCategory as $postCategory)
                                                            <option value="{{ $postCategory->id }}">{{ $postCategory->blog_category_name_english }}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('blog_category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Post Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title_english" class="form-control">
                                                    </div>
                                                    @error('post_title_english')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Post Name Bangla <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title_bangla" class="form-control">
                                                    </div>
                                                    @error('post_title_bangla')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Post Description English<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="post_details_english" id="editor1"  class="form-control"></textarea>
                                                    </div>
                                                    @error('post_details_english')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Post Description Bangla<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="post_details_bangla" id="editor2"  class="form-control"></textarea>
                                                    </div>
                                                    @error('post_details_bangla')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Post Main Thumbnail<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="post_image" class="form-control"  onchange="mainThumbUrl(this)">
                                                    </div>
                                                    @error('post_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="" id="mainThumb" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-block btn-rounded btn-info">Add Blog Post</button>
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
        function mainThumbUrl(input)
        {
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload =  function(e)
                {
                    $('#mainThumb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection


