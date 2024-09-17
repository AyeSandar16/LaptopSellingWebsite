@extends('admindash.master')
@section('content')
@include('flash-messages')

<div class="card">
    <h5 class="card-header">Edit Post</h5>
    <div class="card-body">
    <form method="post" action="{{route('settings.update')}}">
        @csrf

        <div class="form-group">
          <label for="phone" class="col-form-label">Phone <span class="text-danger">*</span></label>
          <textarea class="form-control" id="quote" name="phone">{{$data->phone}}</textarea>
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
          <textarea class="form-control" id="email" name="email">{{$data->email}}</textarea>
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="facebook" class="col-form-label">Facebook <span class="text-danger">*</span></label>
            <textarea class="form-control" id="facebook" name="facebook">{{$data->facebook}}</textarea>
            @error('facebook')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="youtube" class="col-form-label">Youtube <span class="text-danger">*</span></label>
            <textarea class="form-control" id="email" name="youtube">{{$data->youtube}}</textarea>
            @error('youtube')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="instagram" class="col-form-label">Instagram <span class="text-danger">*</span></label>
            <textarea class="form-control" id="instagram" name="instagram">{{$data->instagram}}</textarea>
            @error('instagram')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="twitter" class="col-form-label">Twitter <span class="text-danger">*</span></label>
            <textarea class="form-control" id="twitter" name="twitter">{{$data->twitter}}</textarea>
            @error('twitter')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>





        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

