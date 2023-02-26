<nav x-data="{ open: false }" class="bg-primary border-gray-200 px-2 sm:px-0 dark:bg-gray-900">
    <nav class="bg-primary border-gray-200 px-2 sm:px-1 dark:bg-gray-900">
        <div class="flex flex-wrap mx-8 my-2 lg:my-0">
            <div class="flex">
                <a href="https://brainster.co/" target="_blank" class="flex items-center">
                    <img src="{{ asset('css/images/brainster-logo.png') }}" class="h-6 mr-3 sm:h-9" alt="Brainster Logo" />
                </a>
                <a href="{{ route('index') }}" class="self-center text-xl font-semibold whitespace-nowrap dark:text-white hidden md:block">Brainster Academies Projects</a>
            </div>

            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 ml-auto mr-0" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto ml-auto mr-0" id="navbar-default">
                <div class="h-full flex">
                    <ul class="flex flex-col p-4 border border-gray-100 rounded-lg bg-primary md:flex-row md:space-x-8 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 my-auto">


                        @if (Auth::guest())

                        <li>
                            <a href="https://brainster.co/full-stack/" target="_blank" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Academy <br>for Development</a>
                        </li>
                        <li>
                            <a href="https://brainster.co/marketing/" target="_blank" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Academy <br>for Marketing</a>
                        </li>
                        <li>
                            <a href="https://brainster.co/graphic-design/" target="_blank" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Academy <br>for Design</a>
                        </li>
                        <li>
                            <a href="https://blog.brainster.co/" target="_blank" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Brainster <br>Blog</a>
                        </li>
                        <li>
                            <button type="button" href="" data-modal-target="hireStudentModal" data-modal-toggle="hireStudentModal" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white text-left">Hire <br>Student</button>
                        </li>
                        @else
                        <li>
                            <a href="{{route('dashboard')}}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white ">
                                Dashboard
                            </a>
                        </li>
                        @endif


                    </ul>
                </div>
            </div>


            <div class="sm:flex sm:flex-row w-full md:block md:w-auto ml-auto lg:ml-0 mr-0 md:border-l-2 md:border-r-2 border-dotted border-gray-300 px-3 my-auto">
                <ul class="flex flex-row py-4 bg-primary md:space-x-8 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 float-right my-auto">

                    @auth
                    <div class="hidden sm:flex sm:items-center bg-primary">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 bg-primary">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else

                    @if(Route::is(['index', 'register']))
                    <li>
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white py-2 px-1">Log in</a>
                    </li>
                    @endif
                    @if(Route::is(['index', 'login']))
                    <li>
                        <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white py-2 px-1">Register</a>
                    </li>
                    @endif
                    @endauth

                </ul>
            </div>



            <!-- Main modal -->
            <div id="hireStudentModal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-5/12 h-full max-w-2xl md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Hire Student
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="hireStudentModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="flex grow flex-col justify-center items-center">
                            <p class="mt-3 ml-6 text-gray-700 mr-auto">Please fill in the form below and we will contact you very soon</p>
                            <form method="POST" action="{{ route('company.firstEmail') }}" class="w-11/12 mx-auto my-3">
                                @csrf

                                <!-- Company -->
                                <div>
                                    <x-input-label for="company" :value="__('Company name')" />
                                    <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" required autofocus autocomplete="company" />
                                    <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email address')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Contact phone -->
                                <div class="mt-4">
                                    <x-input-label for="phone" :value="__('Contact phone')" />
                                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Send</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </nav>
</nav>