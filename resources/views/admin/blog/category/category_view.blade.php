@extends('admin.admin_master')
@section('title','Blog Post Category')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog Post Category List <span class="badge badge-pill badge-danger">{{ count($blogPostCategory) }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Blog Category Name English</th>
                                    <th>Blog Category Name Bangla</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogPostCategory as $row=>$item)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $item->blog_category_name_english }}</td>
                                        <td>{{ $item->blog_category_name_bangla }}</td>
                                        <td>
                                            <a href="{{ route('edit.blogpost.category',$item->id) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('delete.blogpost.category',$item->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
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
                        <h3 class="box-title">Add BlogPostCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('save.blogpost.category') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>BlogPostCategory Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="blog_category_name_english" name="blog_category_name_english" value="" class="form-control" >
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
                                            <input type="text" id="blog_category_name_bangla" name="blog_category_name_bangla" value="" class="form-control">
                                            @error('blog_category_name_bangla')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" value="submit" class="btn btn-rounded btn-info">Save</button>
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


