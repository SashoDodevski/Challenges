@extends('layouts.app')

@section('content')

<div class="flex flex-row justify-center pb-10">
    <div class="basis-2/3 text-left">

        @if(Auth::check() && Auth::user()->isAdmin())
        <div class="flex flex-row justify-around">
            <div class="text-start">
                <a type="button" href="{{ route('teams.create')}}" class="text-sm p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-emerald-600 hover:bg-emerald-500 text-gray-100 rounded-lg focus:border-2 border-emerald-300 mt-5 ml-0 mr-auto">Add new team</a>
            </div>
            <div class="text-start">
                <a type="button" href="{{ route('teams.edit', $team)}}" class="text-sm p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-amber-600 hover:bg-amber-500 text-gray-100 rounded-lg focus:border-2 border-amber-300 mt-5 ml-0 mr-auto">Edit team</a>
            </div>
            <div class="text-start">
                <button type="button" class="text-sm p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-rose-700/90 hover:bg-rose-500 text-gray-100 rounded-lg focus:border-2 border-rose-300 mt-5 ml-0 mr-auto" data-modal-target="delete-popup-modal" data-modal-toggle="delete-popup-modal">Delete team</button>
            </div>
        </div>
        @endif

        <div class="flex flex-col w-full mx-auto my-5 border rounded-lg p-5 bg-gray-50">
            <div class="w-1/2 mx-auto text-center">
                <img class="object-cover w-full rounded-t-lg md:w-full md:rounded-lg my-5" src="{{ asset('storage/'.$team->image) }}" alt="image:{{ $team->name}}">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $team->name}}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Year of foundation: {{ $team->foundation_year}}</p>
            </div>
        </div>

        <div class="flex flex-col w-full mx-auto my-5 border rounded-lg p-5 bg-gray-50">
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Team players:</h5>

            <div class="relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <hr>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Player name
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
                                {{ $player->name }} {{ $player->surname }}
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

        <div class="flex flex-col w-full mx-auto my-5 border rounded-lg p-5 bg-gray-50">
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Matches:</h5>

            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <button type="button" id="btn_match_results" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg dark:text-blue-500 dark:border-blue-500" aria-current="page">Match results</button>
                    </li>
                    <li class="mr-2">
                        <button type="button" id="btn_match_fixtures" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Fixtures</button>
                    </li>
                </ul>
            </div>

            <div id="match_results">
                @foreach ($match_results as $match_result)
                <div class="flex my-2">
                    <p class="h-full my-auto text-sm font-semibold">{{ $match_result->match_day }}</p>
                    <div class="ml-6 w-3/4">
                        <div class="flex grow">
                        <a href="{{ route('teams.show', $match_result->teamObject($match_result->team_1_id)) }}"><img class="w-6" src="{{ asset('storage/'.$match_result->teamObject($match_result->team_1_id)->image) }}" alt="image:{{ $team->name}}"></a>
                            <div class="flex justify-between grow ml-3">
                                <p><a href="{{ route('teams.show', $match_result->teamObject($match_result->team_1_id)) }}">{{ $match_result->teamName($match_result->team_1_id) }} </a></p>
                                <p class="font-bold">{{ $match_result->goals_team_1 }}</p>
                            </div>
                        </div>
                        <div class="flex grow">
                        <a href="{{ route('teams.show', $match_result->teamObject($match_result->team_2_id)) }}"><img class="w-6" src="{{ asset('storage/'.$match_result->teamObject($match_result->team_2_id)->image) }}" alt="image:{{ $team->name}}"></a>
                            <div class="flex justify-between grow ml-3">
                                <p><a href="{{ route('teams.show', $match_result->teamObject($match_result->team_2_id)) }}">{{ $match_result->teamName($match_result->team_2_id) }} </a></p>
                                <p class="font-bold">{{ $match_result->goals_team_2 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>

            <div id="match_fixtures" class="hidden">
                @foreach ($match_fixtures as $match_fixture)
                <div class="flex my-2">
                    <p class="h-full my-auto text-sm font-semibold">{{ $match_fixture->match_day }}</p>
                    <div class="ml-6 w-3/4">
                        <div class="flex grow">
                        <a href="{{ route('teams.show', $match_fixture->teamObject($match_fixture->team_1_id)) }}"><img class="w-6" src="{{ asset('storage/'.$match_fixture->teamObject($match_fixture->team_1_id)->image) }}" alt="image:{{ $team->name}}"></a>
                            <div class="flex justify-between grow ml-3">
                                <p><a href="{{ route('teams.show', $match_fixture->teamObject($match_fixture->team_1_id)) }}">{{ $match_fixture->teamName($match_fixture->team_1_id) }} </a></p>
                                <p class="font-bold">{{ $match_fixture->goals_team_1 }}</p>
                            </div>
                        </div>
                        <div class="flex grow">
                        <a href="{{ route('teams.show', $match_fixture->teamObject($match_fixture->team_2_id)) }}"><img class="w-6" src="{{ asset('storage/'.$match_fixture->teamObject($match_fixture->team_2_id)->image) }}" alt="image:{{ $team->name}}"></a>
                            <div class="flex justify-between grow ml-3">
                                <p><a href="{{ route('teams.show', $match_fixture->teamObject($match_fixture->team_2_id)) }}">{{ $match_fixture->teamName($match_fixture->team_2_id) }} </a></p>
                                <p class="font-bold">{{ $match_fixture->goals_team_2 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>

        </div>
    </div>



    <div id="delete-popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this team?</h3>
                    <div class="flex justify-around">
                        <form action="{{ route('teams.destroy', $team)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-modal-hide="delete-popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                        </form>
                        <button data-modal-hide="delete-popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $("#btn_match_results").click(function() {
            $("#btn_match_results").addClass('text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500'),
                $("#btn_match_results").removeClass('border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'),
                $("#btn_match_results").attr('aria-current', 'page')
            $("#btn_match_fixtures").addClass('border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'),
                $("#btn_match_fixtures").removeClass('text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500'),
                $("#btn_match_fixtures").removeAttr('aria-current', 'page'),
                $("#match_results").removeClass('hidden'),
                $("#match_fixtures").addClass('hidden')
        });

        $("#btn_match_fixtures").click(function() {
            $("#btn_match_results").removeClass('text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500'),
                $("#btn_match_results").addClass('border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'),
                $("#btn_match_results").removeAttr('aria-current', 'page')
            $("#btn_match_fixtures").removeClass('border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'),
                $("#btn_match_fixtures").addClass('text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500'),
                $("#btn_match_fixtures").attr('aria-current', 'page'),
                $("#match_results").addClass('hidden')
            $("#match_fixtures").removeClass('hidden')
        });
    })
</script>
@endsection