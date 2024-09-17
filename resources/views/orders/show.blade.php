@extends('admindash.master')
@section('title','Order Detail')
@section('content')
{{-- <div class="card">
<h5 class="card-header">Order</h5>

  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>S.N.</th>
            <th>Usesr_ID</th>
            <th>Order No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Quantity</th>

            <th>Total Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->user_id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>

            <td>${{number_format($order->total_amount,2)}}</td>
            <td>
                @if($order->status=='new')
                  <span>{{$order->status}}</span>
                @elseif($order->status=='process')
                  <span >{{$order->status}}</span>
                @elseif($order->status=='delivered')
                  <span >{{$order->status}}</span>
                @else
                  <span>{{$order->status}}</span>
                @endif
            </td>
            <td>
                <a href="{{route('orders.edit',$order->id)}}">
                    <button class="btn">
                        <img src="{{asset('../images/logo/edit.png')}}" alt="" width="30" height="30">
                    </button>
                </a>
                <form method="POST" action="{{route('orders.destroy',[$order->id])}}">
                    @csrf
                    @method('delete')
                        <button class="btn " data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete">
                             <img src="{{asset('../images/logo/delete.png')}}" alt="" width="30" height="30">
                        </button>
                </form>
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


                    <tr>
                        <td>Total Amount</td>
                        <td> : $ {{number_format($order->total_amount,2)}}</td>
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
</div> --}}
<!-- resources/views/orders/show.blade.php -->
<h1>Order Details</h1>
<h2>Order ID: {{ $order->id }}</h2>

<h3>Products:</h3>
<ul>
    @foreach($order->products as $product)
        <li>{{ $product->name }} - Quantity: {{ $product->pivot->quantity }} - Price: {{ $product->pivot->price }}</li>
    @endforeach
</ul>

@endsection

@push('styles')
<style>
    .order-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
