<div class="offcanvas offcanvas-start " data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title " id="offcanvasWithBothOptionsLabel">Admin Dashboard</h5><br>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="sidebar-divider">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title " id="offcanvasWithBothOptionsLabel"><a href="">Dashboard</a></h6><br>
    </div>
    <hr class="sidebar-divider">
    @php
    $user = Auth::user();
    @endphp
    <div class="offcanvas-header">
      <ul class="list-unstyled">
          <li><h5>{{ $user->name }} </h5></li>
          <li><img src="{{asset('../images/logo/user (1).png')}}" alt="" width="20" height="20"> &nbsp; <a href="{{route('profile')}}">Profile</a></li>
          <li><img src="{{asset('../images/logo/key.png')}}" alt="" width="20" height="20"> &nbsp; <a href="{{route('admin.change.password')}}">Password</a> </li>
          <li><img src="{{asset('../images/logo/settings.png')}}" alt="" width="20" height="20"> &nbsp; <a href="{{route('settings')}}">Setting</a></li>
          {{-- <hr> --}}
          <li><img src="{{asset('../images/logo/logout.png')}}" alt="" width="20" height="20"> &nbsp; <a href="{{route('auth.logout')}}">logout</a></li>
      </ul>
    </div>
    <hr class="sidebar-divider">

    <div class="offcanvas-body">
      <div class="m-3 ">
          <h6>Banner</h6>
          <img src="{{asset('../images/logo/categories.png')}}" alt="" width="30" height="30" class=""> &nbsp;&nbsp;
          <a href="{{route('banners.index')}}"><button class="btn btn-dark ">View Banner</button></a>
     </div>
     <hr class="sidebar-divider">
     <div class="m-3">
          <h6>Category</h6>
          <img src="{{asset('../images/logo/categories.png')}}" alt="" width="30" height="30" class="mr-5">&nbsp;&nbsp;
          <a href="{{route('categories.index')}}"><button class="btn btn-dark">View Category</button></a>
     </div>

     <hr class="sidebar-divider">
     <div class="m-3">
          <h6>Brand</h6>
          <img src="{{asset('../images/logo/badge.png')}}" alt="" width="30" height="30">&nbsp;&nbsp;
          <a href="{{route('brands.index')}}"><button class="btn btn-dark">View Brand</button></a>
      </div>

      <hr class="sidebar-divider">
      <div class="m-3">
          <h6>Product</h6>
          <img src="{{asset('../images/logo/order.png')}}" alt="" width="30" height="30">&nbsp;&nbsp;
          <a href="{{route('products.index')}}"><button class="btn btn-dark">View Product</button></a>
      </div>
      <hr class="sidebar-divider">

      <div class="m-3">
          <h6>User</h6>
          <img src="{{asset('../images/logo/group.png')}}" alt="" width="30" height="30">&nbsp;&nbsp;
          <a href="{{route('users.index')}}"><button class="btn btn-dark">View User</button></a>
      </div>
      <hr class="sidebar-divider">

      <div class="m-3">
          <h6>Order</h6>
          <img src="{{asset('../images/logo/order (2).png')}}" alt="" width="30" height="30">&nbsp;&nbsp;
          <a href="{{route('orders.index')}}"><button class="btn btn-dark">View Order</button></a>
      </div>
      <hr class="sidebar-divider">



      <div class="m-3">
          <h6>Message</h6>
          <img src="{{asset('../images/logo/feedback.png')}}" alt="" width="30" height="30">&nbsp;&nbsp;
          <a href="{{route('messages.index')}}"><button class="btn btn-dark">View Message</button></a>
      </div>


  </div>


  </div>

