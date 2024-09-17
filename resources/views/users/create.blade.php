@extends('admindash.master')
@section('title', 'Add User')
@section('content')
<main>
    <div class="container mt-5">
        <h1>Add User</h1>
        <form action="{{route('store')}}" method="post">
            @csrf
            <div class="col-md-3 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{old('user')}}" name="name" id="">
                @error('name')
                    <div class="form-error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" value="{{old('user')}}" name="email" id="">
                @error('email')
                    <div class="form-error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="email" class="form-label">Password</label>
                <input type="password" class="form-control"value="{{old('user')}}" name="password" id="">
                @error('password')
                    <div class="form-error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" value="{{old('user')}}" name="role" id="">
                @error('role')
                    <div class="form-error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="col-md-3 mb-3">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</main>
@endsection
