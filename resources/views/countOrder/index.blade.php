@extends('admindash.master')

@section('title', 'Order Details')

@section('content')
@include('flash-messages')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Order Details</h6>
    </div>
    <div class="card-body">
        <h2>Order #{{ $order->id }}</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product['product_name'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>${{ number_format($product['price'], 2) }}</td>
                        <td>${{ number_format($product['amount'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('orders.index') }}">Back to Orders</a>
    </div>
</div>
@endsection
