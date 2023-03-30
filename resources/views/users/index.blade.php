<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Document</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <a class="navbar-brand" href="#">Small Business</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if(Session::has('Session1'))d-none @endif" href="{{ route('users.create') }}">Sign In</a>
                </li>
                @if(Session::has('Session1'))
                <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Sign Out</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container" id="index" class="min-vw-100 mx-0">
        <div class="row">
            <div class="col-10 offset-1 mt-5">
                <h1 class="mt-3">The Small Business</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit voluptas porro nihil dolorem tempora placeat incidunt natus eaque quia ducimus.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                @if(Session::has('Session1'))
                <h4>Welcome {{ $userNEW['name'] }}</h4>
                @else
                <h4>Welcome</h4>
                @endif
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil sapiente at beatae minus nesciunt eos repudiandae voluptate nostrum, cumque necessitatibus vitae illo aperiam error maiores. Nihil non deleniti dolorem iusto similique laborum, sequi tenetur itaque.</p>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>