@extends('frontend.layout')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')

		<!-- Shop Single -->
		<section class="shop single section m-5">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-lg-4 col-12">
										<!-- Product Slider -->
										<div class="product-gallery">
											<!-- Images slider -->
											<div class="flexslider-thumbnails">

													@php
														$image=explode(',',$product_detail->image);
													// dd($photo);
													@endphp
													@foreach($image as $data)

															<img src="../images/{{$product_detail->image}}" alt="{{$data}}" width="200" height="200">

													@endforeach

											</div>
											<!-- End Images slider -->
										</div>
										<!-- End Product slider -->
									</div>
									<div class="col-lg-8 col-12">
										<div class="product-des">
											<!-- Description -->
											<div class="short ">
												<h4>{{$product_detail->model}}</h4>
                                                <label class="fw-bold mb-2">Memory: &nbsp;</label><span>{{$product_detail->memory}}</span><br>
                                                <label class="fw-bold mb-2">CPU: &nbsp;</label><span>{{$product_detail->cpu}}</span><br>
                                                <label class="fw-bold mb-2">Storage: &nbsp;</label><span>{{$product_detail->storage}}</span><br>
												<label class="fw-bold mb-2">Display: &nbsp;</label><span>{{$product_detail->display}}</span><br>
												<label class="fw-bold mb-2">Weight: &nbsp;</label><span>{{$product_detail->weight}}</span><br>
												<label class="fw-bold mb-2">Battery: &nbsp;</label><span>{{$product_detail->battery}}</span><br>
												<label class="fw-bold mb-2">Stock: &nbsp;</label><button class="btn btn-success p-1">{{$product_detail->stock}}</button><br>

                                                @if ($product_detail->discount > 0)

                                                <p class="card-text">
                                                    <span class="product-price">
                                                        <p class="card-text text-danger"><b>Discount: </b>{{ $product_detail->discount }}%</p>
                                                        <b>Price: </b>
                                                        <del><span class="old  text-">${{ number_format($product_detail->price, 2) }}</span></del>
                                                        @php
                                                            $after_discount = ($product_detail->price - ($product_detail->price * $product_detail->discount) / 100);
                                                        @endphp
                                                        <span>${{ number_format($after_discount, 2) }}</span>
                                                    </span>
                                                </p>
                                                @else
                                                    <p class="card-text">
                                                        <b>Price: </b><span>${{ number_format($product_detail->price, 2) }}</span>
                                                    </p>
                                                @endif

											</div>


											<!--/ End Size -->
											<!-- Product Buy -->

                                            <div class="card-button d-flex justify-content-start gap-3">
                                                <form action="{{ route('add-to-wishlist', ['id' => $product_detail->id]) }}" method="POST" class="wishlist-form">
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

                                                <a href="{{route('add-to-cart',['id' =>  $product_detail->id])}}"><button type="submit" class="btn btn-outline-dark">Add to Card</button></a>

                                            </div>

                                        <!--/ End Product Buy -->

										</div>

									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="product-info">
											<div class="nav-main">
												<!-- Tab Nav -->
												<ul class="nav nav-tabs" id="myTab" role="tablist">
													<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Additional Feature</a></li>
													<li class="nav-item"><a class="nav-link " data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
												</ul>
												<!--/ End Tab Nav -->
											</div>
											<div class="tab-content" id="myTabContent">
												<!-- Description Tab -->
												<div class="tab-pane fade show active" id="description" role="tabpanel">
													<div class="tab-single">
														<div class="row">
															<div class="col-12">
																<div class="single-des">
																	<p>{!! ($product_detail->feature) !!}</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--/ End Description Tab -->
                                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                    <div class="tab-single review-panel">
                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- Review -->
                                                                <div class="comment-review">
                                                                    <div class="add-review">
                                                                        <h5>Add A Review</h5>
                                                                        <p>Your email address will not be published. Required fields are marked</p>
                                                                    </div>
                                                                    <h4>Your Rating <span class="text-danger">*</span></h4>
                                                                    <div class="review-inner">
                                                                            <!-- Form -->
                                                                @auth
                                                                <form class="form" method="post" action="">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-12">
                                                                            <div class="rating_box">
                                                                                <div class="star-rating">
                                                                                    <div class="star-rating__wrap">
                                                                                    <input class="star-rating__input" id="star-rating-5" type="radio" name="rate" value="5">
                                                                                    <label class="star-rating__ico fa fa-star-o" for="star-rating-5" title="5 out of 5 stars"></label>
                                                                                    <input class="star-rating__input" id="star-rating-4" type="radio" name="rate" value="4">
                                                                                    <label class="star-rating__ico fa fa-star-o" for="star-rating-4" title="4 out of 5 stars"></label>
                                                                                    <input class="star-rating__input" id="star-rating-3" type="radio" name="rate" value="3">
                                                                                    <label class="star-rating__ico fa fa-star-o" for="star-rating-3" title="3 out of 5 stars"></label>
                                                                                    <input class="star-rating__input" id="star-rating-2" type="radio" name="rate" value="2">
                                                                                    <label class="star-rating__ico fa fa-star-o" for="star-rating-2" title="2 out of 5 stars"></label>
                                                                                    <input class="star-rating__input" id="star-rating-1" type="radio" name="rate" value="1">
                                                                                    <label class="star-rating__ico fa fa-star-o" for="star-rating-1" title="1 out of 5 stars"></label>
                                                                                    @error('rate')
                                                                                        <span class="text-danger">{{$message}}</span>
                                                                                    @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-12">
                                                                            <div class="form-group">
                                                                                <label>Write a review</label>
                                                                                <textarea name="review" rows="6" placeholder="" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-12">
                                                                            <div class="form-group button5">
                                                                                <button type="submit" class="btn">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                @else
                                                                <p class="text-center p-5">
                                                                    You need to <a href="{{route('auth.login')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('auth.registration')}}">Register</a>

                                                                </p>
                                                                <!--/ End Form -->
                                                                @endauth
                                                                    </div>
                                                                </div>

                                                                <!--/ End Review -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</section>
		<!--/ End Shop Single -->

		<!-- Start Most Popular -->
	{{--  --}}
	<!-- End Most Popular Area -->


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

/* Rating */
.rating_box {
		display: inline-flex;
		}

		.star-rating {
		font-size: 0;
		padding-left: 10px;
		padding-right: 10px;
		}

		.star-rating__wrap {
		display: inline-block;
		font-size: 1rem;
		}

		.star-rating__wrap:after {
		content: "";
		display: table;
		clear: both;
		}

		.star-rating__ico {
		float: right;
		padding-left: 2px;
		cursor: pointer;
		color: #F7941D;
		font-size: 16px;
		margin-top: 5px;
		}

		.star-rating__ico:last-child {
		padding-left: 0;
		}

		.star-rating__input {
		display: none;
		}

		.star-rating__ico:hover:before,
		.star-rating__ico:hover ~ .star-rating__ico:before,
		.star-rating__input:checked ~ .star-rating__ico:before {
		content: "\F005";
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

@endsection


