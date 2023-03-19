@extends('layouts.app')

@section('content')


<div class="flex flex-row justify-center">
    <div class="basis-2/3 text-center ">
        <h1 class="mt-10 mb-2 text-2xl text-white">Update player's info</h1>

        <div class="md:w-2/3 lg:w-1/3 mx-auto text-left bg-gray-50 p-8 border rounded-lg">
            <form class="my-5" action="{{ route('players.update', $player) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name:</label>
                    <input type="text" id="name" name="name" value="{{old('name', $player->name)}}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="First name">
                    @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="surname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name:</label>
                    <input type="text" id="surname" name="surname" value="{{old('surname', $player->surname)}}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('surname') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Last name">
                    @error('surname')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="team_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Team</label>
                    <select id="team_id" name="team_id" class="@error('team_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="-1">Select team ...</option>
                        @foreach ($teams as $team)
                        <option value="{{$team->id}}" @if($team->id == $player->team->id) selected @endif >{{$team->name}}</option>
                        @endforeach
                    </select>
                    @error('team_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="position_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                    <select id="position_id" name="position_id" class="@error('position_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="-1">Select position ...</option>
                        @foreach ($positions as $position)
                        <option value="{{$position->id}}" @if($position->id == $player->position->id) selected @endif >{{$position->position}}</option>
                        @endforeach
                    </select>
                    @error('position_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of birth:</label>
                    <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $player->birth_date) }}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('birth_date') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" >
                    @error('birth_date')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a type="button" href="{{ url()->previous() }}" class="p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-4 border-cyan-300 my-5 ml-0 mr-auto">Back</a>

                    <button type="submit" class="p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-amber-600 hover:bg-amber-500 text-gray-100 rounded-lg focus:border-4 border-amber-300 my-5 ml-auto mr-0">Update player</button>
                </div>
            </form>
        </div>

    </div>

</div>


@endsection