@extends('frontend.layout')
@section('title','Next Gen Laptops || User Dashboard')
@section('content')
@include('flash-messages')
<div class="m-4 p-5 bg-secondary ">
    <div class="container w-75">
        <h4 class="text-center pb-3">User Dashboard</h4>
        <div class="row">
            <div class="col-3">
                <div class="row"><a href="{{route('user-profile')}}" class="text-dark text-decoration-none" >Profile Update</a></div>
                <div class="row"><a href="{{route('user.order.index')}}"  class="text-dark text-decoration-none">Order</a></div>
                 <div class="row">
                    <a href="{{route('user.change.password.form')}}"  class=" text-dark text-decoration-none">Update password</a>
                </div>
             </div>
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Change Password</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('change.password') }}">
                                        @csrf

                                        <div class="form-group row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                                @error('current_password')
                                                <div class="form-error">
                                                    {{$message}}
                                                </div>

                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row  mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                                            <div class="col-md-6">
                                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                                @error('new_password')
                                                <div class="form-error">
                                                    {{$message}}
                                                </div>

                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row  mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                                @error('new_confirm_password')
                                                <div class="form-error">
                                                    {{$message}}
                                                </div>

                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Update Password
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div></div></div></div>
@endsection
