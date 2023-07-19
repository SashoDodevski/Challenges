<div class="p-6 lg:p-8 bg-gray-100">


    <h1 class="my-8 text-2xl font-medium text-gray-900">
        Contacts list
    </h1>
    <div class="flex justify-between  mb-6">
        @livewire('contact-search-bar')

        <div class="flex align-baseline ml-auto mr-0">
            <label for="small" class="mt-auto block my-auto mr-3 text-xs font-medium text-gray-900 dark:text-white uppercase">Select number of<br/>contacts per page</label>
            <select wire:model="per_page" class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">
                        <button class="uppercase" wire:click="sortBy('name')">
                            <div class="flex items-center">
                                Name
                                <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </div>
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4">
                        <button class="uppercase" wire:click="sortBy('primary_country')">
                            <div class="flex items-center">
                                Primary Address
                                <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </div>
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4">
                        <button class="uppercase" wire:click="sortBy('secondary_country')">
                            <div class="flex items-center">
                                Secondary Address
                                <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </div>
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a class="flex" href="{{ route('users.show', $user) }}">
                            <div>
                                {{ $user->name }}<br />
                                <span class="text-gray-500">{{ $user->email }}</span>
                            </div>
                            @if ($user->profile_photo_path == null)

                            @else
                            <div class="ml-auto mr-0">
                                <img class="h-8 w-8 rounded-full object-cover" src="/storage/{{ $user->profile_photo_path }}" alt="{{ $user->name }}">
                                <br />
                            </div>
                            @endif

                        </a>
                    </th>
                    <td class="px-6 py-3">
                        str. {{ $user->primary_street }}, postcode {{ $user->primary_postcode }}, <br />
                        city of {{ $user->primary_city }},<br />{{ $user->primary_country }}
                    </td>
                    <td class="px-6 py-3">
                        str. {{ $user->secondary_street }}, postcode {{ $user->secondary_postcode }}, <br />
                        city of {{ $user->secondary_city }},<br />{{ $user->secondary_country }}
                    </td>

                    <td class="px-6 py-3 text-right">
                        @if (Auth::user()->role_id == '1')
                        <button type="button" wire:click="selectedUser({{ $user->id }})" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-5">
            {{ $users->links() }}
        </div>

        <!-- Delete Modal -->

        <x-dialog-modal wire:model="confirmDeletingUser">
            <x-slot name="title">
            </x-slot>
            <x-slot name="content">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="text-center mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this user?</h3>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('confirmDeletingUser', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="deleteUser({{ $confirmDeletingUser }})" wire:loading.attr="disabled">
                    {{ __('Yes, I am sure') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>


        <x-dialog-modal wire:model="confirmationMessage">
            <x-slot name="title">
            </x-slot>
            <x-slot name="content">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="text-center mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Account deleted!</h3>
            </x-slot>
            <x-slot name="footer">
            </x-slot>
        </x-dialog-modal>
    </div>

</div>