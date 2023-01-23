<?php

include_once "./page_parts/header.php";

?>


<div class="containter">

<!-- Filter -->
<div class="flex w-10/12 mx-auto content-centers p-6" style="margin-top: 56px;" id="filterCategory">
<div class="flex items-center">
    <input checked id="allCategories" type="checkbox" value="#allCategories" class="w-4 h-4 m-l-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 categoryCheckbox">
    <label for="allCategories" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">All</label>
</div>
</div>

<!-- Book content -->
<div class="w-10/12 mx-auto">
<div class="w-full mx-auto grid grid-cols-3 gap-10 content-centers p-12" id="books">

</div>
</div>


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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="module" src="dashboard.js"></script>

<?php

include_once "./page_parts/footer.php";

?>