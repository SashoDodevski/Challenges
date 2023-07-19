    <div class="flex min-h-screen">
        <aside id="sidebar-multi-level-sidebar" class="left-0 z-40 w-64 h-100 top-0 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <x-application-logo class="block h-12 w-auto" />
                <ul class="space-y-2 font-medium mt-5">
                    <li>
                        <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ml-3">User profile: <br /> <span class="font-semibold">{{ $user->name }}</span></span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="w-full flex flex-col overflow-hidden">
            <div class="px-20 py-12">
                @if ($user->profile_photo_path)
                <img class="w-60 h-60 rounded-full" src="/storage/{{ $user->profile_photo_path }}" alt="{{ $user->name }}">
                @endif
                <h2 class="font-bold text-2xl mt-10 mb-6">{{$user->name}}</h2>
                <p class="text-xl">{{$user->email}}</p>
                <div class="flex">
                    <div>
                        <p class="text-md mt-5 font-semibold underline">Primary address: </p>
                        <p class="text-md">str. {{ $user->primary_street }}, postcode {{ $user->primary_postcode }}, <br />
                            city of {{ $user->primary_city }},<br />{{ $user->primary_country }}</p>
                    </div>
                    <div class="ml-12">
                        <p class="text-md mt-5 font-semibold underline">Secondary address: </p>
                        <p class="text-md">str. {{ $user->secondary_street }}, postcode {{ $user->secondary_postcode }}, <br />
                            city of {{ $user->secondary_city }},<br />{{ $user->secondary_country }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>