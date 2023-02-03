<?php

include_once "./page_parts/clients/header.php";

?>

<input id="user_id" type="hidden" name="user_id" value="<?php if(isset($_SESSION["user_id"])) { echo $_SESSION["user_id"]; }?>">

<!-- Book info -->
<div class="p-6 shadow-lg rounded-lg bg-yellow-100/10 text-gray-700 mx-auto mt-24 mb-10 w-8/12 m-0">
    <div class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full mb-6 p-8">
        <img id="bookImageUrl" class="object-cover h-96 md:h-auto w-4/12" alt="Book image">
        <div class="flex flex-col justify-between p-4 leading-normal w-8/12 p-12">
            <h5 id="bookTitle" class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Book title</h5>
            <h6 id="author" class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">Author</h6>

            <p id="bookCategory" class="mb-3 font-semibold text-teal-700 dark:text-blue-400">Book category</p>
            <p id="publicationYear" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Publication year</p>
            <p id="numberOfPages" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Number of pages</p>
        </div>
    </div>

    <?php
        if (isset($_SESSION["username"])) {
    ?>
    <div id="createNoteDiv">
    <div href="#" class="p-6 flex items-left bg-white border rounded-lg shadow-md md:flex-col hover:bg-blue-700/5 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full mb-6">
        <label for="bookNote" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Make a note:</label>
        <textarea id="note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your note here..."></textarea>
        <button id="btnSubmitNote" type="button" class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-800 mt-4 sm:w-20">Submit</button>
    </div>
    </div>
    
    <div  id="bookNotesDiv" class="mb-6">
        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mb-3">Your notes about the book:</p>

    </div>

    <div id="leaveACommentDiv">
    <div href="#" class="p-6 flex items-left bg-white border rounded-lg shadow-md md:flex-col hover:bg-blue-700/5 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full mb-6">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Leave a comment:</label>
          <textarea id="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your comment here..."></textarea>
          <button id="btnSubmitComment" type="button" class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-800 mt-4 sm:w-20">Submit</button>
      </div>
    </div>

    <div id="pendingComment">
        <div class="mb-6">
            <div id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-white hover:bg-blue-700/5 rounded-lg border-4 border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white font-normal">Your comment is sent for approval from the admins. You can edit it until approval.</p>
            <p id="pendingCommentUser" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></p>
            <textarea id="editedComment" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your note here..."></textarea>
            <a id="btnEditComment" type="button" class="text-gray-500 hover:text-gray-700"><i class="fa-solid fa-pen-to-square fa-lg my-5 mr-3"></i></a>
            <a type="button" class="text-gray-500 hover:text-gray-700 btnDeleteComment"><i class="fa-solid fa-trash-can fa-lg my-5 mr-3"></i></a>
            </div>
        </div>
    </div>

    <?php
        }
    ?>
    <div id="bookComments">
        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mb-3">Comments about the book:</p>

    </div>


<div class="hidden flex opacity-25 fixed inset-0 z-40 bg-black" id="backdrop"></div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="book.js" type="module"></script>

<?php

include_once "./page_parts/clients/footer.php";

?>