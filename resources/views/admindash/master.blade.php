<!DOCTYPE html>
<html lang="en">

@include('admindash.head')

<body>

    @include('admindash.header')
    @include('admindash.sidebar')


        <main>
            @yield('content')

        </main>


      @include('admindash.footer')

</body>

</html>
