@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
{{-- <main>
    <h3 class="mt-3">ADD Brand</h3>
<div class="container mt-5">

    <form action="{{route('brands.store')}}" method="post">
        @csrf
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="brand" class="form-label">Brand</label></div>
            <div class="col"><input type="text" value="{{old('brand')}}" name="name" id="" class="form-control"></div>
            @error('name')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror
        </div>
        <button type="submit" class="btn btn-dark">Add</button>
    </form>
</div>
</main> --}}<main>
    <h3>ADD Brand</h3>
    <div class="container mt-5">
        <form action="{{ route('brands.store') }}" method="post">
            @csrf
            <div class="mb-3 row fw-bold">
                <div class="col-2">
                    <label for="names" class="form-label">Brands</label>
                </div>
                <div class="col">
                    <textarea class="form-control" name="names" id="names" rows="3">{{ old('names') }}</textarea>
                    @error('names')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                    @enderror
                    <small id="namesHelp" class="form-text text-muted">Enter multiple categories separated by commas.</small>
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Add</button>
        </form>
    </div>
</main>

@endsection
