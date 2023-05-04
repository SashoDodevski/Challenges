@extends('layouts.app')

@section('content')


<div class="flex flex-row justify-center grow bg-gray-50">
    <div class="basis-2/3 text-center mb-10">
    <h1 class="mt-10 mb-2 text-2xl text-black">Edit Blog</h1>

        <div class="md:w-2/3 lg:w-2/4 mx-auto text-left bg-gray-50 p-8 border rounded-lg">
            <form class="my-5" action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:</label>
                    <input type="text" id="title" name="title" value="{{old('title', $blog->title)}}" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('title') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Enter title">
                    @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="category_id" name="category_id" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('category_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror">
                        <option value="-1">Select category ...</option>
                        @foreach ($blogCategories as $category)
                        <option value="{{$category->id}}" @if(old('category_id', $blog->category_id) > 0 && old('category_id', $blog->category_id)==$category->id) selected @endif>{{$category->category}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text:</label>
                    <textarea rows="4" type="text" id="text" name="text" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('text') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Enter text here...">{{old('text', $blog->text)}}</textarea>
                    @error('text')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
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
                    <a type="button" href="{{ url()->previous() }}" class="w-20 text-center p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-4 border-cyan-300 my-5 ml-0 mr-auto">Back</a>

                    <button type="submit" class="w-20 text-center p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-lime-600 hover:bg-lime-500 text-gray-100 rounded-lg focus:border-4 border-green-300 my-5 ml-auto mr-0">Update</button>
                </div>
            </form>
        </div>

    </div>

</div>


@endsection