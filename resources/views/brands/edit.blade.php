@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
<main>
<h3>Edit Brand</h3>
<div class="container mt-5">
    <form action="{{route('brands.update',['brand'=>$brand->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category">Brand</label>
            <input type="text" value="{{$brand->name}}" name="name" id="">
            @error('name')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
</div>
</main>

@endsection
