@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')
<main>

    <a href="{{route('categories.create')}}" class="d-flex justify-content-end text-decoration-none"><button class="btn btn-outline-light m-3"><img src="../images/logo/plus.png" width="20" height="20" class ="m-2" alt="">Add Category</button></a>
    @if(count($categories)>0)
    <table class="table table-striped">
        <tr>
            <h4> View Category</h4>

        </tr>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Action</td>
        </tr>

        @foreach($categories as $category)
        <tr>

             <td>{{$category['id']}}</td>
            <td><a href="{{route('categories.show',['category'=>$category['id']])}}">{{$category['name']}}</a></td>
            <td class="d-flex flex-wrap d-block gap-3">
                <a href="{{route('categories.edit',$category->id)}}">
                    <button class="btn">
                        <img src="{{asset('../images/logo/edit.png')}}" alt="" width="30" height="30">
                    </button>
                </a>
                <form action="{{route('categories.destroy',$category->id)}}" method="post" id="delete-form-{{ $category->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-btn" data-id="{{ $category->id }}">
                        <img src="{{asset('../images/logo/delete.png')}}" alt="" width="30" height="30">
                    </button>
                </form>
                </td>
            </tr>

        @endforeach

    </table>

    @else<p class="text-danger fw-bold">There are no categories to display.</p>
    @endif
</main>
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
@endsection
