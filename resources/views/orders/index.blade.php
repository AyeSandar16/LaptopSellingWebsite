@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">

    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Order Lists</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($orders)>0)
        <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>User_id</th>
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
            @foreach($orders as $order)
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
                          <span>{{$order->status}}</span>
                        @else
                          <span >{{$order->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('orders.show',$order->id)}}">
                            <button class="btn">
                                <img src="{{asset('../images/logo/show.png')}}" alt="" width="30" height="30">
                            </button>
                        </a>
                        <a href="{{route('orders.edit',$order->id)}}">
                            <button class="btn">
                                <img src="{{asset('../images/logo/edit.png')}}" alt="" width="30" height="30">
                            </button>
                        </a>

                        <form method="POST" action="{{route('orders.destroy',[$order->id])}}" id="delete-form-{{ $order->id }}">
                            @csrf
                            @method('delete')
                                <button type="button" class="btn delete-btn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                     <img src="{{asset('../images/logo/delete.png')}}" alt="" width="30" height="30">
                                </button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{-- <span style="float:right">{{$orders->links()}}</span> --}}
        @else
          <h6 class="text-center">No orders found!!! Please order some products</h6>
        @endif
      </div>
    </div>
</div>
{{-- <h1>Orders List</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Order Number</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Total Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($orders as $order)
            @foreach ($order->products as $product)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $product->model }}</td> <!-- Adjust to your product attribute -->
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>${{ number_format($product->pivot->price, 2) }}</td>
                    <td>${{ number_format($product->pivot->quantity * $product->pivot->price, 2) }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="9">No orders found.</td>
            </tr>
        @endforeach
    </tbody>
</table> --}}

{{-- {{ $orders->links() }} --}}


@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const categoryId = button.getAttribute('data-id');
                const deleteForm = document.getElementById(`delete-form-${categoryId}`);

                if (confirm('Are you sure you want to delete this item?')) {
                    deleteForm.submit();
                } else {
                    // Optionally handle cancel action
                    console.log('Deletion canceled.');
                }
            });
        });
    });
</script>
