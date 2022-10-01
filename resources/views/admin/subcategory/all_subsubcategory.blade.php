@extends('admin.admin_master')
@section('title','All SubSubCategory')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub->SubCategory List <span class="badge badge-pill badge-danger">{{ count($subSubCategories) }}</span></h3>
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
                                    <th>Sub SubCategory Name English</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subSubCategories as $row=>$subSubCategory)
                                    <tr>
                                        <td>{{ ++$row }}</td>
                                        <td>{{ $subSubCategory['category']['category_name_english'] }}</td>
                                        <td>{{ $subSubCategory['subcategory']['subcategory_name_english'] }}</td>
                                        <td>{{ $subSubCategory->subsubcategory_name_english }}</td>
                                        <td width="30%">
                                            <a href="{{ route('edit-sub-subcategory',$subSubCategory->id) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('delete-sub-subcategory',$subSubCategory->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
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
                        <h3 class="box-title">Add Sub SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('save-sub-subcategory') }}" method="post">
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
                                    <h5>Select SubCategory <span class="text-danger">*</span></h5>
                                    <select name="subcategory_id" id="select" class="form-control">
                                        <option value="" selected disabled>Select Your SubCategory</option>

                                    </select>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Sub SubCategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="subsubcategory_name_english" name="subsubcategory_name_english" value="" class="form-control" >
                                        @error('subsubcategory_name_english')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Sub SubCategory Name Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="subsubcategory_name_bangla" name="subsubcategory_name_bangla" value="" class="form-control">
                                        @error('subsubcategory_name_bangla')
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

    <script>
        $(document).ready(function(){
           $('select[name="category_id"]').on('change',function(){
                var category_id = $(this).val();
                if(category_id){
                    $.ajax({
                       url:"{{ url('http://localhost/Advanced-Ecommerce/public/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"JSON",
                        success:function(data){
                           var d = $('select[name="subcategory_id"]').empty();
                           $.each(data,function (key,value){
                               $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+value.subcategory_name_english+'</option>');
                           })

                        },
                    });
                }else{
                    alert('danger');
                }
           });
        });
    </script>
@endsection

