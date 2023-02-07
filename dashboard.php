<?php

include_once "./page_parts/clients/header.php";

?>


<div class="containter">


    <!-- Left hidden div -->
    <div class="hiddenDiv min-h-screen fixed pt-12 bg-cyan-50/95 dark:bg-gray-600 z-40" id="filterCategory" style="margin-left: -286px;">
        <div class="showHideFilter min-h-screen fixed pt-12 ml-auto mr-0 absolute top-0 right-0 bg-cyan-600 hover:bg-cyan-500" style="width:14px;">
            <div class="my-auto" id="showFilter"></div>
            <div class="my-auto hidden" id="hideFilter"></div>
        </div>
        <h5 class="mb-2 font-bold tracking-tight text-lg text-gray-800 dark:text-white ml-4 pr-3">Filter by category</h5>

    </div>



    <!-- Book content -->
    <div class="w-10/12 mx-auto top-positioning-60 min-h-screen">
        <div class="flex justify-end">
            <button type="submit" class="w-40 mt-4 ml-auto mr-20 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800 showHideFilter">Filter by category</button>
        </div>
        <div class="w-full mx-auto grid grid-cols-6 gap-8 content-centers p-12" id="books">
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

    include_once "./page_parts/clients/footer.php";

    ?>