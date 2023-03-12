@extends('layouts.app')

@section('content')

@if(Session::has('success'))
<div class="p-4 mb-4 text-sm text-center text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    {{ Session::get('success') }}
</div>
@endif
@if(Session::has('error'))
<div class="p-4 mb-4 text-sm text-center text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    {{ Session::get('error') }}
</div>
@endif
<div class="flex flex-row justify-center my-auto">
    <div class="w-2/3 my-2">
        <div class="text-end">
            <a type="button" href="{{ route('forums.show', $forum) }}" class="p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-2 border-cyan-300 mt-5 ml-0 mr-auto text-sm">Back</a>
        </div>
    </div>
</div>
<div class="flex flex-row justify-center my-auto">
    <div class="w-2/3 my-20">
        <div class="border rounded-lg p-5 bg-gray-50">
            <form action="{{ route('comments.update', [$forum, $comment]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add new comment:</label>
                    <textarea rows="4" type="text" id="comment" name="comment" class="@error('comment') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write Your comment here...">{{old('comment', $comment->comment)}}</textarea>

                    @error('comment')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="text-xs p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-2 border-cyan-300 ml-0 mr-auto">Update</button>

            </form>
        </div>
    </div>
</div>
@endsection