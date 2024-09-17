@extends('frontend.layout')
@section('title', 'Next Gen Laptops')
@section('content')
    @include('flash-messages')

    <!-- Shopping Cart -->
    <div class="m-4 p-5">
        <div class="container m-3">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="6">
                                    <h3>Cart Table</h3>
                                </th>
                            </tr>
                            <tr class="main-heading">
                                <th>IMAGE</th>
                                <th>Model</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center">
                                    <img src="../images/logo/rubbish-bin.png" alt="" width="30" height="30">
                                </th>
                            </tr>
                        </thead>
                        <tbody id="cart_item_list">
                        <form action="{{ route('cart-update') }}" method="POST">
                            @csrf
                            @if($carts->isNotEmpty())
                                @foreach($carts as $key => $cart)
                                    <tr>
                                        @php
                                        $image = explode(',', $cart->product['image']);
                                        @endphp
                                        <td class="image"><img src="../images/{{ $cart->product->image }}" width="50" height="50"></td>
                                        <td class="product-des" data-title="model">
                                            <p class="product-name"><a href="" target="_blank">{{ $cart->product['model'] }}</a></p>
                                            <p class="product-des">{!! ($cart['summary']) !!}</p>
                                        </td>
                                        <td class="price" data-title="Price"><span>${{ number_format($cart['price'], 2) }}</span></td>
                                        <td class="qty" data-title="Qty">
                                            <!-- Input Order -->
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-number" data-type="minus" data-field="quant[{{ $key }}]">
                                                        <img src="../images/logo/minus.png" alt="" width="20" height="20">
                                                    </button>
                                                </div>

                                                <input type="text" name="quant[{{ $key }}]" class="input-number form-control" data-min="1" data-max="100" value="{{ $cart->quantity }}">
                                                <input type="hidden" name="qty_id[]" value="{{ $cart->id }}">

                                                <div class="button plus">
                                                    <button type="button" class="btn btn-number" data-type="plus" data-field="quant[{{ $key }}]">
                                                        <img src="../images/logo/plus (1).png" alt="" width="20" height="20">
                                                    </button>
                                                </div>
                                            </div>

                                        </td>

                                        <td class="total-amount cart_single_price" data-title="Total"><span class="money">${{ $cart['amount'] }}</span></td>

                                        <td class="action text-center" data-title="Remove">

                                                <button type="button" class="btn delete-btn"  id="delete-form-{{ $cart->id }}">
                                                    <a href="{{route('cart-delete',$cart->id)}}" data-id="{{ $cart->id }}"><img src="{{asset('../images/logo/remove.png')}}" alt="" width="30" height="30"></a>
                                                </button>

                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="float-right gap-3">
                                            <button class="btn btn-outline-dark float-right" type="submit">Update</button>
                                            <a href="{{route('checkout')}}">Checkout</a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="text-center" colspan="6">
                                        There are no items in the cart. <a href="{{route('home.product_page')}}" style="color:blue;">Continue shopping</a>
                                    </td>
                                </tr>
                            @endif
                        </form>
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->


@endsection
