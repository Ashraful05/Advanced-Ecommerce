@extends('admin.admin_master')
@section('title','Edit Product')
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('update-product',$product->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select Brand <span class="text-danger">*</span></h5>
                                                    <select name="brand_id" id="select" class="form-control">
                                                        <option value="" selected disabled>Select Your Brand</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" {{ $brand->id==$product->brand_id ? 'selected':'' }}>{{ $brand->brand_name_english }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                                    <select name="category_id" id="select" class="form-control">
                                                        <option value="" selected disabled>Select Your Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $category->id==$product->category_id ? 'selected':'' }}>{{ $category->category_name_english }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select SubCategory <span class="text-danger">*</span></h5>
                                                    <select name="subcategory_id" id="select" class="form-control">
                                                        <option value="" selected disabled>Select Your SubCategory</option>
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id==$product->subcategory_id ?'selected':'' }}>{{ $subcategory->subcategory_name_english }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select Sub SubCategory <span class="text-danger">*</span></h5>
                                                    <select name="sub_subcategory_id" id="select" class="form-control">
                                                        <option value="" selected disabled>Select Your SubCategory</option>
                                                        @foreach($subsubcategories as $subsubcategory)
                                                            <option value="{{ $subsubcategory->id }}" {{ $subsubcategory->id==$product->sub_subcategory_id ?'selected':'' }}>{{ $subsubcategory->subsubcategory_name_english }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('sub_subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_english" value="{{ $product->product_name_english }}" class="form-control">
                                                    </div>
                                                    @error('product_name_english')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name Bangla <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_bangla" value="{{ $product->product_name_bangla }}" class="form-control">
                                                    </div>
                                                    @error('product_name_bangla')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" value="{{ $product->product_code }}" class="form-control" required>
                                                    </div>
                                                    @error('product_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_quantity" value="{{ $product->product_quantity }}" class="form-control" required>
                                                    </div>
                                                    @error('product_quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tag_english"  class="form-control" value="{{ $product->product_tag_english }}" data-role="tagsinput" required>
                                                    </div>
                                                    @error('product_tag_english')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags Bangla <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tag_bangla" class="form-control" value="{{ $product->product_tag_bangla }}" data-role="tagsinput" required>
                                                    </div>
                                                    @error('product_tag_bangla')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_english" class="form-control" value="{{ $product->product_size_english }}" data-role="tagsinput" required>
                                                    </div>
                                                    @error('product_size_english')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size Bangla <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_bangla" class="form-control" value="{{ $product->product_size_bangla }}" data-role="tagsinput" required>
                                                    </div>
                                                    @error('product_size_bangla')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_english" class="form-control" value="{{ $product->product_color_english }}" data-role="tagsinput" required>
                                                    </div>
                                                    @error('product_color_english')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color Bangla <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_bangla" class="form-control" value="{{ $product->product_color_bangla }}" data-role="tagsinput" required>
                                                    </div>
                                                    @error('product_color_bangla')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control"  required>
                                                    </div>
                                                    @error('selling_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" value="{{ $product->discount_price }}" class="form-control"  required>
                                                    </div>
                                                    @error('discount_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Short Description English<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_description_english" id="" class="form-control">{{ $product->short_description_english }}</textarea>
                                                    </div>
                                                    @error('short_description_english')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Short Description Bangla<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_description_bangla" id=""  class="form-control">{{ $product->short_description_bangla }}</textarea>
                                                    </div>
                                                    @error('short_description_bangla')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Long Description English<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="long_description_english" id="editor1"  class="form-control">{{ $product->long_description_english }}</textarea>
                                                    </div>
                                                    @error('long_description_english')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Long Description Bangla<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="long_description_bangla" id="editor2"  class="form-control">{{ $product->long_description_bangla }}</textarea>
                                                    </div>
                                                    @error('long_description_bangla')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" name="hot_deals" id="checkbox_2"  value="1" {{ $product->hot_deals==1?'checked':'' }}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                @error('hot_deals')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <fieldset>
                                                    <input type="checkbox" name="featured" id="checkbox_3" value="1" {{ $product->featured==1?'checked':'' }}>
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                                @error('featured')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" name="special_offer" id="checkbox_4"  value="1" {{ $product->special_offer==1?'checked':'' }}>
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                @error('special_offer')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <fieldset>
                                                    <input type="checkbox" name="special_deals" id="checkbox_5" value="1" {{ $product->special_deals==1?'checked':'' }}>
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                                @error('special_deals')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Update Product</button>
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
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                        </div>
                        <form action="{{ route('update-product-image') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach($multiImages as $multiImage)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($multiImage->photo_name) }}" class="card-img-top" style="height: 130px;width: 260px;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('product-multiimage-delete',$multiImage->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            </h5>
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span> </label>
                                                    <input class="form-control" type="file" name="multi_image[ {{ $multiImage->id }} ]">
                                                </div>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-block btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                        </div>
                        <form action="{{ route('update-product-thumbnail-image',$product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_img" value="{{ $product->product_thumbnail }}">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" style="height: 130px;width: 260px;">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span> </label>
                                                    <input type="file" name="product_thumbnail" class="form-control"  onchange="mainThumbUrl(this)">
                                                    <img src="" id="mainThumb" alt="">
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-block btn-rounded btn-primary mb-5" value="Update Thumbnail Image">
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

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
                            $('select[name="sub_subcategory_id"]').html('');
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
            $('select[name="subcategory_id"]').on('change',function(){
                var subcategory_id = $(this).val();
                if(subcategory_id){
                    $.ajax({
                        url:"{{ url('http://localhost/Advanced-Ecommerce/public/category/sub-subcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"JSON",
                        success:function(data){
                            var d = $('select[name="sub_subcategory_id"]').empty();
                            $.each(data,function (key,value){
                                $('select[name="sub_subcategory_id"]').append('<option value="'+ value.id +'">'+value.subsubcategory_name_english+'</option>');
                            })

                        },
                    });
                }else{
                    alert('danger');
                }
            });
        });
    </script>
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
    <script>
        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>
@endsection


