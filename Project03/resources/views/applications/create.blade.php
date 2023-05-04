@extends('layouts.app')

@section('content')


<div class="flex flex-row justify-center grow bg-gray-50">
    <div class="basis-2/3 text-center mb-10">
        <h1 class="mt-10 mb-2 text-2xl text-black">Create Client application</h1>

        <div class="md:w-2/3 lg:w-3/4 mx-auto text-left bg-gray-50 p-8 border rounded-lg">
            <form class="my-5" action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex justify-center">

                    <div class="flex flex-col w-1/2 px-5">

                        <div class="mb-6">
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name:</label>
                            <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('first_name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Enter first name">
                            @error('first_name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name:</label>
                            <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('last_name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Enter last name">
                            @error('last_name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City:</label>
                            <input type="text" id="city" name="city" value="{{old('city')}}" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('city') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="City">
                            @error('city')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                            <input type="email" id="email" name="email" value="{{old('email')}}" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('email') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Email">
                            @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number:</label>
                            <input type="phone_number" id="phone_number" name="phone_number" value="{{old('phone_number')}}" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('phone_number') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Phone number">
                            @error('phone_number')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex flex-col w-1/2 px-5">
                        <div class="mb-6">
                            <label for="equipment_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment type:</label>
                            <select id="equipment_type_id" name="equipment_type_id" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('equipment_type_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror">
                                <option value="-1">Select equipment type ...</option>
                                @foreach ($equipment_types as $equipment_type)
                                <option value="{{$equipment_type->id}}" @if(old('equipment_type_id')> 0 && old('equipment_type_id')==$equipment_type->id) selected @endif>{{$equipment_type->equipment_type}}</option>
                                @endforeach
                            </select>
                            @error('equipment_type_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="doc1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Document 1:</label>
                            <input type="file" name="doc1" id="doc1" class="text-sm @error('doc1') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror rounded w-full">
                            @error('doc1')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="doc2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Document 2:</label>
                            <input type="file" name="doc2" id="doc2" class="text-sm @error('doc2') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror rounded w-full">
                            @error('doc2')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comment:</label>
                            <textarea rows="6" type="text" id="comment" name="comment" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('comment') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Enter comment here...">{{old('comment')}}</textarea>
                            @error('comment')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-between">
                    <a type="button" href="{{ url()->previous() }}" class="w-20 text-center p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-4 border-cyan-300 my-5 ml-0 mr-auto">Back</a>

                    <button type="submit" class="w-20 text-center p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-lime-600 hover:bg-lime-500 text-gray-100 rounded-lg focus:border-4 border-green-300 my-5 ml-auto mr-0">Create</button>
                </div>
            </form>
        </div>

    </div>

</div>


@endsection