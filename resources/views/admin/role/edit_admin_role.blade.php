@extends('admin.admin_master')
@section('title','Admin User Edit')
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Admin User</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('update.admin.user',$role->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $role->profile_photo_path }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" value="{{ old('name',$role->name) }}"  class="form-control"> <div class="help-block"></div></div>
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Email<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" value="{{ old('email',$role->email) }}" class="form-control"> <div class="help-block"></div></div>
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Admin User Phone <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone" value="{{ old('phone',$role->phone) }}"  class="form-control"> <div class="help-block"></div></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Image Upload<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="image" name="profile_photo_path" class="form-control"> <div class="help-block"></div></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img id="showImage" src="{{ !empty($role->profile_photo_path)?asset($role->profile_photo_path) : url('upload/no_image.png') }}" style="height: 90px; width: 90px;" alt="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" name="brand" id="checkbox_2" value="1" {{ $role->brand==1?'checked':'' }}>
                                                            <label for="checkbox_2">Brands</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="category" id="checkbox_3" value="1" {{ $role->category==1?'checked':'' }}>
                                                            <label for="checkbox_3">Category</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="product" id="checkbox_4" value="1" {{ $role->product==1?'checked':'' }}>
                                                            <label for="checkbox_4">Product</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="slider" id="checkbox_5" value="1"{{$role->slider==1?'checked':''}}>
                                                            <label for="checkbox_5">Slider</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="coupons" id="checkbox_6" value="1" {{ $role->coupons==1?'checked':'' }}>
                                                            <label for="checkbox_6">Coupons</label>
                                                        </fieldset>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" name="shipping" id="checkbox_7"  value="1" {{ $role->shipping==1?'checked':'' }}>
                                                            <label for="checkbox_7">Shipping</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" name="orders" id="checkbox_8" value="1" {{ $role->orders==1?'checked':'' }}>
                                                            <label for="checkbox_8">Orders</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" name="stock" id="checkbox_9" value="1" {{ $role->stock==1?'checked':'' }}>
                                                            <label for="checkbox_9">Stock</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" name="blog" id="checkbox_10" value="1" {{ $role->blog==1?'checked':'' }}>
                                                            <label for="checkbox_10">Blog</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" name="setting" id="checkbox_11" value="1"{{ $role->setting==1?'checked':'' }}>
                                                            <label for="checkbox_11">Setting</label>
                                                        </fieldset>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <fieldset>
                                                    <input type="checkbox" name="returns" id="checkbox_12"  value="1" {{ $role->returns==1?'checked':'' }}>
                                                    <label for="checkbox_12">Returns</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" name="review" id="checkbox_13" value="1" {{ $role->review==1?'checked':'' }}>
                                                    <label for="checkbox_13">Review</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" name="reports" id="checkbox_14" value="1" {{ $role->reports==1?'checked':'' }}>
                                                    <label for="checkbox_14">Reports</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" name="all_user" id="checkbox_15" value="1" {{ $role->all_user==1?'checked':'' }}>
                                                    <label for="checkbox_15">All User</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" name="adminuserrole" id="checkbox_16" value="1" {{ $role->adminuserrole==1?'checked':'' }}>
                                                    <label for="checkbox_16">Admin User Roel</label>
                                                </fieldset>

                                            </div>

                                        </div>

                                        <div class="text-xs-right">
                                            <button type="submit" value="submit" class="btn btn-rounded btn-info btn-block">Add Admin User</button>
                                        </div>
                                    </div>
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
        <!-- /.content -->
    </div>
    <script>
        $(document).ready(function(){
            $('#image').change(function (element){
                var reader = new FileReader();
                reader.onload = function (element){
                    $('#showImage').attr('src',element.target.result);
                }
                reader.readAsDataURL(element.target.files['0']);
            });
        });
    </script>
@endsection




