@extends('layouts.app')

@section('content')


<div class="flex flex-row justify-center">
    <div class="basis-2/3 text-center">
        <h1 class="mt-10 text-2xl text-white">Football matches</h1>

        @if(Auth::check() && Auth::user()->isAdmin())
        <div class="text-start">
            <a type="button" href="{{ route('football_matches.create')}}" class="text-sm p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-emerald-600 hover:bg-emerald-500 text-gray-100 rounded-lg border-white border-2 focus:border-2 mt-5 ml-0 mr-auto">Add new match</a>
        </div>
        @endif

        <div class="flex flex-col w-full mx-auto my-5 border rounded-lg p-5 bg-gray-50">

            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 mb-3">
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
                <a href="{{ route('football_matches.show', $match_result) }}">
                    <div class="flex my-2">
                        <p class="h-full my-auto text-sm font-semibold">{{ $match_result->match_day }}</p>
                        <div class="ml-6 w-3/4">
                            <div class="flex grow">
                                <img class="w-6" src="{{ asset('storage/'.$match_result->teamObject($match_result->team_1_id)->image) }}" alt="image:{{ $match_result->teamName($match_result->team_1_id) }}">
                                <div class="flex justify-between grow ml-3">
                                    <p>{{ $match_result->teamName($match_result->team_1_id) }}</p>
                                    <p class="font-bold">{{ $match_result->goals_team_1 }}</p>
                                </div>
                            </div>
                            <div class="flex grow">
                                <img class="w-6" src="{{ asset('storage/'.$match_result->teamObject($match_result->team_2_id)->image) }}" alt="image:{{ $match_result->teamName($match_result->team_2_id) }}">
                                <div class="flex justify-between grow ml-3">
                                    <p>{{ $match_result->teamName($match_result->team_2_id) }}</p>
                                    <p class="font-bold">{{ $match_result->goals_team_2 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <hr>
                @endforeach
            </div>

            <div id="match_fixtures" class="hidden">
                @foreach ($match_fixtures as $match_fixture)
                <a href="{{ route('football_matches.show', $match_fixture) }}">
                    <div class="flex my-2">
                        <p class="h-full my-auto text-sm font-semibold">{{ $match_fixture->match_day }}</p>
                        <div class="ml-6 w-3/4">
                            <div class="flex grow">
                                <img class="w-6" src="{{ asset('storage/'.$match_result->teamObject($match_result->team_1_id)->image) }}" alt="image:{{ $match_result->teamName($match_result->team_1_id) }}">
                                <div class="flex justify-between grow ml-3">
                                    <p>{{ $match_fixture->teamName($match_fixture->team_1_id) }}</p>
                                    <p class="font-bold">{{ $match_fixture->goals_team_1 }}</p>
                                </div>
                            </div>
                            <div class="flex grow">
                                <img class="w-6" src="{{ asset('storage/'.$match_result->teamObject($match_result->team_2_id)->image) }}" alt="image:{{ $match_result->teamName($match_result->team_2_id) }}">
                                <div class="flex justify-between grow ml-3">
                                    <p>{{ $match_fixture->teamName($match_fixture->team_2_id) }}</p>
                                    <p class="font-bold">{{ $match_fixture->goals_team_2 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <hr>
                @endforeach
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