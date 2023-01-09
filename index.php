<?php

include_once "./page_parts/header.php";

?>

<!-- Banner -->
<div class="w-full banner flex flex-wrap text-center">
  <a class="mx-auto" href="#books">Book library</a>
  <p href="#" class="text-sm text-red-500 h-1">
    <?php if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
    }
    unset($_SESSION['msg']) ?>
  </p>
</div>

<!-- Book content -->
<div class="w-10/12 mx-auto grid grid-cols-3 gap-8 content-centers p-8" id="books">

  <!-- Book cards -->
  <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
      <img class="rounded-t-lg" src="" alt="" />
    </a>
    <div class="p-5">
      <a href="#">
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Book title</h5>
      </a>
      <h6 class="mb-2 text-sm font-bold tracking-tight text-gray-700 dark:text-white">Author</h6>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Category</p>
      <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Read more
      </a>
    </div>
  </div>

  <div>02</div>
  <div>03</div>
  <div>04</div>
  <div>05</div>
  <div>06</div>

</div>


<!-- Footer -->

<div class="w-10/12 mx-auto content-center text-center">
  <h6>
    Изработено со срце од студентите на Brainster
  </h6>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="index.js"></script>

<?php

include_once "./page_parts/footer.php";

?>