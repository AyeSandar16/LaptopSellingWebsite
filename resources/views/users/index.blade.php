@extends('admindash.master')
@section('title','View User')
@section('content')
@include('flash-messages')
<head>
    <style>

    </style>
</head>
<main>

    <a href="{{route('users.create')}}" class="d-flex justify-content-end text-decoration-none"><button class="btn btn-outline-light m-3"><img src="../images/logo/plus.png" width="20" height="20" class ="m-2" alt="">Add User</button>
    </a>
    @isset($users)
    @if(count($users) > 0)

    <table class=table>
        <thead>
            <tr>
                <h4> Users List</h4>
            </tr>
            <tr>
                <td scope="col">Id</td>
                <td scope="col">Name</td>
                <td scope="col">Email</td>
                <td scope="col">Password</td>
                <td scope="col">Role</td>
                <td scope="col">Action</td>
            </tr>
        </thead>
        <tbody>

                @foreach ($users as $user)
                <tr >
                    <td>{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['password']}}</td>
                    <td>{{$user['role']}}</td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}"><button class="btn"><img src="{{asset('../images/logo/edit.png')}}" alt="" width="30" height="30"></button></a> |
                        <form action="{{route('users.destroy', $user->id)}}" method="post" id="delete-form-{{ $user->id }}">
                            @csrf
                            @method('DELETE')

                            <button type="button" class="btn delete-btn"  data-id="{{ $user->id }}">
                                <img src="{{asset('../images/logo/delete.png')}}" alt="" width="30" height="30">
                            </button>
                        </form></td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {{$users->links()}}
    @else
    <p class="text-danger fw-bold">There are no users to display.</p>

@endif
@endisset

</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const userId = button.getAttribute('data-id');
                const deleteForm = document.getElementById(`delete-form-${userId}`);

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

