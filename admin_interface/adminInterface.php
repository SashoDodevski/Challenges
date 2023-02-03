<?php

include_once "../page_parts/admins/adminHeader.php";

?>
<div class="content min-h-screen flex negative-top-positioning-68">

<!-- Admin interface -->

    <div class="grid justify-items-center p-6 shadow-lg rounded-lg bg-gray-100 text-cyan-700 mx-auto my-auto w-8/12 h-full">
        <h2 class="text-xl text-cyan-700 font-bold leading-tight tracking-tight md:text-2xl dark:text-white space-y-4 md:space-y-6 sm:pb-8">
            Admin interface
        </h2>
        <a type="button" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800 mb-6 sm:w-6/12" href="./adminBooks.php#Page_1">Books</a>
        <a type="button" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800 mb-6 sm:w-6/12" href="./adminAuthors.php#Page_1">Authors</a>
        <a type="button" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800 mb-6 sm:w-6/12" href="./adminCategories.php#Page_1">Categories</a>
        <a type="button" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800 mt-6 sm:w-6/12" href="./adminComments.php#Page_1">Comments</a>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<?php

include_once "../page_parts/admins/footer.php";

?>