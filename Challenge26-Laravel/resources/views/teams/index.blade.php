@extends('layouts.app')

@section('content')


    <div class="flex flex-row justify-center">
        <div class="basis-2/3 text-center">
            <h1 class="mt-10 text-2xl text-white">Football Teams</h1>

            @if(Auth::check() && Auth::user()->isAdmin())
            <div class="text-start">
                <a type="button" href="{{ route('teams.create')}}" class="text-sm p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-emerald-600 hover:bg-emerald-500 text-gray-100 rounded-lg border-white border-2 focus:border-2 mt-5 ml-0 mr-auto">Add new team</a>
            </div>
            @endif


            <div class="grid grid-cols-3 md:grid-cols-4 gap-4 lg:gap-6 ">
            @foreach($teams as $team)
                <div class="flex flex-col mx-auto my-5 border rounded-lg w-full motion-safe:hover:scale-[1.05] transition-all duration-250 bg-gray-50">
                    <div class="w-full bg-gray-50">
                    <a href="{{ route('teams.show', $team)}}" class="w-full"><img class="object-cover w-full rounded-t-lg" src="{{ asset('storage/'.$team->image) }}" alt=""></a>
                    </div>
                    <div class="flex flex-col p-4 leading-normal text-start w-full bg-gray-50">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="{{ route('teams.show', $team)}}">{{ $team->name}}</a></h5>
                        <p class="mb-3 font-normal text-sm text-gray-700 dark:text-gray-400">Year of foundation: {{ $team->foundation_year}}</p>
                    </div>

                </div>

            @endforeach
            </div>
        </div>

    </div>


@endsection