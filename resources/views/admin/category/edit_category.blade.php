@extends('admin.admin_master')
@section('title','Edit Category')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('update-category',$editCategory->id) }}" method="post">
                            @csrf
{{--                            <input type="hidden" name="id" value="{{ $editCategory->id }}">--}}
                            <div class="col-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Category Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_english" value="{{ $editCategory->category_name_english }}" class="form-control" >
                                            @error('category_name_english')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Category Name Bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_bangla" value="{{ $editCategory->category_name_bangla }}" class="form-control">
                                            @error('category_name_bangla')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Cateogry Icon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" value="{{ $editCategory->category_icon }}" class="form-control">
                                            @error('category_icon')
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

