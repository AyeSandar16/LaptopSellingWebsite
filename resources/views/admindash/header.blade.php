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
          <li class="nav-item">
            <a class="nav-link active font-weight-normal" aria-current="page" href="" >Dashboard</a>
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
