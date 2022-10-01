@extends('frontend.frontend_master')
@section('title','User Password Change')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
               @include('frontend.common.user_sidebar')
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><strong>Change Password </strong> </h3>
                        <hr>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="{{ route('user-password-update') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">User Name</label>
                                    <input type="text"  name="name" value="{{ $user->name }}" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone Number</label>
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="Password">Current Password</label>
                                    <input type="password" id="current_password" name="old_password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="Password">New Password</label>
                                    <input type="password" id="password" name="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="Password">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control">
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

