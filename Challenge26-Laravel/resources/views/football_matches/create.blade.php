@extends('layouts.app')

@section('content')


<div class="flex flex-row justify-center">
    <div class="basis-2/3 text-center">
        <h1 class="mt-10 mb-2 text-2xl text-white">Add MATCH</h1>

        <div class="md:w-2/3 lg:w-1/3 mx-auto text-left bg-gray-50 p-8 border rounded-lg">
            <form class="my-5" action="{{ route('football_matches.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="match_day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Match day:</label>
                    <input type="date" id="match_day" name="match_day" value="{{old('match_day')}}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('birth_date') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror">
                    @error('match_day')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="team_1_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home team</label>
                    <select id="team_1_id" name="team_1_id" class="@error('team_1_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="-1">Select team ...</option>
                        @foreach ($teams as $team)
                        <option value="{{$team->id}}" @if(old('team_1_id') !=null && old('team_1_id')==$team->id) selected @endif >{{$team->name}}</option>
                        @endforeach
                    </select>
                    @error('team_1_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="team_2_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guest team</label>
                    <select id="team_2_id" name="team_2_id" class="@error('team_2_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="-1">Select team ...</option>
                        @foreach ($teams as $team)
                        <option value="{{$team->id}}" @if(old('team_2_id') !=null && old('team_2_id')==$team->id) selected @endif >{{$team->name}}</option>
                        @endforeach
                    </select>
                    @error('team_2_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="goals_team_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of goals scored by Home team: (optional)</label>
                    <input type="number" id="goals_team_1" name="goals_team_1" value="{{old('goals_team_1')}}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('goals_team_1') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror">
                    @error('goals_team_1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="goals_team_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of goals scored by Guest team: (optional)</label>
                    <input type="number" id="goals_team_1" name="goals_team_2" value="{{old('goals_team_2')}}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('goals_team_2') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror">
                    @error('goals_team_2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a type="button" href="{{ url()->previous() }}" class="p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-4 border-cyan-300 my-5 ml-0 mr-auto">Back</a>

                    <button type="submit" class="p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-lime-600 hover:bg-lime-500 text-gray-100 rounded-lg focus:border-4 border-green-300 my-5 ml-auto mr-0">Add match</button>
                </div>
            </form>
        </div>

    </div>

</div>


@endsection