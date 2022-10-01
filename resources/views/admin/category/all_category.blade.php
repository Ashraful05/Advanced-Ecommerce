@extends('admin.admin_master')
@section('title','All Category')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category List <span class="badge badge-pill badge-danger">{{ count($categories) }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Category Name English</th>
                                    <th>Catetory Name Bangla</th>
                                    <th>Category Icon</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $row=>$category)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $category->category_name_english }}</td>
                                        <td>{{ $category->category_name_bangla }}</td>
                                        <td><span><i class="{{ $category->category_icon }}"></i></span></td>
                                        <td>
                                            <a href="{{ route('edit-category',$category->id) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('delete-category',$category->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
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
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('save-category') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="col-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Category Name English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="category_name_english" name="category_name_english" value="" class="form-control" >
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
                                                    <input type="text" id="category_name_bangla" name="category_name_bangla" value="" class="form-control">
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
                                                    <input type="text" name="category_icon" id="" value="" class="form-control">
                                                    @error('category_icon')
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

