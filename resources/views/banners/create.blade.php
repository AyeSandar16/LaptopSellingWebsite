@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
<main>
<h3>ADD Banner</h3>
<div class="container mt-5">
    <form action="{{route('banners.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="description" class="form-label">Title</label></div>
            <div class="col"><input type="text" class="form-control" value="{{old('title')}}" name="title" id="">
                @error('title')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>


        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="description" class="form-label">Description</label></div>
            <div class="col"><input type="text" class="form-control" value="{{old('description')}}" name="description" id="">
                @error('description')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>

        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="image" class="form-label">Image</label></div>
           <div class="col"> <input type="file" class="form-control @error('image') is-invalid
               @enderror" value="{{old('image')}}" name="image" id="" accept="image/jpg,image/png,image/jpeg,image/webp,image/avif">
            @error('image')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror</div>
        </div>



        <button type="submit" class="btn btn-dark">Add</button>
    </form>
</div>
</main>

@endsection
