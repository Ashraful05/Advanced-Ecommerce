@extends('admin.admin_master')
@section('title','All SubCategory')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">SubCategory List <span class="badge badge-pill badge-danger">{{ count($subCategories) }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Category Name</th>
                                    <th>SubCategory Name English</th>
                                    <th>SubCategory Name Bangla</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subCategories as $row=>$subCategory)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $subCategory['category']['category_name_english'] }}</td>
                                        <td>{{ $subCategory->subcategory_name_english }}</td>
                                        <td>{{ $subCategory->subcategory_name_bangla }}</td>
                                        <td width="30%">
                                            <a href="{{ route('edit-subcategory',$subCategory->id) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('delete-subcategory',$subCategory->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
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
                        <h3 class="box-title">Add SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('save-subcategory') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                    <select name="category_id" id="select" class="form-control">
                                        <option value="" selected disabled>Select Your Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_english }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                    <div class="form-group">
                                        <h5>SubCategory Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subcategory_name_english" name="subcategory_name_english" value="" class="form-control" >
                                            @error('subcategory_name_english')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>SubCategory Name Bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subcategory_name_bangla" name="subcategory_name_bangla" value="" class="form-control">
                                            @error('subcategory_name_bangla')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
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

