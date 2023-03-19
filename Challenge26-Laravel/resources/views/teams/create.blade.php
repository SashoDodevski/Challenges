@extends('layouts.app')

@section('content')


<div class="flex flex-row justify-center">
    <div class="basis-2/3 text-center">
    <h1 class="mt-10 mb-2 text-2xl text-white">Add FOOTBALL TEAM</h1>

        <div class="md:w-2/3 lg:w-1/3 mx-auto text-left bg-gray-50 p-8 border rounded-lg">
            <form class="my-5" action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Team name:</label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Team name">
                    @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="foundation_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year of foundation:</label>
                    <input type="number" id="foundation_year" name="foundation_year" value="{{old('foundation_year')}}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('foundation_year') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror">
                    @error('foundation_year')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image:</label>
                    <input type="file" name="image" id="image" class="text-sm @error('image') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror rounded w-full">
                    @error('image')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-between">
                    <a type="button" href="{{ url()->previous() }}" class="p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-4 border-cyan-300 my-5 ml-0 mr-auto">Back</a>

                    <button type="submit" class="p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-lime-600 hover:bg-lime-500 text-gray-100 rounded-lg focus:border-4 border-green-300 my-5 ml-auto mr-0">Add team</button>
                </div>
            </form>
        </div>

    </div>

</div>


@endsection