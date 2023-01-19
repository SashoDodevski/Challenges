<?php

include_once "./adminHeader.php";
include_once "../clientRouter.php";

?>

<!-- Authors data -->

<!-- Create Author form / Modal - shows on Add new author button -->
<div class="w-4/12 p-6 space-y-4 md:space-y-6 sm:p-8 bg-gray-50 text-blue-900 shadow-lg rounded-lg mx-auto mt-10 mb-10 hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex" id="divMain">
    <div class="w-10/12 mx-auto">
        <p class="text-right"><i class="fa-solid fa-xmark btnCloseForm hover:text-blue-700"></i></p>

        <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-white mb-2">
            Add new author
        </h1>
        <form class="space-y-4 md:space-y-6" id="form">
            <input type="hidden" name="action" value="create">

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="authorName" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Author name" required="">
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                <input type="text" name="surname" id="authorSurname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Author surname" required="">
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short biography</label>
                <textarea rows="8" name="surname" id="authorCV" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Author's short biography" required=""></textarea>
            </div>

            <div class="mt-0">
                <p class="text-sm h-1 mb-1 text-center" id="msgForm"></p>
            </div>
            <button type="button" class="w-full text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800" id="btnSubmitItem">Submit author</button>
            <button type="button" class="w-full text-white bg-green-800/80 hover:bg-green-700/80 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800" id="btnSubmitEditedItem">Edit author</button>
            <button type="button" class="w-full text-red-500/90 hover:text-red-400 bg-none hover:bg-none font-medium text-sm px-5 py-2.5 text-center btnCloseForm">Close</button>
        </form>
    </div>
</div>
<div class="hidden flex opacity-25 fixed inset-0 z-40 bg-black" id="divMain-backdrop"></div>



<!-- Table Authors to add authors in database -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-10/12 mx-auto mb-10 bg-gray-100 mt-24 border" id="divTable">
    <div class="flex justify-between">
        <p class="m-3 text-3xl">Authors</p>
        <!-- Create new book button / Shows book form modal -->
        <button stype="submit" class="m-3 text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800" id="btnAddNewItem"><i class="fa-solid fa-plus"></i> Add new author</button>
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
                <th scope="col" class="px-3 py-3 w-20 text-center">
                    ID
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
    <div class="pageNumbers text-center py-3 grid grid-cols-3">
        <div></div>
        <div>
        <ul class="inline-flex items-center" id="pageNumbers">
        </ul>
        </div>
        <div class="ml-auto mr-0 px-6 text-gray-600 flex items-center h-full">
            <p id="showPageNo"></p>
        </div>
    </div>

</div>



<div id="deleteModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="w-full h-full max-w-md md:h-auto mx-auto center-item">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white closeDeleteModal" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this book?</h3>
                <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 deleteModalBtn">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 closeDeleteModal">No, cancel</button>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./adminAuthors.js"></script>

<?php

include_once "../page_parts/footer.php";

?>