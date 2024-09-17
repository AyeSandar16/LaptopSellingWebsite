@extends('frontend.layout')
@section('title', 'Next Gen Laptops')
@section('content')
    @include('flash-messages')

	<!-- Shopping Cart -->
    <div class="m-4 p-5">
        <div class="container m-3">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
                            <tr>
                                <th colspan="6">
                                    <h3>WishList Table</h3>
                                </th>
                            </tr>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">TOTAL</th>
								<th class="text-center">ADD TO CART</th>
								<th class="text-center">
                                    <img src="../images/logo/rubbish-bin.png" alt="" width="30" height="30">
                                </th>
							</tr>
						</thead>
						<tbody>
							@if($wishlists->isNotEmpty())
								@foreach($wishlists as $key => $wishlist)
									<tr>
										@php
											$image=explode(',',$wishlist->product['image']);
										@endphp
										<td class="image" data-title="No"><img src="../images/{{ $wishlist->product->image }}" width="30" height="30"></td>
										<td class="product-des" data-title="Description">
											<p class="product-name"><a href="">{{$wishlist->product['model']}}</a></p>
										</td>
										<td class="total-amount text-center" data-title="Total"><span>${{$wishlist['amount']}}</span></td>
										<td class=" text-center">
                                            {{-- <form action="{{route('add-to-cart',$wishlist->product_id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-dark">Add to Card</button>

                                            </form> --}}
                                            <a href="{{route('add-to-cart',$wishlist->product_id)}}"><button type="submit" class="btn btn-outline-dark">Add to Card</button></a>
                                        </td>
                                        <td class="action text-center" data-title="Remove">

                                            <button type="button" class="btn delete-btn"  id="delete-form-{{ $wishlist->id }}">
                                                <a href="{{route('wishlist-delete',$wishlist->id)}}" data-id="{{ $wishlist->id }}"><img src="{{asset('../images/logo/remove.png')}}" alt="" width="30" height="30"></a>
                                            </button>

                                    </td>
									</tr>
								@endforeach
							@else
								<tr>
									<td class="text-center">
										There are no any wishlist available. <a href="{{route('home.product_page')}}" style="color:blue;">Continue shopping</a>

									</td>
								</tr>
							@endif


						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->


    <script>

        $(document).ready(function() {
              $('.wishlist-btn').hover(
                  function() {
                      $(this).siblings('.wishlist-popup').addClass('active');
                  },
                  function() {
                      $(this).siblings('.wishlist-popup').removeClass('active');
                  }
              );
          });
    </script>
@endsection

