@include('layouts.partials.header')

<body class="min-h-screen flex flex-col">
    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <!-- Session messages -->
    @if(Session::has('success'))
        <div class="p-4 text-sm text-center text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="p-4 text-sm text-center text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif

    <!-- Content -->
    @yield('content')

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @include('layouts.partials.scripts')
    @yield('scripts')
</body>

</html>