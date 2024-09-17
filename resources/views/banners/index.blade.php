@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')
<main>

    <a href="{{route('banners.create')}}" class="d-flex justify-content-end text-decoration-none"><button class="btn btn-outline-light m-3"><img src="../images/logo/plus.png" width="20" height="20" class ="m-2" alt="">Add Banner</button></a>

    @if(count($banners)>0)

    <table class="table table-striped">
        <tr>
            <h4> View Banner</h4>
        </tr>
        <tr>
            <td>Id</td>
            <td>Title</td>
            <td>Description</td>
            <td>Photo</td>
            <td>Action</td>
        </tr>

        @foreach($banners as $banner)
        <tr>

             <td>{{$banner['id']}}</td>
            <td><a href="">{{$banner['title']}}</a></td>
            <td><a href="">{{$banner['description']}}</a></td>
            <td><img src="../images/{{$banner->image}}" alt="" width="200" height="150"></td>
            <td class="d-flex flex-wrap d-block gap-3">
                <a href="{{route('banners.edit',$banner->id)}}"><button class="btn"><img src="{{asset('../images/logo/edit.png')}}" alt="" width="30" height="30"></button></a>
                <form action="{{route('banners.destroy',$banner->id)}}" method="post"  id="delete-form-{{ $banner->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-btn"  data-id="{{ $banner->id }}">
                        <img src="{{asset('../images/logo/delete.png')}}" alt="" width="30" height="30">
                    </button>
                </form>
                </td>
            </tr>

        @endforeach

    </table>
    {{$banners->links()}}
    @else<p>There are no data to display.</p>
    @endif
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const bannerId = button.getAttribute('data-id');
                const deleteForm = document.getElementById(`delete-form-${bannerId}`);

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
@endsection
