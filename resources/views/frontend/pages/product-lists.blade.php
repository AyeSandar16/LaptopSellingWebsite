@extends('frontend.layout')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')
@if($products)

<div class="container mt-5">
    <div class="row mb-4">

        @foreach ($products as $key=>$product )

        <div class="col-lg-3 col-md-5 mb-5 col-sm-6 ">
            <div class="card ">
                <div class="card-body position-relative">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="..." height="300px">
                   <div style="height: 230px">
                        <a href="{{ route('product-detail', $product->id) }}">
                            <h6 class="card-title"><b>Model: </b>{{ $product->model }}</h6>
                        </a>

                        {{-- <p class="card-text"><b>Brand: </b>{{ $product->brand->name }}</p> --}}
                        <p class="card-text"><b>Brand: </b>
                            <?php $catName = App\Models\Brand::find($product->brand_id);?>
                            {{$catName->name}}
                            </p>
                        <p class="card-text"><b>Category: </b>
                            <?php $catName = App\Models\Category::find($product->category_id);?>
                            {{$catName->name}}
                        </p>
                        @if ($product->discount > 0)
                            <span class="position-absolute top-0 start-0  badge  bg-danger">
                                <span>{{ $product->discount }}%</span>
                                <span class="visually-hidden">unread messages</span>
                            </span>

                            <p class="card-text">
                                <span class="product-price">
                                    <p class="card-text text-danger"><b>Discount: </b>{{ $product->discount }}%</p>
                                    <b>Price: </b>
                                    <del><span class="old  text-">${{ number_format($product->price, 2) }}</span></del>
                                    @php
                                        $after_discount = ($product->price - ($product->price * $product->discount) / 100);
                                    @endphp
                                    <span>${{ number_format($after_discount, 2) }}</span>
                                </span>
                            </p>
                        @else
                            <p class="card-text">
                                <b>Price: </b><span>${{ number_format($product->price, 2) }}</span>
                            </p>
                        @endif

                        <div class="card-button d-flex justify-content-between">
                            <form action="{{ route('add-to-wishlist', ['id' => $product->id]) }}" method="POST"
                                class="wishlist-form">
                                @csrf
                                <button type="submit" class="btn btn-block wishlist-btn">
                                    <img src="{{ asset('images/logo/wishlist.png') }}" alt="Add to Wishlist"
                                        width="30" height="30">
                                </button>
                                <!-- Wishlist Popup -->
                                <div class="wishlist-popup">
                                    <!-- Wishlist actions or confirmation -->
                                    <p>Added to Wishlist!</p>
                                </div>
                            </form>

                            <a href="{{route('add-to-cart',['id'=>$product->id])}}"><button type="submit" class="btn btn-outline-dark">Add to Card</button></a>

                        </div>
                   </div>
                </div>
            </div>
        </div>
         @endforeach

  </div>
</div>

@endif
<style>
    .wishlist-form {
      position: relative;
      display: inline-block;
  }

  .wishlist-btn {
      background: none;
      border: none;
      cursor: pointer;
  }

  .wishlist-popup {
      display: none;
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      padding: 10px;
      background-color: #fff;
      border: 1px solid #811d1d;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
      z-index: 1000;

  .wishlist-popup.active {
      display: block;
  }


  </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
