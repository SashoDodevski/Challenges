<nav class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>

        <div class="flex">
            <img src="{{url('/css/images/logo.jpg')}}" class="h-14 mr-3" alt="Flowbite Logo" />
            <a href="{{ route('home') }}" class="flex items-center">
                <p class="text-md font-medium text-center text-gray-800 dark:text-gray-800 inline-block p-2.5 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300   @if(str_contains($_SERVER['REQUEST_URI'],'/home'))  border-red-600 @else border-transparent @endif">Admin panel</p>
            </a>
            <a href="{{ route('applications.index') }}" class="flex items-center">
                <p class="text-sm font-medium text-center text-gray-500 dark:text-gray-400 inline-block p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(str_contains($_SERVER['REQUEST_URI'],'/applications'))  border-red-600 @else border-transparent @endif">Applications</p>
            </a>
            <a href="{{ route('contacts.index') }}" class="flex items-center">
                <p class="text-sm font-medium text-center text-gray-500 dark:text-gray-400 inline-block p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(str_contains($_SERVER['REQUEST_URI'],'/contacts'))  border-red-600 @else border-transparent @endif">Messages</p>
            </a>
            </a>
            <a href="{{ route('volunteers.index') }}" class="flex items-center">
                <p class="text-sm font-medium text-center text-gray-500 dark:text-gray-400 inline-block p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300  @if(str_contains($_SERVER['REQUEST_URI'],'/volunteers')) border-red-600 @else border-transparent @endif">Volunteer requests</p>
            </a>
        </div>

        <div class="text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <ul class="flex flex-wrap -mb-px">
                <li class="mr-2">
                    <a type="button" id="btn_donations" href="{{ route('donations.index') }}" class="inline-block p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(str_contains($_SERVER['REQUEST_URI'],'/donations')) border-red-600 @else border-transparent @endif">Donations</a>
                </li>
                <li class="mr-2">
                    <a type="button" id="btn_partners" href="{{ route('partners.index') }}" class="inline-block p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(str_contains($_SERVER['REQUEST_URI'],'/partners')) border-red-600 @else border-transparent @endif">Partners</a>
                </li>
                <li>
                    <button id="btn_blogs" data-dropdown-toggle="blogsDropdownNavbar" class="flex items-center justify-between w-full p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(str_contains($_SERVER['REQUEST_URI'],'/blogs')) border-red-600 @elseif($_SERVER['REQUEST_URI'] == '/blogCategories') border-red-600 @else border-transparent @endif">Blogs <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="blogsDropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="blogsDropdownLargeButton">
                            <li>
                                <a href="{{ route('blogs.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white btn_blogs">Blogs</a>
                            </li>
                            <li>
                                <a href="{{ route('blogCategories.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white btn_blogs">Blog Categories</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mr-2">
                    <a type="button" id="btn_videos" href="{{ route('videos.index') }}" class="inline-block p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @if(str_contains($_SERVER['REQUEST_URI'],'/videos')) border-red-600 @else border-transparent @endif">Videos</a>
                </li>
                <li class="mr-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Sign Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</nav>