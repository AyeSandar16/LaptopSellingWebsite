@extends('frontend.layout')
@section('content')
@include('flash-messages')
<main class="login-form">
<div class="cotainer  m-auto mt-3">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">Register</div>
    <div class="card-body">

        <form action="{{route('store')}}" method="POST">

    @csrf
    <div class="form-group row mb-4">
        <label for="name" class="col-md-4 col-form-label text-md-
        right">Name</label>
        <div class="col-md-6">
        <input type="text" id="name" class="form-control" name="name"
       autofocus>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="email_address" class="col-md-4 col-form-label text-md-
        right">E-Mail Address</label>
        <div class="col-md-6">
        <input type="text" id="email_address" class="form-control"
        name="email"  autofocus>
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="password" class="col-md-4 col-form-label text-md-
        right">Password</label>
        <div class="col-md-6">
            <input type="password" id="password" class="form-control"
            name="password" autofocus>
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        </div>
    </div>


    <div class="form-group row mb-4">
        <div class="col-md-6 offset-md-4">
        <div class="checkbox">
        <label>
        <input type="checkbox" name="remember"> Remember Me
        </label>
        </div>
        </div>
    </div>
        <div class="col-md-6 offset-md-4 mb-4">
        <button type="submit" class="btn btn-primary">
        Register Now
        </button>
        </div>

        <div class="form-group row text-center">
            <span>Already have a account? | <a href="{{route('auth.login')}}">login now</a></span>
        </div>

    </form>
    </div>
    </div>
    </div>
    </div>
</div>
</main>
@endsection
