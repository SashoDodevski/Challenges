<?php

include_once "../page_parts/admins/adminHeader.php";
include_once "../routers/clientRouter.php";

?>


<!-- Admin interface -->
<div class="grid justify-items-center p-6 shadow-lg rounded-lg bg-gray-100 text-gray-700 mx-auto mt-24 mb-10 w-10/12">
    <h2 class="text-xl text-blue-900 font-bold leading-tight tracking-tight md:text-2xl dark:text-white space-y-4 md:space-y-6 sm:pb-8 ">
        Admin interface
    </h2>
    <a type="button" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800 mb-6 sm:w-6/12" href="./adminBooks.php#Page_1">Books</a>
    <a type="button" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800 mb-6 sm:w-6/12" href="./adminAuthors.php#Page_1">Authors</a>
    <a type="button" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800 mb-6 sm:w-6/12" href="./adminCategories.php#Page_1">Categories</a>
    <a type="button" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800 mt-6 sm:w-6/12" href="./adminComments.php#Page_1">Comments</a>

</div>


<script>
    document.querySelector("#btnAdminInterface").classList.add("hidden");
</script>

<?php

include_once "../page_parts/footer.php";

?>