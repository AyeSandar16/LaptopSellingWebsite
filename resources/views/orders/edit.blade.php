@extends('admindash.master')
@section('title','Order Detail')

@section('content')
<div class="card">
  <h5 class="card-header">Order Edit</h5>
  <div class="card-body">
    <form action="{{route('orders.update',$order->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <div class="row mb-3">
            <div class="col-2">
               <label for="status">ID : </label>
            </div>
            <div class="col">
                 {{$order->id}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
               <label for="status">User_ID : </label>
            </div>
            <div class="col">
                 {{$order->user_id}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
               <label for="status">Order Number : </label>
            </div>
            <div class="col">
                 {{$order->order_number}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
               <label for="status">Name : </label>
            </div>
            <div class="col">
                {{$order->first_name}} {{$order->last_name}}
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-2"><label for="status">Status :</label></div>
            <div class="col">
                <select name="status" id="status" class="form-control">
                    <option value="new" {{ $order->status == 'new' ? 'selected' : '' }} {{ $order->status != 'new' ? 'selected' : '' }}>New</option>
                    <option value="process" {{ $order->status == 'process' ? 'selected' : '' }} {{ $order->status == 'delivered' || $order->status == 'cancel' ? 'selected' : '' }}>Process</option>
                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }} {{ $order->status == 'cancel' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }} {{ $order->status == 'delivered' ? 'selected' : '' }}>Cancel</option>
                  </select>
            </div>
        </div>
      </div>
      <button type="submit" class="btn btn-dark mt-3">Update</button>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
