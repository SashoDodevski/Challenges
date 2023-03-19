@include('layouts.partials.header')


    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 background_image">
        @include('layouts.navigation')


        @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-center text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="p-4 mb-4 text-sm text-center text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif

        <!-- Content -->
        @yield('content')

    </div>

    @include('layouts.partials.footer')