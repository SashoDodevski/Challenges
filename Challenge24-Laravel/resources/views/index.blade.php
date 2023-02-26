@extends('layouts.app')

@section('title', 'Home')

@section('content')
@include('layouts/banner')

<section class="bg-white dark:bg-gray-900">
    <div class="py-8">

        <div class="space-y-6 md:grid md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-4 w-8/12 mx-auto">

            @foreach($projects as $project)
            <div class="p-4 card">
                <a href="{{ route('projects.show', $project) }}">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto">
                        <img class="rounded-t-lg" src="{{ $project->image }}" alt="" />
                        <div class="p-5">
                            <a href="{{ route('projects.show', $project) }}">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white first-letter:capitalize">{{ $project->title }}</h5>
                            </a>
                            <p class="font-16 font-semibold my-3 text-gray-500 text-sm">{{ $project->subtitle }}</p>

                            <p class="mb-3 font-small text-gray-700 dark:text-gray-400 truncate">{{ $project->description }}</p>
                            <a type="button" href="{{ $project->url }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-4 py-2 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900" target="_blank">Go to Project</a>

                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection