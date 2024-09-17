
@extends('admindash.master')
@section('title', 'Next Gen Laptops')
@section('content')
@include('flash-messages')

<div class="card">
  <h5 class="card-header">Message</h5>
  <div class="card-body">
    @if($message)

        <div class="py-4">From <br>
           Name :{{$message->name}}<br>
           Email :{{$message->email}}<br>
           Phone :{{$message->phone}}
        </div>
        <hr/>
  <h5 class="text-center" style="text-decoration:underline"><strong>Message :</strong> {{$message->message}}</h5>
        <p class="py-5">{{$message->message}}</p>

    @endif

  </div>
</div>
@endsection
