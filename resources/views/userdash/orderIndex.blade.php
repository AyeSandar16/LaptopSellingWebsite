@extends('frontend.layout')
@section('title','Next Gen Laptops || User Dashboard')
@section('content')
@include('flash-messages')
<div class="m-4 p-5 bg-secondary ">
    <div class="container w-75">
        <h4 class="text-center pb-3">User Dashboard</h4>
        <div class="row">
            <div class="col-3">
                <div class="row"><a href="{{route('user-profile')}}" class="text-dark text-decoration-none" >Profile Update</a></div>
                <div class="row"><a href="{{route('user.order.index')}}"  class="text-dark text-decoration-none">Order</a></div>
                <div class="row">
                    <a href="{{route('user.change.password.form')}}"  class=" text-dark text-decoration-none">Update password</a>
                </div>
             </div>
            <div class="col">
                <div class="container">
                    <div class="card">
                        <div class="card-header">Your Orders</div>

                        <div class="card-body">
                            @if ($orders->isEmpty())
                                <p>No orders found.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Order Number</th>
                                                <th>Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->order_number }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>${{ number_format($order->total_amount, 2) }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>
                                                        <a href="{{ route('user.order.show', $order->id) }}">View</a>
                                                        {{-- Add other actions as needed --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $orders->links() }} {{-- Pagination links --}}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection


