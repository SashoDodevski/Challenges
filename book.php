<?php

include_once "./page_parts/header.php";

?>

<input id="user_id" type="hidden" name="user_id" value="<?php if(isset($_SESSION["user_id"])) { echo $_SESSION["user_id"]; }?>">

<!-- Book info -->
<div class="p-6 shadow-lg rounded-lg bg-gray-100 text-gray-700 mx-auto mt-24 mb-10 w-8/12 m-0">
    <div class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full mb-6 p-8">
        <img id="bookImageUrl" class="object-cover h-96 md:h-auto w-4/12" alt="Book image">
        <div class="flex flex-col justify-between p-4 leading-normal w-8/12 p-12">
            <h5 id="bookTitle" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Book title</h5>
            <h6 id="author" class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Author</h6>

            <p id="bookCategory" class="mb-3 font-bold text-green-700 dark:text-blue-400">Book category</p>
            <p id="publicationYear" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Publication year</p>
            <p id="numberOfPages" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Number of pages</p>
        </div>
    </div>

    <div id="createNoteDiv">
    <div href="#" class="p-6 flex items-left bg-white border rounded-lg shadow-md md:flex-col hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full mb-6">
        <label for="bookNote" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Make a note:</label>
        <textarea id="note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your note here..."></textarea>
        <button id="btnSubmitNote" type="button" class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-800 mt-4 sm:w-20">Submit</button>
    </div>
    </div>
    
    <div  id="bookNotesDiv" class="mb-6">
        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mb-3">Your notes about the book:</p>

    </div>

    <div id="leaveACommentDiv">
    <div href="#" class="p-6 flex items-left bg-white border rounded-lg shadow-md md:flex-col hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full mb-6">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Leave a comment:</label>
          <textarea id="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your comment here..."></textarea>
          <button id="btnSubmitComment" type="button" class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-800 mt-4 sm:w-20">Submit</button>
      </div>
    </div>

    <div id="pendingComment">
        <div class="mb-6">
            <div id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-4 border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white font-normal">Your comment is sent for approval from the admins. You can edit it until approval.</p>
            <p id="pendingCommentUser" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></p>
            <textarea id="editedComment" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your note here..."></textarea>
            <a id="btnEditComment" type="button" class="text-gray-500 hover:text-gray-700"><i class="fa-solid fa-pen-to-square fa-lg my-5 mr-3"></i></a>
            <a type="button" class="text-gray-500 hover:text-gray-700 btnDeleteComment"><i class="fa-solid fa-trash-can fa-lg my-5 mr-3"></i></a>
            </div>
        </div>
    </div>

    <div id="bookComments">
        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mb-3">Comments about the book:</p>

    </div>

<!-- Are you sure modal -->
<div id="modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="w-full h-full max-w-md md:h-auto mx-auto center-item">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white closeModal" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400" id="modalQuestion">Are you sure you want to delete this book?</h3>
                <button data-modal-hide="popup-modal" type="button" class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 modalBtn">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 closeModal">No, cancel</button>
            </div>
        </div>
    </div>
</div>


<div class="hidden flex opacity-25 fixed inset-0 z-40 bg-black" id="backdrop"></div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="book.js" type="module"></script>

<?php

include_once "./page_parts/footer.php";

?>