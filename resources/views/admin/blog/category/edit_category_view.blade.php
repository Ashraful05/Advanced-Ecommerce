@extends('admin.admin_master')
@section('title','Blog Post Category')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit BlogPostCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('update.blogpost.category',$blogPostCategory->id) }}" method="post">
                            @csrf
                            <div class="col-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>BlogPostCategory Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="blog_category_name_english" name="blog_category_name_english" value="{{ $blogPostCategory->blog_category_name_english }}" class="form-control" >
                                            @error('blog_category_name_english')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>BlogPostCategory Name Bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="blog_category_name_bangla" name="blog_category_name_bangla" value="{{ $blogPostCategory->blog_category_name_bangla }}" class="form-control">
                                            @error('blog_category_name_bangla')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" value="submit" class="btn btn-rounded btn-info">Update</button>
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



