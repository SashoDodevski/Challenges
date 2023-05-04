@extends('layouts.app')

@section('content')

<div class="flex flex-row justify-center pb-10 grow bg-gray-50">
    <div class="basis-2/3 text-left">

        <div class="flex flex-row justify-around">
            <div class="text-start">
                <a type="button" href="{{ url()->previous() }}" class="w-32 text-center p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-4 border-cyan-300 my-5 ml-0 mr-auto">Back</a>
            </div>
        </div>

        <div class="flex flex-col mx-auto my-5 border rounded-lg w-full bg-gray-50 p-2 overflow-hidden overflow-y-auto p-6 shadow-lg lg:w-5/6">
            <div class="flex flex-row justify-around">
                <div class="text-end">
                    <a href="" type="button" id="donateBtn" data-id="{{ $client }}" class="w-32 text-green-600 hover:text-white border-2 border-green-600 bg-green-50 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-600">Donate!</a>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="text-start">
                    <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-full text-start">{{ $client->first_name . " " . $client->last_name }}</h6>
                    <p class="font-normal text-gray-700 dark:text-gray-400 w-full"><span class="font-semibold">City:</span> {{ $client->city }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400 w-full"><span class="font-semibold">Email:</span> {{ $client->email }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400 w-full"><span class="font-semibold">Phone number:</span> {{ $client->phone_number }}</p>
                </div>
                <div class="text-end">
                    <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-full text-end">Опрема: {{ $client->equipment[0]->equipment_type }}</h6>
                </div>
            </div>
            <p class="font-normal text-gray-700 dark:text-gray-400 w-full mt-2"><span class="font-semibold">Donating: </span></p>
            <form id="donationForm" class="mb-5" action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @error('donation')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
                <input type="hidden" id="client_id" value="{{old('client_id', $client->id)}}" name="client_id">

                <label for="donation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                            <textarea rows="6" type="text" id="donation" name="donation" class="text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @error('donation') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @else bg-gray-50 border border-gray-300 text-gray-900 @enderror" placeholder="Enter donation here...">{{old('donation')}}</textarea>
                <button type="submit" id="donationFormBtn" class="w-20 text-center p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-lime-600 hover:bg-lime-500 text-gray-100 rounded-lg focus:border-4 border-green-300 my-5 ml-auto mr-0 hidden">Create</button>
            </form>
        </div>
    </div>

</div>
</div>

</div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(function() {
        let donateBtn = $("#donateBtn");
        let donationFormBtn = $("#donationFormBtn");

        donateBtn.click( function() {
                donationFormBtn.click()
                return false;
            }
        )

    })
</script>