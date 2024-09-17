@extends('admindash.master')
@section('title', 'Show Users')
@section('content')
<main>
    <h1>Detail Users</h1>

    <div class="card" style="width: 18rem;">

        <div class="card-body">

            <p class="card-text"><b>Name:</b> {{$user['name']}} </p>
            <p class="card-text"><b>Email:</b>{{$user['email']}} </p>

            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
</div>
</main>
@endsection
