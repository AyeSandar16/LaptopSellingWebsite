<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="{{ url('css/style.css') }}">



    <style>
        div .product-img .button-head a{
            text-decoration: none;
            color: black;
        }
        .product-img .button-head:hover a{
            color: blueviolet;
        }
        div  .product-content a{
            text-decoration: none;
            color: black;
        }
        div  .product-content:hover a{
            color: blueviolet;
        }
        .product-img img {
            display: block;
            /* width: 100%;
            height: auto; */
            transition: transform 0.3s ease;
        }
        .product-img a:hover img{
            transform: scale(1.1);
            background-color: gray;
        }
        .wishlist-form {
        position: relative; /* Ensure position context for absolute positioning */
        display: inline-block; /* Allow the form to size based on content */
        }

        .wishlist-btn {
            background: none;
            border: none;
            cursor: pointer;
        }

        .wishlist-popup {
            display: none;
            position: absolute;
            top: 100%; /* Position below the button */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Center horizontally */
            padding: 10px;
            background-color: #fff;
            border: 1px solid #811d1d;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            z-index: 1000; /* Ensure it's above other content */
        }

        .wishlist-popup.active {
            display: block;
        }

    </style>

</head>
