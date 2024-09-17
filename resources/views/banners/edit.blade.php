@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
<main>
<h3>Edit Banner</h3>
<div class="container mt-5">
    <form action="{{route('banners.update',$banner->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="title">Title</label></div>
            <div class="col"><input type="text" value="{{$banner->title}}" name="title" id="">
                @error('title')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="description">Description</label></div>
            <div class="col"><input type="text" value="{{$banner->description}}" name="description" id="">
                @error('description')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" value="" name="image" id="" accept="image/jpg,image/png,image/jpeg,image/webp,image/avif">
            @error('image')
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
