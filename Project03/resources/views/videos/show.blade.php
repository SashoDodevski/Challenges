@extends('layouts.app')

@section('content')

<div class="flex flex-row justify-center pb-10 grow bg-gray-50">
    <div class="basis-2/3 text-left">

        <div class="flex flex-row justify-around">
            <div class="text-start">
            <a type="button" href="{{ route('videos.index') }}" class="w-32 text-center p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-4 border-cyan-300 my-5 ml-0 mr-auto">Back</a>
            </div>
            <div class="text-start">
                <a type="button" href="{{ route('videos.edit', $video)}}" class="w-32 text-center text-sm p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-amber-600 hover:bg-amber-500 text-gray-100 rounded-lg focus:border-4 border-amber-300 mt-5 ml-0 mr-auto">Edit</a>
            </div>
            <div class="text-start">
                <button type="button" class="w-32 text-center text-sm p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-rose-700/90 hover:bg-rose-500 text-gray-100 rounded-lg focus:border-4 border-rose-300 mt-5 ml-0 mr-auto" data-modal-target="delete-popup-modal" data-modal-toggle="delete-popup-modal">Delete</button>
            </div>
        </div>

        <div class="flex flex-col w-full mx-auto my-5 border rounded-lg p-5 bg-gray-50">
            <div class="w-1/2 mx-auto text-center">
                <img class="object-cover w-full rounded-t-lg md:w-full md:rounded-lg my-5" src="{{ asset('storage/'.$video->image) }}" alt="image:{{ $video->name}}">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $video->name}}</h5>
                <p class="mb-3 text-sm text-gray-700 dark:text-gray-400">Video URL: <br><a href="{{ $video->video_url}}" class="text-indigo-700 dark:text-indigo-400 hover:border-b hover:border-indigo-700">{{ $video->video_url}}</a></p>
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
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this video?</h3>
                    <div class="flex justify-around">
                        <form action="{{ route('videos.destroy', $video)}}" method="POST">
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
