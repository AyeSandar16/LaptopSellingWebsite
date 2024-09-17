@extends('frontend.layout')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')
<main>

<div class="container mt-2">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    @php
      $banners = DB::table('banners')->get();
    @endphp
    <div class="carousel-inner">
      @foreach ($banners as $index => $banner)
        <div class="carousel-item @if($index == 0) active @endif">
          <img src="../images/{{$banner->image}}" class="d-block w-100" alt="...">
        </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>
</div>

<!-- Start Hot Item -->
@php
$products=DB::table('products')->where('status','active')->get();
@endphp
<div class="product-area most-popular section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title fw-bold m-2">
                    <h2>Hot Item &gt;&gt;&gt;</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                @if($product->condition == 'hot')
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <!-- Start Single Product -->
                        <div class="product-img">
                            <a href="{{route('product-detail',$product->id)}}">
                                @php
                                    $images = explode(',', $product->image);
                                @endphp
                                <img src="../images/{{$images[0]}}" class="rounded-circle m-3" width="300" height="300" alt="Product Image">
                            </a>
                            <div class="card-button d-flex justify-content-start gap-3 mb-4">
                                <form action="{{ route('add-to-wishlist', ['id' => $product->id]) }}" method="POST" class="wishlist-form">
                                    @csrf
                                    <button type="submit" class="btn btn-block wishlist-btn">
                                        <img src="../images/logo/wishlist.png" alt="Add to Wishlist" width="30" height="30">
                                    </button>
                                    <!-- Wishlist Popup -->
                                    <div class="wishlist-popup">
                                        <!-- Wishlist actions or confirmation -->
                                        <p>Added to Wishlist!</p>
                                    </div>
                                </form>
                                {{-- <form action="{{route('add-to-cart',['id'=>$product->id])}}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-outline-dark">Add to Card</button>
                                </form> --}}
                                <a href="{{route('add-to-cart',['id'=>$product->id])}}"><button type="submit" class="btn btn-outline-dark">Add to Card</button></a>
                              </div>
                        </div>
                        <div class="product-content">
                            <h5><a href="{{route('product-detail',['id'=>$product->id])}}">{{$product->model}}</a></h5>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="product-area most-popular section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title fw-bold m-2">
                    <h2>New Item &gt;&gt;&gt;</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                @if($product->condition == 'new')
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <!-- Start Single Product -->
                        <div class="product-img">
                            <a href="{{route('product-detail',$product->id)}}">
                                @php
                                    $images = explode(',', $product->image);
                                @endphp
                                <img src="../images/{{$images[0]}}" class="rounded-circle m-3" width="300" height="300" alt="Product Image">
                            </a>
                            <div class="card-button d-flex justify-content-start gap-3 mb-4">
                                <form action="{{ route('add-to-wishlist', ['id' => $product->id]) }}" method="POST" class="wishlist-form">
                                    @csrf
                                    <button type="submit" class="btn btn-block wishlist-btn">
                                        <img src="../images/logo/wishlist.png" alt="Add to Wishlist" width="30" height="30">
                                    </button>
                                    <!-- Wishlist Popup -->
                                    <div class="wishlist-popup">
                                        <!-- Wishlist actions or confirmation -->
                                        <p>Added to Wishlist!</p>
                                    </div>
                                </form>
                                {{-- <form action="{{route('add-to-cart',['id'=>$product->id])}}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-outline-dark">Add to Card</button>
                                </form> --}}
                                <a href="{{route('add-to-cart',['id'=>$product->id])}}"><button type="submit" class="btn btn-outline-dark">Add to Card</button></a>
                              </div>
                        </div>
                        <div class="product-content">
                            <h5><a href="{{route('product-detail',['id'=>$product->id])}}">{{$product->model}}</a></h5>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<!-- End Most Hot Item -->

<!-- Start Trending Item -->
@php
$products=DB::table('products')->where('status','active')->get();
@endphp
<div class="product-area most-popular section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title fw-bold m-2">
                    <h2>Trending Item &gt;&gt;&gt;</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                @if($product->status == 'active')
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <!-- Start Single Product -->
                        <div class="product-img">
                            <a href="{{route('product-detail',$product->id)}}">
                                @php
                                    $images = explode(',', $product->image);
                                @endphp
                                <img src="../images/{{$images[0]}}" class="rounded-circle m-3" width="300" height="300" alt="Product Image">
                            </a>
                            <div class="card-button d-flex justify-content-start gap-3 mb-4">
                                <form action="{{ route('add-to-wishlist', ['id' => $product->id]) }}" method="POST" class="wishlist-form">
                                    @csrf
                                    <button type="submit" class="btn btn-block wishlist-btn">
                                        <img src="../images/logo/wishlist.png" alt="Add to Wishlist" width="30" height="30">
                                    </button>
                                    <!-- Wishlist Popup -->
                                    <div class="wishlist-popup">
                                        <!-- Wishlist actions or confirmation -->
                                        <p>Added to Wishlist!</p>
                                    </div>
                                </form>
                                {{-- <form action="{{route('add-to-cart',['id' => $product->id])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-dark">Add to Card</button>

                                </form> --}}
                                <a href="{{route('add-to-cart',['id'=>$product->id])}}"><button class="btn btn-outline-dark">Add to Card</button></a>
                             </div>
                        </div>
                        <div class="product-content">
                            <h5><a href="{{route('product-detail',$product->id)}}">{{$product->model}}</a></h5>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<!-- End Most Popular Area -->




</main>
<style>
    .wishlist-form {
      position: relative; /* Ensure position context for absolute positioning */
      display: inline-block; /* Allow the form to size based on content */
  }

  .wishlist-btn {
      background: none;
      border: none;
      cursor: pointer;
  }

  .wishlist-popup {
      display: none;
      position: absolute;
      top: 100%; /* Position below the button */
      left: 50%; /* Center horizontally */
      transform: translateX(-50%); /* Center horizontally */
      padding: 10px;
      background-color: #fff;
      border: 1px solid #811d1d;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
      z-index: 1000; /* Ensure it's above other content */
  }

  .wishlist-popup.active {
      display: block;
  }


  </style>

  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
  <script>
      $(document).ready(function() {
          $('.wishlist-btn').hover(
              function() {
                  $(this).siblings('.wishlist-popup').addClass('active');
              },
              function() {
                  $(this).siblings('.wishlist-popup').removeClass('active');
              }
          );
      });
  </script>
@endsection



