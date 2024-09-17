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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h4 class=" font-weight-bold">Profile</h4>
                      {{-- <ul class="breadcrumbs">
                          <li><a href="" style="color:#999">Dashboard</a></li>
                          <li><a href="" class="active text-primary">Profile Page</a></li>
                      </ul> --}}
                    </div>
                    <div class="card-body">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="card">
                                     <div class="card-body mt-4 ml-2">
                                       <h5 class="card-title text-left"><small><i class="fas fa-user"></i> {{$profile->name}}</small></h5>
                                       <p class="card-text text-left"><small><i class="fas fa-envelope"></i> {{$profile->email}}</small></p>
                                       <p class="card-text text-left"><small class="text-muted"><i class="fas fa-hammer"></i> {{$profile->role}}</small></p>
                                     </div>
                                   </div>
                             </div>
                             <div class="col-md-8">
                                 <form class="border px-4 pt-2 pb-3" method="POST" action="{{route('user-profile-update',$profile->id)}}">
                                     @csrf
                                     <div class="form-group">
                                         <label for="inputTitle" class="col-form-label">Name</label>
                                       <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$profile->name}}" class="form-control">
                                       @error('name')
                                       <span class="text-danger">{{$message}}</span>
                                       @enderror
                                       </div>

                                       <div class="form-group mb-3">
                                           <label for="email" class="col-form-label">Email</label>
                                         <input id="email" type="email" name="email" placeholder="Enter email"  value="{{$profile->email}}" class="form-control">
                                         @error('email')
                                         <span class="text-danger">{{$message}}</span>
                                         @enderror
                                       </div>
                                         <button type="submit" class="btn btn-success btn-sm">Update</button>
                                 </form>
                             </div>
                         </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>



@endsection

