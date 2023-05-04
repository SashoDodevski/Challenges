@extends('layouts.app')

@section('meta_tag')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="flex flex-row justify-center grow bg-gray-50">
    <div class="basis-2/3 text-center">
        <h1 class="mt-10 text-2xl text-black">Volunteer requests</h1>

        <div class="flex justify-end text-end">
            <div class="flex text-end">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                    <li class="mr-2">
                        <a href="{{ route('volunteers.index') }}" aria-current="page" class="inline-block p-4 hover:rounded-t-lg hover:bg-gray-300 dark:hover:bg-gray-800 @if($_SERVER['REQUEST_URI'] == '/volunteers') active text-red-600 bg-gray-200 rounded-t-lg  dark:bg-gray-800 dark:text-red-500 @endif">Requests</a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('volunteers.activeVolunteers') }}" class="inline-block p-4 hover:bg-gray-300 hover:rounded-t-lg dark:hover:bg-gray-800  @if($_SERVER['REQUEST_URI'] == '/volunteers/activeVolunteers') active text-red-600 bg-gray-200 rounded-t-lg  dark:bg-gray-800 dark:text-red-500 @endif">Active</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="mb-3">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
            <table id="requests" class="display w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">

                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            City
                        </th>
                        <th scope="col">
                            Email
                        </th>
                        <th scope="col">
                            Phone number
                        </th>
                        <th scope="col">
                            Volunteer position
                        </th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.4/sorting/datetime-moment.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.5/dataRender/datetime.js"></script>

<script>
    $(document).ready(function() {
        $('#requests').DataTable({
            ajax: '/volunteers/requests',

            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'city',
                    name: 'city'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone_number',
                    name: 'phone_number'
                },
                {
                    data: 'volunteer_position',
                    name: 'volunteer_position'
                },
            ],
            columnDefs: [{
                targets: 6,
                scrollX: true,
            }],
            columnDefs: [{
                targets: 0,
                data: "download_link",
                render: function(id) {
                    return '<a href="volunteers/' + id + '"><span class="font-semibold text-red-600 message">View</span></a>';
                }
            }]
        })
    })

</script>

@endsection