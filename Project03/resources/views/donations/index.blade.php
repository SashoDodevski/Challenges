@extends('layouts.app')

@section('content')
<div class="flex flex-row justify-center grow bg-gray-50">
    <div class="basis-2/3 text-center">
        <h1 class="mt-10 text-2xl text-black">Donations</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
            <table id="donations" class="display w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">

                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            First name
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
                            Date
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
        $('#donations').DataTable({
            ajax: '/donations/allDonations',

            columns: [{
                    data: 'donation_id',
                    name: 'donation_id'
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
                    data: 'donations_created_at',
                    name: 'donations_created_at',
                },
            ],
            columnDefs: [{
                targets: 0,
                data: "download_link",
                render: function(donation_id) {
                    return '<a href="donations/' + donation_id + '"><span class="font-semibold text-red-600 message" data-id="' + donation_id + '">View</span></a>';
                }
            }]
        })
    })
</script>

@endsection