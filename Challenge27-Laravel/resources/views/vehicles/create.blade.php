@extends('layouts.app')

@section('content')

<div class="flex flex-row justify-center">
    <div class="basis-2/3 text-center">
        <h1 class="mt-10 mb-2 text-2xl text-gray">Create Vehicle</h1>

        <div class="md:w-2/3 lg:w-1/3 mx-auto text-left bg-gray-50 p-8 border rounded-lg">
            <div id="message" class="hidden p-4 mb-4 text-sm text-center text-red-600 rounded-lg dark:bg-gray-800" role="alert">
            </div>
            <form class="my-5">
                <div class="mb-6">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand:</label>
                    <input type="text" id="brand" name="brand" value="{{ old(serialize($vehicle->brand)) }}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="mb-6">
                    <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model:</label>
                    <input type="text" id="model" name="model" value="{{ old(serialize($vehicle->model)) }}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="mb-6">
                    <label for="plate_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Registration plate:</label>
                    <input type="text" id="plate_number" name="plate_number" value="{{ old(serialize($vehicle->plate_number)) }}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="mb-6">
                    <label for="insurance_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of insurance:</label>
                    <input type="date" id="insurance_date" name="insurance_date" value="{{ old(serialize($vehicle->insurance_date)) }}" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  bg-gray-50 border border-gray-300 text-gray-900">
                </div>

                <div class="flex justify-between">
                    <a type="button" href="{{ url()->previous() }}" class="p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-cyan-600 hover:bg-cyan-500 text-gray-100 rounded-lg focus:border-4 border-cyan-300 my-5 ml-0 mr-auto">Back</a>

                    <button type="submit" class="p-1.5 pl-5 pr-5 text-sm transition-colors duration-700 transform bg-green-600 hover:bg-amber-500 text-gray-100 rounded-lg focus:border-4 border-amber-300 my-5 ml-auto mr-0">Create vehicle</button>
                </div>
            </form>
        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    $(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();

            let data = {
                _token: '{{csrf_token()}}',
                'brand': $('#brand').val(),
                'model': $('#model').val(),
                'plate_number': $('#plate_number').val(),
                'insurance_date': $('#insurance_date').val(),
            }

            swal({
                title: "Good job!",
                text: "Vehicle added!",
                icon: "success",
                button: "Done!",
                })
                .then((result) => {
                    if (result) {
                        
                        $.ajax({
                            type: "POST",
                            url: "/api/vehicles/{{$vehicle->id}}",
                            data: data,
                            success: function(response) {
                                document.location = '/dashboard'
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(data.responseJSON.message);
                                $('#message').removeClass('hidden');
                            },
                        });

                    } 
                });


        });
    });
</script>
@endsection