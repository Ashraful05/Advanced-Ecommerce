@extends('frontend.frontend_master')
@section('title','User Profile')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi....</span><strong>
                                {{ Auth::User()->name }}
                            </strong> Update Your Profile </h3><br>
                        <div class="card-body">
                            <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">User Name</label>
                                    <input type="text"  name="name" value="{{ $user->name }}" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone Number</label>
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">User Image</label>
                                    <input type="file" name="profile_photo_path"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
