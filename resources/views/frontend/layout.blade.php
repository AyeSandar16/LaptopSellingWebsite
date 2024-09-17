<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('frontend.head')

<body class="font-sans antialiased dark:bg-black dark:text-white position-relative">

  @include('frontend.header')
  @yield('content')

@include('frontend.footer')

</body>

</html>
