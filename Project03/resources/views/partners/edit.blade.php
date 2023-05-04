@extends('layouts.app')

@section('content')


<div class="flex flex-row justify-center grow bg-gray-50">
    <div class="basis-2/3 text-center">
    <h1 class="mt-10 mb-2 text-2xl text-black">Edit partner</h1>

        <div class="md:w-2/3 lg:w-2/4 mx-auto text-left bg-gray-50 p-8 border rounded-lg">
            <form class="my-5" action="{{ route('partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                    <input type="text" id="name" name="name" value="{{old('name', $partner->name)}}" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Enter partner name here">
                    @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="partner_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Web page:</label>
                    <input type="text" id="partner_url" name="partner_url" value="{{old('partner_url', $partner->partner_url)}}" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('partner_url') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Enter URL here">
                    @error('partner_url')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="partner_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                    <select id="partner_type_id" name="partner_type_id" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('partner_type_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror">
                        <option value="-1">Select partner ...</option>
                        @foreach ($partnerTypes as $partner)
                        <option value="{{$partner->id}}" @if(old('partner_type_id', $partner->id) > 0 && old('partner_type_id', $partner->id)==$partner->id) selected @endif>{{$partner->partner_type}}</option>
                        @endforeach
                    </select>
                    @error('partner_type_id')
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
                    <a type="button" href="{{ url()->previous() }}" class="w-20 text-center p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-4 border-cyan-300 my-5 ml-0 mr-auto">Back</a>

                    <button type="submit" class="w-20 text-center p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-lime-600 hover:bg-lime-500 text-gray-100 rounded-lg focus:border-4 border-green-300 my-5 ml-auto mr-0">Create</button>
                </div>
            </form>
        </div>

    </div>

</div>


@endsection