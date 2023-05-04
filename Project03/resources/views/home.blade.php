@extends('layouts.app')

@section('content')
<section class="flex bg-gray-50 dark:bg-gray-900 grow">
    <div class="flex flex-col items-center justify-center px-6 pb-8 mx-auto my-auto lg:py-0 self-center">

        <div class="w-full bg-white rounded-lg shadow-lg dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 text-center">
            <div class="p-6 space-y-1 md:space-y-4 sm:pt-6 sm:pb-12">
                <img class="w-20 h-20 mx-auto" src="{{url('/css/images/logo.jpg')}}" alt="logo">
                <a type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800 mb-6 sm:w-8/12 mx-auto" href="{{ route('applications.index') }}">Applications</a>
                <a type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800 mb-6 sm:w-8/12 mx-auto" href="{{ route('contacts.index') }}">Messages</a>
                <a type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800 mb-6 sm:w-8/12 mx-auto" href="{{ route('volunteers.index') }}">Volunteer requests</a>
                <hr class="text-gray-300 p-0 m-0">
                <a type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800 mb-6 sm:w-8/12 mx-auto" href="{{ route('donations.index') }}">Donations</a>
                <a type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800 mb-6 sm:w-8/12 mx-auto" href="{{ route('partners.index') }}">Partners</a>
                <a type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800 mb-6 sm:w-8/12 mx-auto" href="{{ route('blogs.index') }}">Blogs</a>
                <a type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800 mb-6 sm:w-8/12 mx-auto" href="{{ route('videos.index') }}">Videos</a>

            </div>
        </div>
    </div>
</section>
@endsection