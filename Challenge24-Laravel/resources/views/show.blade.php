@extends('layouts.app')

@section('title', 'Project')

@section('content')
<section class="bg-white dark:bg-gray-900 flex grow flex-col justify-center items-center">
    <div class="py-8 mx-auto max-w-screen-xl sm:py-16 lg:px-24">

    <section class="bg-white dark:bg-gray-900 ">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h4 class="max-w-2xl mb-4 text-2xl font-semibold tracking-tight leading-none md:text-3xl xl:text-4xl dark:text-white first-letter:capitalize">{{ $project->title }}</h4>
            <h5 class="max-w-2xl mb-4 text-xl font-semibold tracking-tight leading-none md:text-xl xl:text-xl dark:text-white">{{ $project->subtitle }}</h5>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">{{ $project->description }}</p>
            <a type="button" href="{{ $project->url }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-4 py-2 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900" target="_blank">Go to Project</a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="{{ $project->image }}" alt="Image">
        </div>                
    </div>
</section>
    </div>
</section>
@endsection