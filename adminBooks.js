$(function () {
  // Endpoint URLs
  let urlAuthors = "dataAuthors.php";
  let urlBooks = "dataBooks.php";
  let urlCategories = "dataCategories.php";
  let urlComments = "dataComments.php";
  let urlBooksFullInfo = "booksFullInfo.php";

  // admin BOOKS elements
  let divBook = $("#divBook");
  let divBookBackdrop = $("#divBook-backdrop");
  let formBook = $("#formBook");
  let bookID = $("#bookID");
  let bookTitle = $("#bookTitle");
  let author = $("#author");
  let bookCategory = $("#bookCategory");
  let publicationYear = $("#publicationYear");
  let numberOfPages = $("#numberOfPages");
  let bookImageUrl = $("#bookImageUrl");
  let msgBookForm = $("#msgBookForm");
  let btnSubmitBook = $("#btnSubmitBook");
  let btnSubmitEditedBook = $("#btnSubmitEditedBook");
  let btnAddBook = $("#btnAddBook");
  let btnCloseBookForm = $(".btnCloseBookForm");
  let divTableBooks = $("#divTableBooks");
  let tableBodyBooks = $("#tableBodyBooks");
  let bookPageNumbers = $("#bookPageNumbers");
  let showPageNo = $("#showPageNo");
  let deleteModal = $("#deleteModal");
  let deleteModalBtn = $(".deleteModalBtn");
  let closeDeleteModal = $(".closeDeleteModal");

  let showBooksContent = function () {
    // AJAX GET data from BOOKS FULL INFO endpoint
    let bookPage = {
      page: location.hash.slice(12),
    };
    let url = "";
    if (location.hash === "") {
      url = urlBooks;
    } else {
      url = urlBooks + "?page=" + bookPage["page"];
    }

    $.ajax({
      url: url,
      type: "GET",
      contentType: "application/json",
      data: JSON.stringify(bookPage),
      success: function (booksFullInfo) {

        // Setup Pagination Buttons
        function createPagination(wrapper, totalPages, page) {
          let active;
          wrapper.empty()
          if (page > 1) {
            let firstPageBtn = $(`<button  value="1" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">First
            </button>`);
            firstPageBtn.click(function () {
              let pageNumber = location.hash.slice(12);
              pageNumber = 1;
              let urlHash = "Books_Page_" + pageNumber;
              location.hash = urlHash;
              tableBodyBooks.empty();
              showBooksContent();
            });
            wrapper.append(firstPageBtn);
          }

          for (let plength = parseFloat(page)-1; plength <= parseFloat(page)+1; plength++) {
            if (plength > totalPages) {
              continue;
            }
            if (plength == 0) {
              plength = plength + 1;
            }
            if (page == plength) {
              active = "text-blue-500";
            } else {
              active = "";
            }
            let button = $(`<button value="${plength}" class="px-4 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ${active}">${plength}</button>`);
            button.click(function () {
              let urlHash = "Books_Page_" + button.val();
              location.hash = urlHash;
              tableBodyBooks.empty();
              showBooksContent();
            });
            wrapper.append(button);
          }

          if (page < totalPages) {
            let nextBtn = $(`<button value="${totalPages}" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Last</button>`);
            wrapper.append(nextBtn);
            nextBtn.click(function () {
                let pageNumber = location.hash.slice(12);
                pageNumber = parseFloat(pageNumber)
                pageNumber = totalPages;
                let urlHash = "Books_Page_" + pageNumber;
                location.hash = urlHash;
                tableBodyBooks.empty();
                showBooksContent();
            });
          }
        }
        bookPageNumbers.html(
          createPagination(bookPageNumbers, booksFullInfo.Total_pages, booksFullInfo.Page)
        );

        showPageNo.text(`Page ${booksFullInfo.Page} of ${booksFullInfo.Total_pages}`)

        // Inserting book data in book table
        booksFullInfo.data.forEach((element) => {
          let tableRow = $(`
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="tableBookRow${
                    element["book_id"]
                  }">
                  <td class="px-3 py-3">
                  <form method="POST">
                  <input type="hidden" name="action" value="edit">
                    <button type="submit" class="w-full text-white bg-green-700/80 hover:bg-green-600/80 focus:ring-1 focus:outline-none focus:ring-green-300 font-medium rounded text-xs px-2 py-1 my-1 text-center dark:bg-green-900 dark:hover:bg-green-800 dark:focus:ring-green-800" id="btnEditBook${
                      element["book_id"]
                    }">Edit</button>
                    </form>
                    <form method="POST">
                    <input type="hidden" name="action" value="delete">
                    <button data-modal-target="deleteModal" data-modal-toggle="defaultModal" type="button" class="w-full text-white bg-red-500/90 hover:bg-red-400 focus:ring-1 focus:outline-none focus:ring-red-300 font-medium rounded text-xs px-2 py-1 text-center dark:bg-red-900 dark:hover:bg-red-800 dark:focus:ring-red-800 "id="btnDeleteBook${
                      element["book_id"]
                    }">Delete</button>
                  </form>
                  </td>
                  <td class="px-3 py-3 text-xs">
                    <div>
                      <p class="text-xs">${element["book_status"]}</p>
                    </div>
                  </td>
                  <td class="px-3 py-3 text-right">
                      ${element["book_id"]}
                  </td>
                  <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      ${element["book_title"]}
                  </th>
                  <td class="px-3 py-3">
                      ${
                        element["author_name"] + " " + element["author_surname"]
                      }
                  </td>
                  <td class="px-3 py-3 text-center">
                      ${element["book_category"]}
                  </td>
                  <td class="px-3 py-3 text-center">
                      ${element["publication_year"]}
                  </td>
                  <td class="px-3 py-3 text-center">
                      ${element["no_of_pages"]}
                  </td>
                  <td class="px-3 py-3">
                      ${element["book_image"]}
                  </td>
              </tr>`);

          tableBodyBooks.append(tableRow);
          if (element["book_status"] === "DELETED") {
            $(`#btnDeleteBook${element["book_id"]}`).addClass("hidden");
            $(`#btnEditBook${element["book_id"]}`).text("Activate");
            // btnSubmitEditedBook.text("Activate book")
            $(`#tableBookRow${element["book_id"]}`).addClass("bg-red-50");
          }

          // Soft delete BOOK in database
          $(`#btnDeleteBook${element["book_id"]}`).click(function () {
            divBookBackdrop.fadeIn(100)
            deleteModal.fadeIn(100)
            deleteModalBtn.attr("id", `deleteModalBtn${element["book_id"]}`)
            $(`#deleteModalBtn${element["book_id"]}`).click(function () {
            let deleteBook = {
              action: "delete",
              book_status: "DELETED",
              book_id: element["book_id"],
            };

            $.ajax({
              url: urlBooks,
              type: "POST",
              contentType: "application/json",
              data: JSON.stringify(deleteBook),
              success: function (deleteBook) {},
              error: function (error) {
                console.log("Error: " + JSON.stringify(error));
              },
            });
            deleteModal.fadeOut(200)
            divBookBackdrop.fadeOut(200)
            window.setTimeout(function(){location.reload()},200)
            })
            closeDeleteModal.click(function(){
              deleteModal.fadeOut(200)
              divBookBackdrop.fadeOut(200)
            })
          });

          // Edit BOOK in database
          $(`#btnEditBook${element["book_id"]}`).click(function (e) {
            e.preventDefault();
            $(`#author value:${element["book_author_id"]}`).prop(
              "selected",
              true
            );
            $(`#bookCategory value:${element["book_category_id"]}`).prop(
              "selected",
              true
            );

            bookTitle.val(element["book_title"]);
            author.val(element["book_author_id"]);
            bookCategory.val(element["book_category_id"]);
            publicationYear.val(element["publication_year"]);
            numberOfPages.val(element["no_of_pages"]);
            bookImageUrl.val(element["book_image"]);

            divBookBackdrop.fadeIn(150);
            divBook.fadeIn(150);
            btnSubmitBook.addClass("hidden");
            btnSubmitEditedBook.removeClass("hidden");

            btnSubmitEditedBook.click(function () {
              let editBook = {
                action: "edit",
                book_status: "ACTIVE",
                book_id: element["book_id"],
                book_title: bookTitle.val(),
                book_author_id: author.val(),
                book_category_id: bookCategory.val(),
                publication_year: publicationYear.val(),
                no_of_pages: numberOfPages.val(),
                book_image: bookImageUrl.val(),
              };

              $.ajax({
                url: urlBooks,
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify(editBook),
                success: function (editBook) {},
                error: function (error) {
                  console.log("Error: " + JSON.stringify(error));
                },
              });
              location.reload();
            });
          });
        });
      },
      error: function (error) {
        console.log("Error: " + JSON.stringify(error));
      },
    });
  };

  // on load show content in BOOK table
  $(document).ready(showBooksContent);

  // AJAX GET data from AUTHORS endpoint
  $.ajax({
    url: urlAuthors,
    type: "GET",
    success: function (authorData) {
      authorData.forEach((element) => {
        let authorOption = $(
          `<option value="${element["author_id"]}"></option>`
        );
        authorOption.text(
          element["author_name"] + " " + element["author_surname"]
        );
        author.append(authorOption);
      });
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // AJAX GET data from BOOKS endpoint
  $.ajax({
    url: urlBooks,
    type: "GET",
    success: function (bookData) {},
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // AJAX GET data from CATEGORIES endpoint
  $.ajax({
    url: urlCategories,
    type: "GET",
    success: function (categoryData) {
      categoryData.forEach((element) => {
        let categoryOption = $(
          `<option value="${element["category_id"]}"></option>`
        );
        categoryOption.text(element["book_category"]);
        bookCategory.append(categoryOption);
      });
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // AJAX GET data from COMMENTS endpoint
  $.ajax({
    url: urlComments,
    type: "GET",
    success: function (commentData) {},
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // Submit new BOOK to database
  btnSubmitBook.click(function (e) {
    e.preventDefault();

    let bookData = {
      action: "create",
      book_title: bookTitle.val(),
      book_author_id: author.val(),
      book_category_id: bookCategory.val(),
      publication_year: publicationYear.val(),
      no_of_pages: numberOfPages.val(),
      book_image: bookImageUrl.val(),
    };

    let formBookValidation = function () {
      if (
        bookTitle.val() === "" ||
        author.val() === "" ||
        bookCategory.val() === "" ||
        publicationYear.val() === "" ||
        numberOfPages.val() === "" ||
        bookImageUrl.val() === ""
      ) {
        msgBookForm.text("All field are required!");
        msgBookForm.addClass("text-red-500");
      } else {
        $.ajax({
          url: urlBooks,
          type: "POST",
          contentType: "application/json",
          data: JSON.stringify(bookData),
          success: function (bookData) {
            console.log("Successfuly sent AJAX POST request." + bookData);
          },
          error: function (error) {
            console.log("Error: " + JSON.stringify(error));
          },
        });
        msgBookForm.text("Book successfuly added!");
        msgBookForm.addClass("text-green-500");
        window.setTimeout(function(){location.reload()},700)
      }
    };
    formBookValidation();
  });

  btnCloseBookForm.click(function () {
    divBookBackdrop.fadeOut(150);
    divBook.fadeOut(150);
  });

  btnAddBook.click(function () {
    divBookBackdrop.fadeIn(150);
    divBook.fadeIn(150);
    btnSubmitBook.removeClass("hidden");
    btnSubmitEditedBook.addClass("hidden");
  });

});
