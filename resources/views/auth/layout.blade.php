<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{url('css/style.css')}}">
        <style>
body{
    margin:20px;
    background-color: rgb(225, 219, 219);

}        </style>

    </head>
<body>

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid gap-3">
        <img src="{{asset('../images/logo/download2.png')}}" width="110" height="70" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <button class="btn btn-outline-dark " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Functions</button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active font-weight-normal" aria-current="page" href="{{route('auth.logout')}}" >Home</a>
          </li>

        </ul>
        <form class="d-flex" >
            @php
            $user = Auth::user();
            @endphp
            <img src="{{asset('../images/logo/user.png')}}" width="30" height="30">
            Welcome &nbsp; <h5> {{ $user->name }} !  </h5> &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="{{route('auth.logout')}}"><button type="button" class="btn btn-outline-dark">Logout</button><a>
        </form>
      </div>
    </div>
  </nav>
@include('admindash.index')
@yield('content')
  <div class="offcanvas offcanvas-start " data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title " id="offcanvasWithBothOptionsLabel">Admin Dashboard</h5><br>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="sidebar-divider">

    <div class="offcanvas-header">
      <ul class="list-unstyled">
          <li><h5>{{ $user->name }} </h5></li>
          <li><img src="{{asset('../images/logo/user (1).png')}}" alt="" width="20" height="20"> &nbsp;<a href="{{route('profile')}}"> profile</a></li>
          <li><img src="{{asset('../images/logo/key.png')}}" alt="" width="20" height="20"> &nbsp;<a href="{{route('change.password.form')}}">password</a> </li>
          <li><img src="{{asset('../images/logo/settings.png')}}" alt="" width="20" height="20"> &nbsp; <a href="{{route('settings')}}">setting</a></li>
          <hr>
          <li><img src="{{asset('../images/logo/logout.png')}}" alt="" width="20" height="20"> &nbsp; logout</li>
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
          <a href="{{route('users.index')}}"><button class="btn btn-dark">View Order</button></a>
      </div>
      <hr class="sidebar-divider">

      <div class="m-3">
          <h6>Review</h6>
          <img src="{{asset('../images/logo/feedback.png')}}" alt="" width="30" height="30">&nbsp;&nbsp;
          <a href="{{route('users.index')}}"><button class="btn btn-dark">View Review</button></a>
      </div>


  </div>


  </div>


<footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; <a href="https://github.com/Prajwal100" target="_blank">Next Gen Laptops</a> {{date('Y')}}</span>
      </div>
    </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
