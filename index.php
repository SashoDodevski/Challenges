<?php

include_once "./page_parts/clients/header.php";

?>



<!-- Banner -->
<div class="w-full mx-auto banner-top flex flex-wrap text-center dark:bg-gray-900">
  <div class="w-8/12 py-8 mx-auto text-left flex justify-between">
    <div>
    <h1 class="text-5xl tracking-tight text-cyan-900 dark:text-gray-500 my-5">Book Library</h1>
    <p class="text-lg font-semibold tracking-tight text-cyan-900 dark:text-gray-500">All bestsellers at one place</p>
    <p class="text-lg font-semibold tracking-tight text-cyan-900 dark:text-gray-500">Promotion of new book every week</p>
    </div>
    <div class="p-3 bg-cyan-600/90 text-center my-auto" id="registerDiv">
    <h2 class="text-lg text-white">Register for full access</h2>
    <a type="button" class="text-cyan-900 bg-gray-100 hover:text-white hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-100 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800 mb-4 mt-4" href="register.php">Register now</a>
  </div>
  </div>

</div>

<div class="w-full banner flex flex-wrap text-center dark:bg-gray-900">
<div class="p-4 bg-gray-800/70 text-center mx-auto mb-12 mt-auto" id="booksCatalogue">
    <h2 class="font-regular text-2xl text-white mt-60">Search the main catalogue</h2>
    <a type="button" class="text-white hover:text-white border border-white hover:bg-cyan-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-20 py-2.5 text-center mr-2 mb-2 mt-6 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800 text-xl" href="dashboard.php"><span class="italic">go to </span>Book Library</a>
  </div>
</div>

<!-- Book content -->
<div class="w-full mx-auto" id="book-content">
<div class="w-10/12 mx-auto">
    <h4 class="text-left text-2xl font-semibold tracking-tight text-cyan-900 dark:text-gray-500 pt-6 pb-4 pl-12">Check out some of the bestselling books</h4>
  </div>
  <div class="w-10/12 mx-auto grid grid-cols-6 gap-8 content-centers p-12" id="books">
  </div>
</div>


<!-- Readers' choice -->
<div class="dark:bg-gray-500" id="readersChoice">
  <div class="grid grid-cols-10 gap-4 w-8/12 mx-auto ">
    <div class="col-span-4 ...">
      <img class="object-cover h-96 md:h-auto w-full pb-8 px-8 pt-12" src="./style/images/readersbook.png" alt="Book image">
    </div>
    <div class="col-span-6 flex">
      <div class="flex flex-col justify-between leading-normal my-auto">
        <h3 class="text-cyan-900 dark:text-gray-500 text-4xl py-6 font-bold">This week readers' choice</h3>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-cyan-900 dark:text-gray-500 ">DUNE</h5>
        <h6 class="mb-2 text-md font-bold tracking-tight text-cyan-900 dark:text-gray-500 ">by Frank Herbert</h6>
        <p class="mb-3 font-bold text-teal-700 dark:text-cyan-400">Science fiction</p>
        <p class="mb-3 font-normal text-cyan-900 dark:text-gray-500 ">Publication year: 1965</p>
        <p class="mb-3 font-normal text-cyan-900 dark:text-gray-500 ">Pages: 412</p>
        <p class="mb-3 font-normal text-cyan-900 dark:text-gray-500 font-semibold">Dune is set in the distant future amidst a feudal interstellar society in which various noble houses control planetary fiefs. It tells the story of young Paul Atreides, whose family accepts the stewardship of the planet Arrakis. While the planet is an inhospitable and sparsely populated desert wasteland, it is the only source of melange, or "spice", a drug that extends life and enhances mental abilities. Melange is also necessary for space navigation, which requires a kind of multidimensional awareness and foresight that only the drug provides. As melange can only be produced on Arrakis, control of the planet is a coveted and dangerous undertaking. The story explores the multilayered interactions of politics, religion, ecology, technology, and human emotion, as the factions of the empire confront each other in a struggle for the control of Arrakis and its spice.</p>
      </div>
    </div>
  </div>
</div>

<!-- Editors' choice -->
<div class="bg-yellow-100/50 dark:bg-gray-500 p-4" id="editorsChoice">
  <div class="grid grid-cols-10 gap-4 w-8/12 mx-auto ">
    <div class="col-span-6 flex">
      <div class="flex flex-col justify-between leading-normal my-auto">
        <h3 class="text-cyan-900 dark:text-gray-500 text-4xl py-6 font-bold">This week editors' choice</h3>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-cyan-900 dark:text-gray-500 ">One Two Three</h5>
        <h6 class="mb-2 text-md font-bold tracking-tight text-cyan-900 dark:text-gray-500 ">by Laurie Frankel</h6>
        <p class="mb-3 font-bold text-teal-700 dark:text-cyan-400">Literary fiction</p>
        <p class="mb-3 font-normal text-cyan-900 dark:text-gray-500 ">Publication year: 2021</p>
        <p class="mb-3 font-normal text-cyan-900 dark:text-gray-500 ">Pages: 416</p>
        <p class="mb-3 font-normal text-cyan-900 dark:text-gray-500 font-semibold">Everyone knows everyone in the tiny town of Bourne, but the Mitchell triplets are especially beloved. Mirabel is the smartest person anyone knows, and no one doubts it just because she can’t speak. Monday is the town’s purveyor of books now that the library’s closed—tell her the book you think you want, and she’ll pull the one you actually do from the microwave or her sock drawer. Mab’s job is hardest of all: get good grades, get into college, get out of Bourne.

          For a few weeks seventeen years ago, Bourne was national news when its water turned green. The girls have come of age watching their mother’s endless fight for justice. But just when it seems life might go on the same forever, the first moving truck anyone’s seen in years pulls up and unloads new residents and old secrets. Soon, the Mitchell sisters are taking on a system stacked against them and uncovering mysteries buried longer than they’ve been alive...because it’s hard to let go of the past when the past won’t let go of you.​</p>
      </div>
    </div>
    <div class="col-span-4 ...">
      <img class="object-cover h-96 md:h-auto w-full p-8" src="./style/images/one-two-three-paperback-3d-bookshot_orig.png" alt="Book image">
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="index.js"></script>

<?php

include_once "./page_parts/clients/footer.php";

?>