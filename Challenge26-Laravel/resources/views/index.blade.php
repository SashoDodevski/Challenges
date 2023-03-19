@include('layouts.partials.header')

<body class="min-h-screen flex flex-col font-sans text-gray-900 antialiased">
    @include('layouts.navigation')
    <div class="sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white background_image">
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

        <div class="max-w-7xl mx-auto p-6 lg:p-8 flex flex-col ">

            <div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 lg:gap-8">
                    <a href="@auth {{ route('football_matches.index') }} @else # @endauth" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2" @if(!Auth::user()) data-modal-target="defaultModal" data-modal-toggle="defaultModal" @endif>
                        <div>
                            <div class="h-16 w-16 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <i class="fa-solid fa-futbol fa-4x"></i>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Football Matches</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                See the results of matches played and the schedule for the next period.
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-blue-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>

                    <a href="@auth {{ route('teams.index') }} @else # @endauth" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2" @if(!Auth::user()) data-modal-target="defaultModal" data-modal-toggle="defaultModal" @endif>
                        <div>
                            <div class="h-16 w-16 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <i class="fa-solid fa-people-group fa-4x"></i>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Football Teams</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Look at the teams playing in the league.
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-blue-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>

                    <a href="@auth {{ route('players.index') }} @else # @endauth" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2" @if(!Auth::user()) data-modal-target="defaultModal" data-modal-toggle="defaultModal" @endif>
                        <div>
                            <div class="h-16 w-16 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <i class="fa-solid fa-user fa-4x"></i>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Football Players</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Go trough all players playing in the league.
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-blue-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>

                </div>
            </div>


            <!-- Main modal -->
            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-xl md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Log in to see the content
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                You need to log in first to see the content.
                            </p>
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                Dont't have an account yet? Register.
                            </p>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 w-full justify-around">
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500">Log in</a>
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500">Register</a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</body>

</html>