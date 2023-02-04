<?php

include_once "../page_parts/admins/adminHeader.php";


?>

<!-- Authors data -->

<!-- Create Author form / Modal - shows on Add new author button -->
    <div class="w-4/12 p-6 space-y-4 md:space-y-6 sm:p-8 bg-gray-50 dark:bg-gray-600 text-cyan-900 shadow-lg rounded-lg mx-auto hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex top-positioning-170 mb-10" id="divMain">
        <div class="w-10/12 mx-auto">
            <p class="text-right"><i class="fa-solid fa-xmark btnCloseForm hover:text-cyan-700"></i></p>

            <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-white mb-2">
                Add new author
            </h1>
            <form class="space-y-4 md:space-y-6" id="form">
                <input type="hidden" name="action" value="create">

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="authorName" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Author name" required="">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                    <input type="text" name="surname" id="authorSurname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Author surname" required="">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short biography</label>
                    <textarea rows="8" name="surname" id="authorCV" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Author's short biography" required=""></textarea>
                </div>

                <div class="mt-0">

                </div>
                <button type="button" class="w-full text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800" id="btnSubmitItem">Submit</button>
                <button type="button" class="w-full text-white bg-green-800/80 hover:bg-green-700/80 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800" id="btnSubmitEditedItem">Submit</button>
                <button type="button" class="w-full text-red-500/90 hover:text-red-400 bg-none hover:bg-none font-medium text-sm px-5 py-2.5 text-center btnCloseForm">Close</button>
            </form>
        </div>
    </div>

    <div class="hidden flex opacity-25 fixed inset-0 z-40 bg-black" id="divMain-backdrop"></div>

    <div class="content min-h-screen flex negative-top-positioning-68">
    <!-- Table Authors to add authors in database -->
    <div class="min-w-full">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-10/12 mx-auto mb-12 bg-gray-100 border top-positioning-170" id="divTable">
        <div class="flex justify-between dark:bg-gray-500">
            <p class="m-3 text-3xl dark:text-white">Authors</p>
            <!-- Create new book button / Shows book form modal -->
            <button stype="submit" class="m-3 text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800" id="btnAddNewItem"><i class="fa-solid fa-plus"></i> Add new author</button>
        </div>

        <!-- Table data -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3 w-20 text-center">
                        Actions
                    </th>
                    <th scope="col" class="px-3 py-3 w-20 text-center">
                        Author status
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Surname
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Short biography
                    </th>
                </tr>
            </thead>
            <tbody id="tableBody">
            </tbody>
        </table>

        <!-- Book pagination -->
        <div class="pageNumbers text-center py-3 grid grid-cols-3 dark:bg-gray-500">
            <div></div>
            <div>
            <ul class="inline-flex items-center" id="pageNumbers">
            </ul>
            </div>
            <div class="ml-auto mr-0 px-6 text-gray-600 flex items-center h-full">
                <p id="showPageNo" class="dark:text-gray-200"></p>
            </div>
        </div>
    </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="module" src="./adminAuthors.js"></script>

<?php

include_once "../page_parts/admins/footer.php";

?>