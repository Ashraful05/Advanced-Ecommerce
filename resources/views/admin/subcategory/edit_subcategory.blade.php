@extends('admin.admin_master')
@section('title','Edit SubCategory')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('update-subcategory') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $editSubCategory->id }}">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                    <select name="category_id" id="select" class="form-control">
                                        <option value="" selected disabled>Select Your Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id==$editSubCategory->category_id ? 'selected':'' }}>{{ $category->category_name_english }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>SubCategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_english" value="{{ $editSubCategory->subcategory_name_english }}" class="form-control" >
                                        @error('subcategory_name_english')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>SubCategory Name Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_bangla" value="{{ $editSubCategory->subcategory_name_bangla }}" class="form-control">
                                        @error('subcategory_name_bangla')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

