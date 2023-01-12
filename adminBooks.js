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
  let bookID = $("#bookID")
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
  let btnCloseBookForm = $("#btnCloseBookForm");

  let divTableBooks = $("#divTableBooks");
  let tableBodyBooks = $("#tableBodyBooks");

  // AJAX GET data from AUTHORS endpoint
  $.ajax({
    url: urlAuthors,
    type: "GET",
    success: function (authorData) {
      authorData.forEach((element) => {
        let authorOption = $(`<option value="${element["author_id"]}"></option>`);
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
        let categoryOption = $(`<option value="${element["category_id"]}"></option>`);
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

  // AJAX GET data from BOOKS FULL INFO endpoint
  $.ajax({
    url: urlBooksFullInfo,
    type: "GET",
    success: function (booksFullData) {
      // Insert data to BOOK TABLE
      booksFullData.forEach((element) => {
        let tableRow = $(`
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="tableBookRow${element["book_id"]}">
                <td class="px-3 py-3">
                <form action="" method="POST">
                <input type="hidden" name="action" value="edit">
                  <button type="submit" class="w-full text-white bg-green-700/80 hover:bg-green-600/80 focus:ring-1 focus:outline-none focus:ring-green-300 font-medium rounded text-xs px-2 py-1 my-1 text-center dark:bg-green-900 dark:hover:bg-green-800 dark:focus:ring-green-800" id="btnEditBook${element["book_id"]}">Edit</button>
                  </form>
                  <form action="" method="POST">
                  <input type="hidden" name="action" value="delete">
                  <button type="submit" class="w-full text-white bg-red-500/90 hover:bg-red-400 focus:ring-1 focus:outline-none focus:ring-red-300 font-medium rounded text-xs px-2 py-1 text-center dark:bg-red-900 dark:hover:bg-red-800 dark:focus:ring-red-800 "id="btnDeleteBook${element["book_id"]}">Delete</button>
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
                    ${element["author_name"] + " " + element["author_surname"]}
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
            </tr>
                `);
        tableBodyBooks.append(tableRow);
        if(element["book_status"] === "DELETED"){
          $(`#btnDeleteBook${element["book_id"]}`).addClass("hidden")
          $(`#tableBookRow${element["book_id"]}`).addClass("bg-gray-100")
        }

        // Soft delete BOOK in database
       $(`#btnDeleteBook${element["book_id"]}`).click(function () {

          let deleteBook = ({
            action: "delete",
            book_status: "DELETED",
            book_id: element["book_id"]
          })

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
          location. reload()
        });

        // Edit BOOK in database
        $(`#btnEditBook${element["book_id"]}`).click(function(e){
          e.preventDefault()
          $(`#author value:${element["book_author_id"]}`).prop("selected", true)
          $(`#bookCategory value:${element["book_category_id"]}`).prop("selected", true)
          
          bookTitle.val(element["book_title"])
          author.val(element["book_author_id"])
          bookCategory.val(element["book_category_id"])
          publicationYear.val(element["publication_year"])
          numberOfPages.val(element["no_of_pages"])
          bookImageUrl.val(element["book_image"])

          function toggleModal(){
            divBook.toggleClass("hidden");
            divBookBackdrop.toggleClass("hidden");
            divBook.toggleClass("flex");
            divBookBackdrop.toggleClass("flex");
            btnSubmitBook.addClass("hidden")
          }
          toggleModal()

          btnSubmitEditedBook.click(function () {

            let editBook = ({
              action: "edit",
              book_status: "ACTIVE",
              book_id: element["book_id"],
              book_title: bookTitle.val(),
              book_author_id: author.val(),
              book_category_id: bookCategory.val(),
              publication_year: publicationYear.val(),
              no_of_pages: numberOfPages.val(),
              book_image: bookImageUrl.val(),
            })
  
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
            location. reload()
          });
        })

      });

    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // Submit BOOK to database
  btnSubmitBook.click(function (e) {
    e.preventDefault();

    let bookData = {
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
        msgBookForm.text("Book successfuly added!");
        msgBookForm.addClass("text-green-500");

        $.ajax({
          url: "insertBook.php",
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
      }

      formBook[0].reset();
      formBook[1].reset();
      formBook[2].reset();
      formBook[3].reset();
      formBook[4].reset();
      formBook[5].reset();
    };
    formBookValidation();
  });

  btnAddBook.click(
    function toggleModal(){
      divBook.toggleClass("hidden");
      divBookBackdrop.toggleClass("hidden");
      divBook.toggleClass("flex");
      divBookBackdrop.toggleClass("flex");
      btnSubmitEditedBook.addClass("hidden")
    }
  )

  btnCloseBookForm.click(
    function toggleModal(){
      divBook.toggleClass("hidden");
      divBookBackdrop.toggleClass("hidden");
      divBook.toggleClass("flex");
      divBookBackdrop.toggleClass("flex");
    }
  )
  


});
