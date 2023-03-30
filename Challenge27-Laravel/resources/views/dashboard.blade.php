@include('layouts.partials.header')

@include('layouts.navigation')
<div class="flex flex-col pt-8 items-center min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white background_image">



    <div class="max-w-7xl mx-auto p-6 lg:p-8 flex flex-col ">

    <h1 class="text-center pb-6 text-3xl font-semibold">Vehicles</h1>

        <div class="relative overflow-x-auto rounded">
            <div class="p-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
            <div class="p-4 bg-white dark:bg-gray-900">
                <a type="button" href="{{ route('vehicles.create')}}" class="text-sm text-emerald-600  ml-0 mr-auto font-semibold">+ Add new vehicle</a>
            </div>

            <table id="vehiclesTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Car brand
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Model
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Licence plate
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Insurance date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody id="tBody">
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>


    <script>
       $(document).ready(function() {
            
        
            // New record
            $('a.editor-create').on('click', function (e) {
                e.preventDefault();
        
                editor.create( {
                    title: 'Create new record',
                    buttons: 'Add'
                } );
            } );
        
            // Edit record
            $('#vehiclesTable').on('click', 'td.editor-edit', function (e) {
                e.preventDefault();
        
                editor.edit( $(this).closest('tr'), {
                    title: 'Edit record',
                    buttons: 'Update'
                } );
            } );
        
            // Delete a record
            $('#vehiclesTable').on('click', 'td.editor-delete', function (e) {
                e.preventDefault();
        
                editor.remove( $(this).closest('tr'), {
                    title: 'Delete record',
                    message: 'Are you sure you wish to remove this record?',
                    buttons: 'Delete'
                } );
            } );
        
            $('#vehiclesTable').DataTable( {
                ajax: "/vehicles",
                columns: [
                    { data: "brand" },
                    { data: "model" },
                    { data: "plate_number" },
                    { data: "insurance_date" },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            } );
        });


    </script>

    </body>

    </html>