  {{-- start header --}}
  @php
  $settings = DB::table('settings')->get();
@endphp
  <div id="header" class=" ">

    @foreach ($settings as $setting)
    <p>If you can't find the product you want, please contact us at {{$setting->phone}} | {{$setting->email}}</p><hr>
    @endforeach

  </div>
  <div class="row text-center p-3" id="search">
      <div class="col-3 text-center"><img src="{{asset('../images/logo/download.png')}}" width="110" height="70" alt=""></div>
      <div class="col-5">
            <form class=" mb-3 mb-lg-0 me-lg-3 text-center" role="search" method="POST" action="{{ route('product.search') }}">
              @csrf
              <div class="container ">
                  <div class="row">
                      <div class="col-xs-8 col-xs-offset-2">
                          <div class="search-bar d-flex justify-content-end">
                              <input name="search" placeholder="Search Products Here....." type="search" class="form-control" >
                              <button class="btn" type="submit">
                                  <img src="{{ asset('images/logo/search.png') }}" alt="searchLogo" width="20" height="20">
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
        </div>


      <div class="d-flex col-4  ms-auto gap-2">
          @guest
          <a href="{{route('auth.login')}}"><button type="button" class="btn btn-dark me-2">Login</button></a>
          <a href="{{route('auth.registration')}}"><button type="button" class="btn btn-dark">Sign-up</button><a>
          @else

              @php
              $user = Auth::user();
              @endphp

          {{-- <img src="{{asset('../images/logo/user.png')}}" class="" width="30" height="30"> --}}
          <p class="font-bold">Welcome {{ $user->name }} !</p>

          <a href="{{route('wishlist')}}">
            <button type="button" class="btn position-relative">
                <img src="{{asset('images/logo/love.png')}}" width="30" height="30">
                <span class="position-absolute bottom-0.5 start-50  badge rounded-pill bg-danger ">
                    <span>{{ \App\Models\Helper::wishlistCount(auth()->id()) }}</span>
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>

        </a>
            <a href="{{ route('cart') }}">
                <button type="button" class="btn position-relative">
                    <img src="{{ asset('images/logo/shopping-bag.png') }}" alt="Shopping Cart" width="30" height="30">
                    <span id="cartBadge" class="position-absolute bottom-0.5 start-50 badge rounded-pill bg-danger">
                        {{ \App\Models\Helper::cartCount(auth()->id()) }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
            </a>
            <a href="{{route('user')}}" > <img src="{{ asset('images/logo/setting.png') }}" alt="setting" width="30" height="30"></a>
            <a href="{{route('auth.logout')}}"><button type="button" class="btn btn-outline-dark">Logout</button><a>

          @endguest
      </div>
  </div>
{{-- end header --}}


{{-- start nav --}}
<div class="sticky-top" >
  <header class="p-3 text-bg-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
      </a>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('home.index')}}" class="nav-link px-2 text-white">Home</a>
                </li>
                {{ \App\Models\Helper::getHeaderBrand()}}
                {{ \App\Models\Helper::getHeaderCategory()}}

                <li><a href="{{route('home.product_page')}}" class="nav-link px-2 text-white">Product</a></li>
                <li><a href="{{route('home.contact')}}" class="nav-link px-2 text-white">Contact Us</a></li>
                <li><a href="{{route('home.about')}}" class="nav-link px-2 text-white">About Us</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
  </div>

</header>
</div>
{{-- end nav --}}
