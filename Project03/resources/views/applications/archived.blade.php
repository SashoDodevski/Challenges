@extends('layouts.app')

@section('content')
<div class="flex flex-row justify-center grow bg-gray-50">
    <div class="basis-2/3 text-center">
        <h1 class="mt-10 text-2xl text-black">Client applications</h1>

        <div class="flex justify-between">
            <div class="text-start">
                <a type="button" href="{{ route('applications.create')}}" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-small rounded-lg text-sm px-5 py-1.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800 mb-6 mx-auto">Add new application</a>
            </div>
            <div class="flex text-end">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                    <li class="mr-2">
                        <a href="{{ route('applications.index') }}" aria-current="page" class="inline-block p-4 hover:rounded-t-lg hover:bg-gray-300 dark:hover:bg-gray-800 @if($_SERVER['REQUEST_URI'] == '/applications') active text-red-600 bg-gray-200 rounded-t-lg  dark:bg-gray-800 dark:text-red-500 @endif">Active</a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('applications.archivedApplications') }}" class="inline-block p-4 hover:bg-gray-300 hover:rounded-t-lg dark:hover:bg-gray-800  @if($_SERVER['REQUEST_URI'] == '/applications/archivedApplications') active text-red-600 bg-gray-200 rounded-t-lg  dark:bg-gray-800 dark:text-red-500 @endif">Archived</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="mb-3">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
            <table id="archived_applications_table" class="display w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">

                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Last Name
                        </th>
                        <th scope="col">
                            City
                        </th>
                        <th scope="col">
                            Email
                        </th>
                        <th scope="col">
                            Phone number
                        </th>
                        <th scope="col">
                            Equipment type
                        </th>
                        <th scope="col">
                            Application status
                        </th>
                        <th scope="col">
                            Archived at
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
        $('#archived_applications_table').DataTable({
            ajax: '/applications/archived',
            columns: [{
                    data: 'client_id',
                    name: 'client_id'
                },
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'last_name',
                    name: 'last_name'
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
                    data: 'equipment_type',
                    name: 'equipment_type'
                },
                {
                    data: 'application_status',
                    name: 'application_status'
                },
                {
                    data: 'archived_at',
                    name: 'archived_at'
                },

            ],
            columnDefs: [{
                targets: 7,
                render: DataTable.render.datetime('DD/MM/YYYY'),
            }],
            columnDefs: [{
                targets: 0,
                data: "download_link",
                render: function(id) {
                    return '<a href="' + id + '"><span class="font-semibold text-red-600">View</span></a>';
                }
            }]
        })
    })
</script>
@endsection