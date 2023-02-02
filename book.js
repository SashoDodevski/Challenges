import {
  createPagination,
  postRequest,
  submitItem,
  editItem,
  deleteItem,
} from "./common_items/commonFunctions.js";

$(function () {
  // Endpoint URLs
  let urlData = "./data_endpoints/clients/booksInfo.php";

  // admin item elements
  let bookImageUrl = $("#bookImageUrl");
  let bookTitle = $("#bookTitle");
  let author = $("#author");
  let bookCategory = $("#bookCategory");
  let publicationYear = $("#publicationYear");
  let numberOfPages = $("#numberOfPages");
  let bookComments = $("#bookComments");
  let comment = $("#comment");
  let btnSubmitComment = $("#btnSubmitComment");
  let userId = $("#user_id");
  let pendingComment = $("#pendingComment");
  let pendingCommentUser = $("#pendingCommentUser");
  let btnDeleteComment = $(".btnDeleteComment");
  let btnEditComment = $("#btnEditComment");
  let editedComment = $("#editedComment");
  let leaveACommentDiv = $("#leaveACommentDiv");
  let bookNotesDiv = $("#bookNotesDiv");
  let createNoteDiv = $("#createNoteDiv");
  let note = $("#note");
  let btnSubmitNote = $("#btnSubmitNote");

  btnDeleteComment.click(function () {
    console.log("CLICK");
  });

  // Get book
  let getBook = {
    action: "getBook",
    book_id: location.hash.slice(1),
  };

  $.ajax({
    url: urlData,
    type: "GET",
    data: getBook,
    success: function (itemsData) {
      bookImageUrl.attr("src", itemsData.data[0].book_image);
      bookTitle.text(itemsData.data[0].book_title);
      author.text(
        "by " +
          itemsData.data[0].author_name +
          " " +
          itemsData.data[0].author_surname
      );
      bookCategory.text(itemsData.data[0].category);
      publicationYear.text("published: " + itemsData.data[0].publication_year);
      numberOfPages.text("number of pages: " + itemsData.data[0].no_of_pages);
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // Get pending user comment
  let getPendingComment = {
    action: "getPendingComment",
    book_id: location.hash.slice(1),
    user_id: userId.val(),
  };

  $.ajax({
    url: urlData,
    type: "GET",
    data: getPendingComment,
    success: function (itemsData) {
      if (itemsData.data.comment_status == 1) {
        pendingComment.addClass("hidden");
        leaveACommentDiv.addClass("hidden");
      } else if (itemsData.data.comment_status == 2) {
        pendingComment.addClass("hidden");
        leaveACommentDiv.addClass("hidden");
      } else if (itemsData.data.comment_status == 3) {
        pendingCommentUser.text(
          itemsData.data.name + " " + itemsData.data.surname
        );
        editedComment.text(itemsData.data.comment);
        leaveACommentDiv.addClass("hidden");
      } else if ((itemsData.data.comment_status = "none")) {
        pendingComment.addClass("hidden");
      }
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // Get book comments
  let getComments = {
    action: "getComments",
    book_id: location.hash.slice(1),
    user_id: userId.val(),
  };

  $.ajax({
    url: urlData,
    type: "GET",
    data: getComments,
    success: function (itemsData) {
      if(itemsData.data.length == 0){
        bookComments.addClass("hidden");
      } else {
      itemsData.data.forEach((element) => {

        
        
        if (element.user_id == userId.val()) {
          let comment = `<div class="mb-6 commentDiv">
                            <div class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">${
                            element.name + " " + element.surname
                            } commented:</p>
                            <p class="block mb-2 text-sm font-small text-gray-900 dark:text-white">${
                            element.comment
                            }</p>
                            <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*Your comment about the book</p>
                            </div>
                            <a type="button" class="text-gray-500 hover:text-gray-700 btnDeleteComment"><i class="fa-solid fa-trash-can fa-lg my-5 mr-3"></i></a>
                          </div>`;
                          bookComments.append(comment);
        } else {
          let comment = `<div class="mb-6 commentDiv">
          <div class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">${
          element.name + " " + element.surname
          } commented:</p>
          <p class="block mb-2 text-sm font-small text-gray-900 dark:text-white">${
          element.comment
          }</p>
        </div>`;
        bookComments.append(comment);
        }

      });
    }
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // Submit comment
  btnSubmitComment.click(function () {
    let submitComment = {
      action: "submitComment",
      book_id: location.hash.slice(1),
      user_id: userId.val(),
      comment: comment.val(),
    };
    submitItem(urlData, submitComment, postRequest)
  })

  // Edit comment in database
  btnEditComment.click(function () {
    let editComment = {
      action: "editUserComment",
      book_id: location.hash.slice(1),
      user_id: userId.val(),
      comment: $("#editedComment").val(),
      comment_status: "3",
    };
    editItem(urlData, editComment, postRequest)
  })

    // Delete comment in database
    $("body").on("click", ".btnDeleteComment", () => {
      let deleteComment = {
        action: "deleteUserComment",
        book_id: location.hash.slice(1),
        user_id: userId.val(),
      };
      deleteItem(urlData, deleteComment, postRequest)
    })


  // Get book notes
  let getNotes = {
    action: "getNotes",
    book_id: location.hash.slice(1),
    user_id: userId.val(),
  };

  $.ajax({
    url: urlData,
    type: "GET",
    data: getNotes,
    success: function (itemsData) {
      if (itemsData.data.length === 0) {
        bookNotesDiv.addClass("hidden");
      } else {
        itemsData.data.forEach((element) => {
          let note = `
          <div class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-4">
          <textarea class="existingNote w-full">${element.note}</textarea>
          <a type="button" class="text-gray-500 hover:text-gray-700 btnEditNote"><i class="fa-solid fa-pen-to-square fa-lg my-5 mr-3"></i></a>
            <a type="button" class="text-gray-500 hover:text-gray-700 btnDeleteNote"><i class="fa-solid fa-trash-can fa-lg my-5 mr-3"></i></a>
  </div>`;

          bookNotesDiv.append(note);
        });
        if (itemsData.data.length === 5) {
          createNoteDiv.addClass("hidden");
        }
      }
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });


  // Submit note
  btnSubmitNote.click(() => {
    let submitNote = {
      action: "submitNote",
      book_id: location.hash.slice(1),
      user_id: userId.val(),
      note: note.val()
    };
    submitItem(urlData, submitNote, postRequest)
  })

    // Edit note in database
    $("body").on("click", ".btnEditNote", (event) => {
      let editNote = {
        action: "editUserNote",
        book_id: location.hash.slice(1),
        user_id: userId.val(),
        new_note: event.currentTarget.previousSibling.previousSibling.value,
        old_note: event.currentTarget.previousSibling.previousSibling.textContent,
      };
      editItem(urlData, editNote, postRequest)
    })

  // Delete note in database
  $("body").on("click", ".btnDeleteNote", (event) => {
    let deleteNote = {
      action: "deleteUserNote",
      book_id: location.hash.slice(1),
      user_id: userId.val(),
      note: event.currentTarget.previousSibling.previousSibling.previousSibling.previousSibling.textContent,
    };
    deleteItem(urlData, deleteNote, postRequest)
  })

});
