
@extends('admindash.master')
@section('title', 'Next Gen Laptops')
@section('content')
@include('flash-messages')

<div class="card">

  <h5 class="card-header">Messages</h5>
  <div class="card-body">
    @if(count($goodMessages)>0)
    <table class="table message-table" id="message-dataTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Message</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $goodMessages as $message)

        <tr class="@if($message->read_at) border-left-success @else bg-light border-left-warning @endif">
          <td scope="row">{{$loop->index +1}}</td>
          <td>{{$message->name}} {{$message->read_at}}</td>
          <td>{{$message->message}}</td>
          <td>{{$message->created_at->format('F d, Y h:i A')}}</td>
          <td>
            <a href="{{route('messages.show',$message->id)}}">
                <button class="btn">
                    <img src="{{asset('../images/logo/show.png')}}" alt="" width="30" height="30">
                </button>
            </a>
            <form method="POST" action="{{route('messages.destroy',$message->id)}}" id="delete-form-{{ $message->id }}">
              @csrf

                <button type="button" class="btn delete-btn"  data-id={{$message->id}}  style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete">
                    <img src="{{asset('../images/logo/delete.png')}}" alt="" width="30" height="30">
                </button>

            </form>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
    <nav class="blog-pagination justify-content-center d-flex">
      {{$goodMessages->links()}}
    </nav>
    @else
      <h2>Messages Empty!</h2>
    @endif
  </div>
</div>

<div class="card">

  <h5 class="card-header">Messages</h5>
  <div class="card-body">
    @if(count($badMessages)>0)
    <table class="table message-table" id="message-dataTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Message</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $badMessages as $message)

        <tr class="@if($message->read_at) border-left-success @else bg-light border-left-warning @endif">
          <td scope="row">{{$loop->index +1}}</td>
          <td>{{$message->name}} {{$message->read_at}}</td>
          <td>{{$message->message}}</td>
          <td>{{$message->created_at->format('F d, Y h:i A')}}</td>
          <td>
            <a href="{{route('messages.show',$message->id)}}">
                <button class="btn">
                    <img src="{{asset('../images/logo/show.png')}}" alt="" width="30" height="30">
                </button>
            </a>
            <form method="POST" action="{{route('messages.destroy',$message->id)}}" id="delete-form-{{ $message->id }}">
              @csrf

                <button type="button" class="btn delete-btn"  data-id={{$message->id}}  style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete">
                    <img src="{{asset('../images/logo/delete.png')}}" alt="" width="30" height="30">
                </button>

            </form>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
    <nav class="blog-pagination justify-content-center d-flex">
      {{$badMessages->links()}}
    </nav>
    @else
      <h2>Messages Empty!</h2>
    @endif
  </div>
</div>
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
