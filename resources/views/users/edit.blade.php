@extends('admindash.master')
@section('title', 'Edit User')
@section('content')
<main>
    <div class="container mt-5">
        <h1>Edit User</h1>
        <form action="{{route('users.update',['user'=>$user->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-3 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="">
                @error('name')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{$user->email}}" name="email" id="">
                @error('email')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
                @error('current_password')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- <div class="col-md-3 mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" value="{{$user->role}}" name="role" id="role">
                @error('role')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div> --}}

            <div class="col-md-3 mb-3">
                <button type="submit" class="btn btn-primary ">Update</button>
            </div>
        </form>
    </div>
</main>
@endsection
