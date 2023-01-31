<?php

include_once "./page_parts/clients/header.php";

?>


<div class="containter">


<!-- Left hidden div -->
<div class="hiddenDiv min-h-screen fixed pt-20 bg-white " id="filterCategory">
    <div class="showHideFilter min-h-screen fixed pt-20 ml-auto mr-0 absolute top-0 right-0 bg-blue-800 hover:bg-blue-200 " id="filterCategory" style="width:14px;">
    <div id="showFilter"></div>
    <div id="hideFilter"></div>
    </div>
    <h5 class="mb-2 font-bold tracking-tight text-gray-800 dark:text-white ml-4 pr-3">Filter by category</h5>
    <h5 class="mb-2 font-bold tracking-tight text-transparent dark:text-white ml-4 pr-3">Books</h5>

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

include_once "./page_parts/clients/footer.php";

?>