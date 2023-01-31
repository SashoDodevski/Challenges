<?php

include_once "./adminHeader.php";
include_once "../routers/clientRouter.php";

?>

<!-- Book data -->

<!-- Create Book form / Modal - shows on Add new book button -->
<div class="w-4/12 p-6 space-y-4 md:space-y-6 sm:p-8 bg-gray-50 text-blue-900 shadow-lg rounded-lg mx-auto mt-10 mb-10 hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 flex" id="divMain">
    <div class="w-10/12 mx-auto">
        <div class="flex justify-end"><i class="fa-solid fa-xmark btnCloseForm hover:text-blue-700"></i></div>

        <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-white mb-2">
            Add new book
        </h1>
        <form class="space-y-4 md:space-y-6" id="formMain">
        <input type="hidden" name="action" value="create">

            <div>
                <label for="bookTitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book title</label>
                <input type="text" name="bookTitle" id="bookTitle" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Book title" required="">
            </div>
            <div>
                <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                <select type="text" name="author" id="author" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Author" required="">
                    <option value="" disabled selected class="text-gray-400">Select author</option>
                </select>
            </div>
            <div>
                <label for="bookCategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select type="text" name="bookCategory" id="bookCategory" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Book category" required="">
                    <option value="" disabled selected class="text-gray-400">Select book category</option>
                </select>
            </div>
            <div>
                <label for="publicationYear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publication Year</label>
                <input type="text" name="publicationYear" id="publicationYear" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Publication Year" required="">
            </div>
            <div>
                <label for="numberOfPages" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of pages</label>
                <input type="text" name="numberOfPages" id="numberOfPages" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Number of pages" required="">
            </div>
            <div>
                <label for="bookImageUrl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image url</label>
                <input type="text" name="bookImageUrl" id="bookImageUrl" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Image url" required="">
            </div>
            <div class="mt-0">
                <p class="text-sm h-1 mb-1 text-center" id="msgForm"></p>
            </div>
            <button type="button" class="w-full text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800" id="btnSubmitItem">Submit</button>
            <button type="button" class="w-full text-white bg-green-800/80 hover:bg-green-700/80 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800" id="btnSubmitEditedItem">Submit</button>
            <button type="button" class="w-full text-red-500/90 hover:text-red-400 bg-none hover:bg-none font-medium text-sm px-5 py-2.5 text-center btnCloseForm">Close</button>
        </form>
    </div>
</div>
<div class="hidden flex opacity-25 fixed inset-0 z-40 bg-black" id="divMain-backdrop"></div>

<!-- Table Book for books in database -->
<div class="relative text-ellipsis overflow-x-hidden ... shadow-md sm:rounded-lg w-10/12 mx-auto mb-10 bg-gray-100 mt-24 border" id="divTable">
    <div class="flex justify-between">
        <p class="m-3 text-3xl">Books</p>
        <!-- Create new book button / Shows book form modal -->
        <button stype="submit" class="m-3 text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800" id="btnAddNewItem"><i class="fa-solid fa-plus"></i> Add new book</button>
    </div>

    <!-- Table data -->
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-3 py-3 w-20 text-center">
                    Actions
                </th>
                <th scope="col" class="px-3 py-3 w-20 text-center">
                    Book status
                </th>
                <th scope="col" class="px-3 py-3 w-20 text-center">
                    Book ID
                </th>
                <th scope="col" class="px-3 py-3">
                    Book title
                </th>
                <th scope="col" class="px-3 py-3">
                    Author
                </th>
                <th scope="col" class="px-3 py-3">
                    Category
                </th>
                <th scope="col" class="px-3 py-3 text-center">
                    Year of publication
                </th>
                <th scope="col" class="px-3 py-3 text-center">
                    No. of pages
                </th>
                <th scope="col" class="px-3 py-3">
                    Image url
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="module" src="adminBooks.js"></script>

<?php

include_once "../page_parts/footer.php";

?>