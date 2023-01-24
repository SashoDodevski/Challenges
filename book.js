import {
  testFunction,
  createPagination,
} from "./admin_interface/commonFunctions.js";

$(function () {
  // Endpoint URLs
  let urlData = "./booksInfo.php";
  let urlAuthors = "../admin_data_endpoints/dataAuthors.php";
  let urlCategories = "../admin_data_endpoints/dataCategories.php";

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
  let msgWhenCommentSubmitted = $("#msgWhenCommentSubmitted");
  let userId = $("#user_id");
  let pendingComment = $("#pendingComment");
  let pendingCommentUser = $("#pendingCommentUser");
  let btnDeleteItem = $("#btnDeleteItem");
  let btnEditItem = $("#btnEditItem");
  let editedComment = $("#editedComment");
  let modal = $("#modal");
  let modalQuestion = $("#modalQuestion");
  let modalBtn = $(".modalBtn");
  let closeModal = $(".closeModal");
  let backdrop = $("#backdrop");
  let commentDiv = $("#commentDiv");
  let bookNotesDiv = $("#bookNotesDiv");
  let createNoteDiv = $("#createNoteDiv");
  let note = $("#note");
  let btnSubmitNote = $("#btnSubmitNote");

  // Get book
  let getBook = {
    action: "getBook",
    book_id: location.hash.slice(1),
  };

  $.ajax({
    url: urlData,
    type: "POST",
    contentType: "application/json",
    data: JSON.stringify(getBook),
    success: function (itemsData) {
      bookImageUrl.attr("src", itemsData.data[0].book_image);
      bookTitle.text(itemsData.data[0].book_title);
      author.text(
        "by " + itemsData.data[0].author_name + " " + itemsData.data[0].author_surname
      );
      bookCategory.text(itemsData.data[0].category);
      publicationYear.text("published: " + itemsData.data[0].publication_year)
      numberOfPages.text("number of pages: " + itemsData.data[0].no_of_pages)
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
    type: "POST",
    contentType: "application/json",
    data: JSON.stringify(getPendingComment),
    success: function (itemsData) {
      if (itemsData.data.comment_status == 1) {
        pendingComment.addClass("hidden");
        commentDiv.addClass("hidden");
      } else if (itemsData.data.comment_status == 2) {
        pendingComment.addClass("hidden");
        commentDiv.addClass("hidden");
      } else if (itemsData.data.comment_status == 3) {
        pendingCommentUser.text(
          itemsData.data.name + " " + itemsData.data.surname
        );
        editedComment.text(itemsData.data.comment);
        commentDiv.addClass("hidden");
      } else if ((itemsData.data.comment_status = "none")) {
        pendingComment.addClass("hidden");
      }

      // Delete comment in database
      btnDeleteItem.click(function () {
        backdrop.fadeIn(100);
        modal.fadeIn(100);
        modalQuestion.text("Are you sure you want to delete this comment?");
        modalBtn.addClass(
          "bg-red-600 hover:bg-red-800 focus:ring-red-300 dark:focus:ring-red-800 "
        );
        modalBtn.click(function () {
          let deleteItem = {
            action: "deleteUserComment",
            user_id: itemsData.data.user_id,
          };

          $.ajax({
            url: urlData,
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(deleteItem),
            success: function (success) {},
            error: function (error) {
              console.log("Error: " + JSON.stringify(error));
            },
          });
          modal.fadeOut(200);
          backdrop.fadeOut(200);
          window.setTimeout(function () {
            location.reload();
          }, 200);
        });
      });

      closeModal.click(function () {
        modal.fadeOut(200);
        backdrop.fadeOut(200);
      });

      // Edit comment in database
      btnEditItem.click(function (e) {
        e.preventDefault();

        backdrop.fadeIn(100);
        modal.fadeIn(100);
        modalQuestion.text("Are you sure you want to edit this comment?");
        modalBtn.addClass(
          "bg-green-600 hover:bg-green-800 focus:ring-green-300 dark:focus:ring-green-800 "
        );

        modalBtn.click(function () {
          let editItem = {
            action: "editUserComment",
            book_id: location.hash.slice(1),
            user_id: itemsData.data.user_id,
            comment: $("#editedComment").val(),
            comment_status: "3",
          };

          $.ajax({
            url: urlData,
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(editItem),
            success: function (succsess) {},
            error: function (error) {
              console.log("Error: " + JSON.stringify(error));
            },
          });
          location.reload();
        });

        closeModal.click(function () {
          modal.fadeOut(200);
          backdrop.fadeOut(200);
        });
      });
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
    type: "POST",
    contentType: "application/json",
    data: JSON.stringify(getComments),
    success: function (itemsData) {
      if ((itemsData.data = [])) {
        bookComments.addClass("hidden");
      } else {
        itemsData.data.forEach((element) => {
          let comment = `    <div class="mb-6">
                                <div id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">${
                                  element.name + " " + element.surname
                                } commented:</p>
                                <p class="block mb-2 text-sm font-small text-gray-900 dark:text-white">${
                                  element.comment
                                }</p>
                                </div>
                            </div>`;

          bookComments.append(comment);
        });
      }
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // Submit comment
  btnSubmitComment.click(function (e) {
    e.preventDefault();

    backdrop.fadeIn(100);
    modal.fadeIn(100);
    modalQuestion.text("Are you sure you want to submit this comment?");
    modalBtn.addClass(
      "bg-green-600 hover:bg-green-800 focus:ring-green-300 dark:focus:ring-green-800 "
    );

    modalBtn.click(function () {
      let submitComment = {
        action: "submitComment",
        book_id: location.hash.slice(1),
        user_id: userId.val(),
        comment: comment.val(),
      };

      $.ajax({
        url: urlData,
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(submitComment),
        success: function (success) {},
        error: function (error) {
          console.log("Error: " + JSON.stringify(error));
        },
      });
      // location.reload();
    });
    closeModal.click(function () {
      modal.fadeOut(200);
      backdrop.fadeOut(200);
    });
  });

  // Get book notes
  let getNotes = {
    action: "getNotes",
    book_id: location.hash.slice(1),
    user_id: userId.val(),
  };

  $.ajax({
    url: urlData,
    type: "POST",
    contentType: "application/json",
    data: JSON.stringify(getNotes),
    success: function (itemsData) {
      if (itemsData.data.length === 0) {
        bookNotesDiv.addClass("hidden");
      } else {
        itemsData.data.forEach((element) => {

          let note = `<div class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-4">
      <p>${element.note}</p>
  </div>`;

          bookNotesDiv.append(note);
        });
        if(itemsData.data.length === 5){
          createNoteDiv.addClass("hidden");
        }
      }
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // Submit note
  btnSubmitNote.click(function (e) {
    e.preventDefault();

    backdrop.fadeIn(100);
    modal.fadeIn(100);
    modalQuestion.text("Are you sure you want to submit this note?");
    modalBtn.addClass(
      "bg-green-600 hover:bg-green-800 focus:ring-green-300 dark:focus:ring-green-800 "
    );

    modalBtn.click(function (e) {
      e.preventDefault();
      let submitNote = {
        action: "submitNote",
        book_id: location.hash.slice(1),
        user_id: userId.val(),
        note: note.val(),
      };

      $.ajax({
        url: urlData,
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(submitNote),
        success: function (success) {},
        error: function (error) {
          console.log("Error: " + JSON.stringify(error));
        },
      });
      location.reload();
    });
    closeModal.click(function () {
      modal.fadeOut(200);
      backdrop.fadeOut(200);
    });
  });
});
