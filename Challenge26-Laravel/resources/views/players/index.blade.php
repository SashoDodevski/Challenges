@extends('layouts.app')

@section('content')


<div class="flex flex-row justify-center">
    <div class="basis-2/3 text-center">
        <h1 class="mt-10 text-2xl text-white">Football Players</h1>

        @if(Auth::check() && Auth::user()->isAdmin())
        <div class="text-start">
            <a type="button" href="{{ route('players.create')}}" class="text-sm p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-emerald-600 hover:bg-emerald-500 text-gray-100 rounded-lg border-white border-2 focus:border-2 mt-5 ml-0 mr-auto">Add new player</a>
        </div>
        @endif


        <div class="relative my-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <hr>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Player name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Team
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Player position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date of birth
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <a href="{{ route('players.show', $player) }}">
                                {{ $player->name }} {{ $player->surname }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('teams.show', $player->team) }}">
                                {{ $player->team->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $player->position->position }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $player->birth_date }}
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>


@endsection