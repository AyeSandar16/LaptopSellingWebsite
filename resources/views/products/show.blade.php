@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
<main>
    <h3>Detail Product</h3>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-2">
          <div class="card h-75">
            <img src="../images/{{$product['image']}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><b>Model: </b>{{$product['model']}}</h5>
              <p class="card-text"><b>Brand: </b>
                <?php $catchName = App\Models\Brand::find($product->brand_id);?>
                {{$catchName->name}}
                </p>
              <p class="card-text"><b>Category: </b>
                <?php $catName = App\Models\Category::find($product->category_id);?>
                {{$catName->name}}</p>
              <p class="card-text"><b> Price: </b>{{$product['price']}}</p>
            </div>
          </div>
    </div>
</main>

@endsection
