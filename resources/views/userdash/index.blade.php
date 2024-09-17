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

            </div>
        </div>
    </div>
</div>
@endsection
