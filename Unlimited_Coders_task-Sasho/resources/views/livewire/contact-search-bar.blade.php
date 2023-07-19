<div class="mt-1 w-5/12 relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
    </div>
    <input wire:model="query" wire:keydown.escape="resetSearch" wire:keydown.arrow-up="decrementHighlight" wire:keydown.arrow-down="incrementHighlight" wire:keydown.enter="selectContact" type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for contacts">

    <!-- Dropdown menu -->
    <div wire:loading class="z-10 absolute w-full t-6 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Searching...</a>
            </li>
        </ul>
    </div>

    @if(!empty($query))
    <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="resetSearch"></div>
    @if (!empty($users['0']))
    <div id="dropdown" class="z-10 absolute w-full t-6 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            @foreach ($users as $i => $user)
            <li>
                <a href="{{ route('users.show', $user) }}">
                <div class="flex px-4 py-2 {{ $highlightIndex === $i ? 'bg-gray-100' : '' }}">

                        <p class="my-auto hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"> {{ $user['name']   }}
                        </p>


                    @if (empty($user['profile_photo_path']))
                    @else

                        <img class="h-8 w-8 rounded-full object-cover ml-auto mr-0" src="/storage/{{ $user->profile_photo_path }}" alt="{{ $user->name }}">
                        <br />

                    @endif

                </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <div id="dropdown" class="z-10 absolute w-full t-6 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
                <p class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">No results...</p>
            </li>
        </ul>
    </div>
    @endif
    @endif

</div>