@include('layouts.partials.header')

<body class="min-h-screen flex flex-col font-sans text-gray-900 antialiased">
        @include('layouts.navigation')
        <div class="grow flex sm:justify-center sm:items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

            <div class="w-full sm:max-w-md mx-auto my-auto px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
