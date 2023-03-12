<body class="min-h-screen font-sans antialiased">
        @include('layouts.partials.header')
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

        <!-- Content -->
        @yield('content')
        
        </div>
    </body>
</html>
