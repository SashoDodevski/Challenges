<?php

include_once "./page_parts/header.php";

?>

        <!-- Book data -->
        <div class="p-6 shadow-lg rounded-lg bg-gray-100 text-gray-700 mx-auto mt-24 mb-10 w-10/12 m-0 p-10" id="divBook">

            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 mx-auto">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 text-blue-900">
                    <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-white">
                        Enter book
                    </h1>
                    <form class="space-y-4 md:space-y-6" id="formBook">
                        <div>
                            <label for="bookTitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book title</label>
                            <input type="text" name="bookTitle" id="bookTitle" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Book title" required="">
                        </div>
                        <div>
                            <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                            <input type="text" name="author" id="author" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Author" required="">
                        </div>
                        <div>
                            <label for="bookCategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <input type="text" name="bookCategory" id="bookCategory" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Book category" required="">
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
                        <button type="submit" class="w-full text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800" id="btnSubmitBook">Submit book</button>
                    </form>
                </div>

        </div>

        </div>
        
<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-10/12 mx-auto mb-10 bg-gray-100">
    <p class="m-3">Books</p>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 w-4/12">
                    Book title
                </th>
                <th scope="col" class="px-6 py-3 w-2/12">
                    Author
                </th>
                <th scope="col" class="px-6 py-3 w-3/24">
                    Category
                </th>
                <th scope="col" class="pl-6 py-3 w-3/24">
                    Year of publication
                </th>
                <th scope="col" class="px-6 py-3 w-3/24">
                    No. of pages
                </th>
                <th scope="col" class="px-6 py-3 w-3/24">
                    Image url
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Sliver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="adminBooks.js"></script>
</body>

</html>