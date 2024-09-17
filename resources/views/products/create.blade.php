@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')
<main>
<h3>ADD Product</h3>
<div class="container mt-5">
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label class="mb-2 " for="category_id" class="form-label">Category</label></div>
            <div class="col"><select name="category_id" id="" class="form-control">
                @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category['name']}}</option>
                @endforeach
                </select>
                @error('category_id')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
                </div>
        </div>

        <div class="mb-3 row fw-bold">
            <div class="col-2"><label class="mb-2 " for="brand_id" class="form-label">Brand</label></div>
            <div class="col"><select name="brand_id" id="" class="form-control">
                @foreach ($brands as $brand )
                <option value="{{$brand->id}}">{{$brand['name']}}</option>
                @endforeach
                </select>
                @error('brand_id')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
                </div>
        </div>

        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="model" class="form-label">Model</label></div>
            <div class="col"><input type="text" class="form-control" value="{{old('model')}}" name="model" id="">
                @error('model')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="memory" class="form-label">Memory</label></div>
            <div class="col"><input type="text" class="form-control" value="{{old('memory')}}" name="memory" id="">
                @error('memory')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
           <div class="col-2"> <label for="display" class="form-label">Display</label></div>
            <div class="col"><input type="text" class="form-control" value="{{old('display')}}" name="display" id="">
                @error('display')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="cpu" class="form-label">CPU</label></div>
           <div class="col"> <input type="text" class="form-control" value="{{old('cpu')}}" name="cpu" id="">
            @error('cpu')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
           <div class="col-2"> <label for="storage" class="form-label">Stroage</label></div>
           <div class="col"> <input type="text" class="form-control" value="{{old('storage')}}" name="storage" id="">
            @error('storage')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="battery" class="form-label">Battery</label></div>
           <div class="col"> <input type="text" class="form-control" value="{{old('battery')}}" name="battery" id="">
            @error('battery')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="weight" class="form-label">Weight</label></div>
            <div class="col"><input type="text" class="form-control" value="{{old('weight')}}" name="weight" id="">
                @error('weight')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
           <div class="col-2"> <label for="feature" class="form-label">Feature</label></div>
           <div class="col"> <input type="text" class="form-control" value="{{old('feature')}}" name="feature" id="">
            @error('feature')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="discount" class="form-label">Discount</label></div>
           <div class="col">
            <input type="text" class="form-control" value="{{old('discount')}}" name="discount" id="">
            @error('discount')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror
           </div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="price" class="form-label">Price</label></div>
            <div class="col"><input type="text" class="form-control" value="{{old('price')}}" name="price" id="">
                @error('price')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="stock" class="form-label">Stock</label></div>
            <div class="col"><input type="text" class="form-control" min="1" max="20"   name="stock" id="">
                @error('stock')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="m-3 row fw-bold">
            <div class="col-2"><label for="condition" class="form-label">Condition</label></div>
            <div class="col"> <select name="condition" class="form-control" value="{{old('condition')}}">

                <option value="default">Default</option>
                <option value="new">New</option>
                <option value="hot">Hot</option>

            </select>
            @error('condition')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="m-3 row fw-bold">
            <div class="col-2"><label for="status" class="form-label">Status</label></div>
            <div class="col">  <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            @error('status')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        </div>

        <div class="mb-3 row fw-bold">
            <div class="col-2"><label for="warranty" class="form-label">Warranty</label></div>
            <div class="col"><input type="text" class="form-control" value="{{old('warranty')}}" name="warranty" id="">
                @error('warranty')
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


        <button type="submit" class="col-lg-12 col-md-6 btn btn-dark">Add</button>
    </form>
</div>
</main>

@endsection
