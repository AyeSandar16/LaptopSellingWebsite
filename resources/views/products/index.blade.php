@extends('admindash.master')
@section('title','Next Gen Laptops')
@section('content')
@include('flash-messages')
<main >

    <a href="{{route('products.create')}}" class="d-flex justify-content-end text-decoration-none"><button class="btn btn-outline-light m-3"><img src="../images/logo/plus.png" width="20" height="20" class ="m-2" alt="">Add Product</button></a>

    @if(count($products)>0)
    <table class="table table-striped " style="font-size: 13px;">
        <tr><h4> View Product</h4></tr>
        <tr>
            <td>Id</td>
            <td>Category</td>
            <td>Brand</td>
            <td>Model</td>
            <td>Memory</td>
            <td>Display</td>
            <td>CPU</td>
            <td>Storage</td>
            <td>Battery</td>
            <td>Weight</td>
            <td>Feature</td>
            <td>Discount</td>
            <td>Price</td>
            <td>Stock</td>
            <td>Condition</td>
            <td>Status</td>
            <td>Warranty</td>
            <td>Image</td>
            <td>Action</td>
        </tr>

        @foreach($products as $product)
        <tr>

            <td>{{$product['id']}}</td>
            <?php $catName = App\Models\Category::find($product->category_id);?>
            <td>{{$catName->name}}</td>
            <?php $catchName = App\Models\Brand::find($product->brand_id);?>
            <td>{{$catchName->name}}</td>
            <td><a href="{{route('products.show',$product->id)}}"></a>{{$product['model']}}</td>
            <td>{{$product['memory']}}</td>
            <td>{{$product['display']}}</td>
            <td>{{$product['cpu']}}</td>
            <td>{{$product['storage']}}</td>
            <td>{{$product['battery']}}</td>
            <td>{{$product['weight']}}</td>
            <td>{{$product['feature']}}</td>
            <td>{{$product['discount']}}%</td>
            <td>{{$product['price']}}</td>
            <td>{{$product['stock']}}</td>
            <td>{{$product['condition']}}</td>
            <td>{{$product['status']}}</td>
            <td>{{$product['warranty']}}</td>
            <td><img src="../images/{{$product->image}}" alt="" width="200" height="150"></td>
            <td class="d-flex flex-wrap d-block gap-3">
                <a href="{{route('products.edit',$product->id)}}"><button class="btn"><img src="{{asset('../images/logo/edit.png')}}" alt="" width="30" height="30"></button></a>
                <a href="{{route('products.destroy',$product->id)}}"  id="delete-form-{{ $product->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-btn"  data-id="{{ $product->id }}">
                        <img src="{{asset('../images/logo/delete.png')}}" alt="" width="30" height="30">
                    </button>
                </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$products->links()}}
    @else<p class="text-danger fw-bold">There are no products to display.</p>

@endif

</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const productId = button.getAttribute('data-id');
                const deleteForm = document.getElementById(`delete-form-${productId}`);

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
