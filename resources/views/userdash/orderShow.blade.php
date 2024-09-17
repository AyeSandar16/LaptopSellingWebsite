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
                <div class="card">
                    <h5 class="card-header">Order </h5>
                    <div class="card-body">
                    @if($order)
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>

                                <th>Order No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>{{$order->order_number}}</td>
                                <td>{{$order->first_name}} {{$order->last_name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>${{number_format($order->total_amount,2)}}</td>
                                <td>
                                    @if($order->status=='new')
                                    <span >{{$order->status}}</span>
                                    @elseif($order->status=='process')
                                    <span>{{$order->status}}</span>
                                    @elseif($order->status=='delivered')
                                    <span>{{$order->status}}</span>
                                    @else
                                    <span >{{$order->status}}</span>
                                    @endif
                                </td>


                            </tr>
                        </tbody>
                    </table>

                    <section class="confirmation_part section_padding">
                        <div class="order_boxes">
                            <div class="row">
                                <div class="col-lg-6 col-lx-4">
                                    <div class="order-info">
                                        <h4 class="text-center pb-4">ORDER INFORMATION</h4>
                                        <table class="table">
                                                <tr class="">
                                                    <td>Order Number</td>
                                                    <td> : {{$order->order_number}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Order Date</td>
                                                    <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                                                </tr>
                                                <tr>
                                                    <td>Quantity</td>
                                                    <td> : {{$order->quantity}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Order Status</td>
                                                    <td> : {{$order->status}}</td>
                                                </tr>

                                        </table>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-lx-4">
                                    <div class="shipping-info">
                                    <h4 class="text-center pb-4">SHIPPING INFORMATION</h4>
                                    <table class="table">
                                            <tr class="">
                                                <td>Full Name</td>
                                                <td> : {{$order->first_name}} {{$order->last_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td> : {{$order->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone No.</td>
                                                <td> : {{$order->phone}}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td> : {{$order->address}}</td>
                                            </tr>

                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                </div>



            </div>
            </div>
        </div>
    </div>
</div>
@endsection
