@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')
<main>
<h3>Edit Product</h3>
<div class="container mt-5">
    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3 row fw-bold">
           <div class="col-1 col-md-2"><label class="mb-2 col-form-label" for="category_id" >Category</label></div>
           <div class="col"><select name="category_id" class="form-control">
            @foreach ($categories as $category )
            <option value="{{$category->id}}">{{$category['name']}}</option>
            @endforeach
            </select></div>
        </div>

        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label class="mb-2 col-form-label" for="brand_id" >Brand</label></div>
            <div class="col"><select name="brand_id" class="form-control">
                @foreach ($brands as $brand )
                <option value="{{$brand->id}}">{{$brand['name']}}</option>
                @endforeach
                </select></div>
         </div>


         <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="model" class="mb-2 col-form-label">Model</label></div>
            <div class="col"><input type="text" class="form-control" value="{{$product->model}}" name="model" id="">
                @error('model')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="memory" class="mb-2 col-form-label">Memory</label></div>
            <div class="col"><input type="text" class="form-control" value="{{$product->memory}}" name="memory" id="">
                @error('memory')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
           <div class="col-1 col-md-2"> <label for="display" class="col-form-label">Display</label></div>
            <div class="col"><input type="text" class="form-control" value="{{$product->display}}" name="display" id="">
                @error('display')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="cpu" class="col-form-label">CPU</label></div>
           <div class="col"> <input type="text" class="form-control" value="{{$product->cpu}}" name="cpu" id="">
            @error('cpu')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
           <div class="col-1 col-md-2"> <label for="storage" class="col-form-label">Stroage</label></div>
           <div class="col"> <input type="text" class="form-control" value="{{$product->storage}}" name="storage" id="">
            @error('storage')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="battery" class="col-form-label">Battery</label></div>
           <div class="col"> <input type="text" class="form-control" value="{{$product->battery}}" name="battery" id="">
            @error('battery')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="weight" class="col-form-label">Weight</label></div>
            <div class="col"><input type="text" class="form-control" value="{{$product->weight}}" name="weight" id="">
                @error('weight')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
           <div class="col-1 col-md-2"> <label for="feature" class="col-form-label">Feature</label></div>
           <div class="col"> <input type="text" class="form-control" value="{{$product->feature}}" name="feature" id="">
            @error('feature')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"> <label for="warranty" class="col-form-label">Warranty</label></div>
            <div class="col"> <input type="text" class="form-control" value="{{$product->warranty}}" name="warranty" id="">
             @error('warranty')
             <div class="form-error">
                 {{$message}}
             </div>

             @enderror</div>
         </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="discount" class="col-form-label">Discount</label></div>
           <div class="col">
            <input type="text" class="form-control" value="{{$product->discount}}" name="discount" id="">
            @error('discount')
            <div class="form-error">
                {{$message}}
            </div>

            @enderror
           </div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="price" class="col-form-label">Price</label></div>
            <div class="col"><input type="text" class="form-control" value="{{$product->price}}" name="price" id="">
                @error('price')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="stock" class="col-form-label">Stock</label></div>
            <div class="col"><input type="text" class="form-control" min="1" max="20" value="{{$product->stock}}" name="stock" id="">
                @error('stock')
                <div class="form-error">
                    {{$message}}
                </div>

                @enderror</div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="condition" class="col-form-label">Condition</label></div>
            <div class="col">
                <select name="condition" class="form-control">
                    <option value="default" {{(($product->condition=='default')? 'selected':'')}}>Default</option>
                    <option value="new" {{(($product->condition=='new')? 'selected':'')}}>New</option>
                    <option value="hot" {{(($product->condition=='hot')? 'selected':'')}}>Hot</option>
                </select>
                @error('condition')
                <span class="text-danger">{{$message}}</span>
                @enderror
          </div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="status" class="col-form-label">Status <span class="text-danger">*</span></label></div>
            <div class="col">
                <select name="status" class="form-control" >
                    <option value="active" {{(($product->status=='active')? 'selected' : '')}}>Active</option>
                    <option value="inactive" {{(($product->status=='inactive')? 'selected' : '')}}>Inactive</option>
                </select>
                @error('status')
                <span class="text-danger">{{$message}}</span>
                @enderror
          </div>
        </div>
        <div class="mb-3 row fw-bold">
            <div class="col-1 col-md-2"><label for="image" class="col-form-label">Image</label></div>
            <div class="col">
                <input type="file" class="form-control @error('image') is-invalid @enderror"  name="image" id="" accept="image/jpg,image/png,image/jpeg,image/webp,image/avif">
                @error('image')
                    <div class="form-error">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-dark">Update</button>
    </form>
</div>
</main>

@endsection
