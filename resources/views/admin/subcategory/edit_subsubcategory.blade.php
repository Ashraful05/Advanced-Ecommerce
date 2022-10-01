@extends('admin.admin_master')
@section('title','All SubSubCategory')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Sub SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('update-sub-subcategory',$editsubSubCategory->id) }}" method="post">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                    <select name="category_id" id="select" class="form-control">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id==$editsubSubCategory->category_id ? 'selected':'' }}>{{ $category->category_name_english }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Select SubCategory <span class="text-danger">*</span></h5>
                                    <select name="subcategory_id" id="select" class="form-control">
                                        <option value="" selected disabled>Select SubCategory</option>
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}" {{ $subCategory->id==$editsubSubCategory->subcategory_id ? 'selected':''}}>{{ $subCategory->subcategory_name_english }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Sub SubCategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_english" value="{{ $editsubSubCategory->subsubcategory_name_english }}" class="form-control" >
                                        @error('subsubcategory_name_english')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Sub SubCategory Name Bangla<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_bangla" value="{{ $editsubSubCategory->subsubcategory_name_bangla }}" class="form-control">
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


