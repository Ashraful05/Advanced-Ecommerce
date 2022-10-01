@extends('admin.admin_master')
@section('title','All User')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total User <span class="badge badge-pill badge-danger">{{ count($users) }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <img src="{{ (!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.png')}}" style="width: 70px;height: 40px;" alt="">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if($user->userOnline())
                                                <span class="badge badge-pill badge-success">Active Now</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">
                                                   {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit-brand',$user->id) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                                            <a href="{{ route('delete-brand',$user->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></a>
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
    <script>
        $(document).ready(function(){
            $('#brand_image').change(function (element){
                var reader = new FileReader();
                reader.onload = function (element){
                    $('#showImage').attr('src',element.target.result);
                }
                reader.readAsDataURL(element.target.files['0']);
            });
        });
    </script>
@endsection
