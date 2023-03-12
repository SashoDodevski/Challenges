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

<div class="flex flex-row justify-center pb-10">
    <div class="basis-2/3 text-left">
        <div class="text-end">
            <a type="button" href="{{ route('index') }}" class="p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-2 border-cyan-300 mt-5 ml-0 mr-auto text-sm">Back</a>
        </div>

        <div class="flex flex-col w-full mx-auto my-5 border rounded-lg p-5 bg-gray-50">
            <div class="text-end">
                <p class="text-sm text-gray-500">{{$forum->category->name}} | {{$forum->user->name}}</p>
            </div>
            <div class="w-1/2 mx-auto">
                <img class="object-cover w-full rounded-t-lg md:w-full md:rounded-lg my-5" src="{{ asset('storage/'.$forum->image) }}" alt="image:{{ $forum->title}}">
                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $forum->title}}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $forum->description}}</p>
            </div>
        </div>


        @if (!$comments->isEmpty())
        <p class="mt-10 text-xl text-red-900 my-5">Comments:</p>
        @else
        <p class="mt-10 text-lg text-red-900 my-5">Be the first to leave a comment!</p>
        @endif


        @auth
        <div class="text-start">
            <a type="button" href="{{ route('comments.create', $forum)}}" class="text-sm p-1.5 pl-5 pr-5 transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-2 border-cyan-300 mt-5 ml-0 mr-auto">Add new comment:</a>
        </div>
        @endauth

        @foreach($comments as $comment)
        <div class="flex flex-col w-full mx-auto my-5 border rounded-lg bg-gray-50 px-5 py-3 ">

            <div class="flex justify-between">
                <p class="text-xs">{{ $comment->user->name }} says:</p>
                <p class="text-xs">{{ $comment->created_at }}</p>
            </div>
            <div class="text-sm p-2 border rounded-lg my-2 bg-gray-50">
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $comment->comment }}</p>
            </div>
            @auth
            @if(Auth::user()->isAdmin() || $comment->user_id == Auth::id())
            <div class="flex">
                <div class="mr-2">
                    <a href="{{ route('comments.edit', [$forum, $comment]) }}"><i class="fa-regular fa-pen-to-square fa-sm"></i></a>
                </div>
                <div class="mr-2">
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fa-solid fa-trash-can fa-sm"></i></button>
                    </form>
                </div>
            </div>
            @endif
            @endauth
        </div>
        @endforeach


    </div>
</div>
@endsection