<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/2acadc57f5.js" crossorigin="anonymous"></script>
    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('css')

    <title>@yield('title')</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row banner w-full text-white">
            <div class="col d-flex flex-column p-0 background-effect">
                <div class="row">
                    @include('layouts.navbar')
                </div>
                <div class="row d-flex flex-column text-center my-auto">
                    <div class="col-4 offset-4">
                        @yield('banner')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4 offset-4 py-5">
            @yield('content')
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>