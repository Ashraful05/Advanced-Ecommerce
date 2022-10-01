@extends('admin.admin_master')
@section('title','View Blog Post')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog Post List <span class="badge badge-pill badge-danger">{{ count($blogPostList) }}</span></h3>
                        <a href="{{ route('add.blog.post') }}" class="btn btn-success btn-round" style="float: right">Add Blog Post</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Post Category Name</th>
                                    <th>Blog Title English</th>
                                    <th>Blog Title Bangla</th>
                                    <th>Blog Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogPostList as $row=>$item)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $item->blogCategory->blog_category_name_english }}</td>
                                        <td>{{ $item->post_title_english }}</td>
                                        <td>{{ $item->post_title_bangla }}</td>
                                        <td>
                                            <img src="{{ asset($item->post_image) }}" style="width: 50px;height: 50px;" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.blog.post',$item->id) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('delete.blog.post',$item->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
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

        </div>
    </section>
@endsection



