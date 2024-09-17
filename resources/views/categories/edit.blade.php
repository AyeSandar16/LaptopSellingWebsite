@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
<main>
<h3>Edit Category</h3>
<div class="container mt-5">
    <form action="{{route('categories.update',['category'=>$category->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category">Category</label>
            <input type="text" value="{{$category->name}}" name="name" id="">
            @error('category')
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
