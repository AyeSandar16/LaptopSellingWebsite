@extends('frontend.layout')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')
        <div class="container m-3">
                <form class="form" method="POST" action="{{route('cart.order')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="checkout-form">
                                <h2>Make Your Checkout Here</h2>
                                <p>Please register in order to checkout more quickly</p>
                                <!-- Form -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">First Name<span class="text-danger">*</span></label>
                                            <input class="form-control"type="text" name="first_name" placeholder="" value="{{old('first_name')}}" value="{{old('first_name')}}">
                                            @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="last_name" placeholder="" value="{{old('lat_name')}}">
                                            @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Email Address<span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email" placeholder="" value="{{old('email')}}">
                                            @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="phone" placeholder="" required value="{{old('phone')}}">
                                            @error('phone')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input class="form-control" type="text" name="address" placeholder="Correct Address..." value="{{old('address')}}">
                                            @error('address')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <!--/ End Form -->
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h4>CART  TOTALS</h4>
                                <div class="content">
                                     <p class="order_subtotal" data-price="{{ \App\Models\Helper::totalCartPrice()}}">Total<span>${{number_format( \App\Models\Helper::totalCartPrice(),2)}}</span></p>
                                </div>
                            </div>
                            <!--/ End Order Widget -->

                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit" class="btn btn-outline-dark">proceed to checkout</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </form>
        </div>


@endsection


