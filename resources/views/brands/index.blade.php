
@extends('admindash.master')
@section('title', 'Next Gen Laptops')
@section('content')
@include('flash-messages')

    <main>
        <a href="{{ route('brands.create') }}" class="d-flex justify-content-end text-decoration-none">
            <button class="btn btn-outline-light m-3">
                <img src="../images/logo/plus.png" width="20" height="20" class="m-2" alt="">
                Add Brand
            </button>
        </a>

        @if (count($brands) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td><a href="{{ route('brands.show', ['brand' => $brand->id]) }}">{{ $brand->name }}</a></td>
                            <td class="d-flex flex-wrap d-block gap-3">
                                <a href="{{ route('brands.edit', $brand->id) }}">
                                    <button class="btn">
                                        <img src="{{ asset('../images/logo/edit.png') }}" alt="" width="30" height="30">
                                    </button>
                                </a>
                                <form action="{{ route('brands.destroy', $brand->id) }}" id="delete-form-{{ $brand->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn delete-btn" data-id="{{ $brand->id }}">
                                        <img src="{{ asset('../images/logo/delete.png') }}" alt="" width="30" height="30">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-danger fw-bold">There are no brands to display.</p>
        @endif
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    const brandId = button.getAttribute('data-id');
                    const deleteForm = document.getElementById(`delete-form-${brandId}`);

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
