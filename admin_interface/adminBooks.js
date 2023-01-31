import {
  createPagination,
  postRequest,
  submitItem,
  editItem,
  deleteItem,
} from "../common_items/commonFunctions.js";

$(function () {
  // Endpoint URLs
  let urlData = "../data_endpoints_admins/dataBooks.php";
  let urlAuthors = "../data_endpoints_admins/dataAuthors.php";
  let urlCategories = "../data_endpoints_admins/dataCategories.php";

  // admin item elements
  let divMain = $("#divMain");
  let divMainBackdrop = $("#divMain-backdrop");
  let formMain = $("#formMain");
  let bookTitle = $("#bookTitle");
  let author = $("#author");
  let bookCategory = $("#bookCategory");
  let publicationYear = $("#publicationYear");
  let numberOfPages = $("#numberOfPages");
  let bookImageUrl = $("#bookImageUrl");
  let msgForm = $("#msgForm");
  let btnSubmitItem = $("#btnSubmitItem");
  let btnSubmitEditedItem = $("#btnSubmitEditedItem");
  let btnAddNewItem = $("#btnAddNewItem");
  let btnCloseForm = $(".btnCloseForm");
  let tableBody = $("#tableBody");
  let pageNumbers = $("#pageNumbers");
  let showPageNo = $("#showPageNo");

  // AJAX GET data from AUTHORS endpoint
  $.ajax({
    url: urlAuthors,
    type: "GET",
    success: function (dataAuthors) {
      dataAuthors.data.forEach((element) => {
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

  // AJAX GET data from CATEGORIES endpoint
  $.ajax({
    url: urlCategories,
    type: "GET",
    success: function (dataCategories) {
      dataCategories.data.forEach((element) => {
        let categoryOption = $(
          `<option value="${element["category_id"]}"></option>`
        );
        categoryOption.text(element["category"]);
        bookCategory.append(categoryOption);
      });
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  // AJAX GET data from BOOKS endpoint
  let page = {
    page: location.hash.slice(6),
  };
  let url = "";
  if (location.hash === "") {
    url = urlData;
  } else {
    url = urlData + "?page=" + page["page"];
  }

  $.ajax({
    url: url,
    type: "GET",
    contentType: "application/json",
    data: JSON.stringify(page),
    success: function (itemsData) {
      // Setup Pagination Buttons
      pageNumbers.html(
        createPagination(
          pageNumbers,
          itemsData.Total_pages,
          itemsData.Page,
          tableBody
        )
      );

      showPageNo.text(`Page ${itemsData.Page} of ${itemsData.Total_pages}`);

      // data from database
      itemsData.data.forEach((element) => {
        // Fill table with data
        let tableRow = $(`
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="tableRow${
                    element["book_id"]
                  }">
                  <td class="px-3 py-3">
                  <form method="POST">
                  <input type="hidden" name="action" value="edit">
                    <button type="submit" class="w-full text-white bg-green-700/80 hover:bg-green-600/80 focus:ring-1 focus:outline-none focus:ring-green-300 font-medium rounded text-xs px-2 py-1 my-1 text-center dark:bg-green-900 dark:hover:bg-green-800 dark:focus:ring-green-800" id="btnEditItem${
                      element["book_id"]
                    }">Edit</button>
                    </form>
                    <form method="POST">
                    <input type="hidden" name="action" value="delete">
                    <button data-modal-target="deleteModal" data-modal-toggle="defaultModal" type="button" class="w-full text-white bg-red-500/90 hover:bg-red-400 focus:ring-1 focus:outline-none focus:ring-red-300 font-medium rounded text-xs px-2 py-1 text-center dark:bg-red-900 dark:hover:bg-red-800 dark:focus:ring-red-800 "id="btnDeleteItem${
                      element["book_id"]
                    }">Delete</button>
                  </form>
                  </td>
                  <td class="px-3 py-3 text-xs">
                    <div>
                      <p class="text-xs">${element["status"]}</p>
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
                      ${element["category"]}
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

        // Important variable for the next code
        let item = element["book_id"];

        tableBody.append(tableRow);
        if (element["status"] === "DELETED") {
          $(`#btnDeleteItem${item}`).addClass("hidden");
          $(`#btnEditItem${item}`).text("Activate");
          $(`#tableRow${item}`).addClass("bg-red-50");
        }

        // Submit new item to database
        btnSubmitItem.click(function () {
          if (
            bookTitle.val() === "" ||
            author.val() === "" ||
            bookCategory.val() === "" ||
            publicationYear.val() === "" ||
            numberOfPages.val() === "" ||
            bookImageUrl.val() === ""
          ) {
            msgForm.text("All field are required!");
            msgForm.addClass("text-red-500");
          } else {
            let submitItemData = {
              action: "create",
              book_status: "1",
              book_title: bookTitle.val(),
              author_id: author.val(),
              category_id: bookCategory.val(),
              publication_year: publicationYear.val(),
              no_of_pages: numberOfPages.val(),
              book_image: bookImageUrl.val(),
            };

            submitItem(urlData, submitItemData, postRequest);
          }
        });

        // Edit item in database
        $(`#btnEditItem${item}`).click((e) => {
          e.preventDefault();
          $(`#author value:${element["author_id"]}`).prop("selected", true);
          $(`#bookCategory value:${element["category_id"]}`).prop(
            "selected",
            true
          );

          bookTitle.val(element["book_title"]);
          author.val(element["author_id"]);
          bookCategory.val(element["category_id"]);
          publicationYear.val(element["publication_year"]);
          numberOfPages.val(element["no_of_pages"]);
          bookImageUrl.val(element["book_image"]);

          $("#divMain h1").text("Edit item");
          divMainBackdrop.fadeIn(150);
          divMain.fadeIn(150);
          btnSubmitItem.addClass("hidden");
          btnSubmitEditedItem.removeClass("hidden");

          btnSubmitEditedItem.click(() => {
            let editItemData = {
              action: "edit",
              book_status: "1",
              book_id: item,
              book_title: bookTitle.val(),
              author_id: author.val(),
              category_id: bookCategory.val(),
              publication_year: publicationYear.val(),
              no_of_pages: numberOfPages.val(),
              book_image: bookImageUrl.val(),
            };
            editItem(urlData, editItemData, postRequest);
            window.setTimeout(function () {
              location.reload();
            }, 2500);
          });
        });

        // Soft delete item in database
        $(`#btnDeleteItem${item}`).click(function () {
          let deleteItemData = {
            action: "delete",
            book_status: "2",
            book_id: item,
          };
          deleteItem(urlData, deleteItemData, postRequest);
        });
      });
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });

  btnCloseForm.click(function () {
    divMainBackdrop.fadeOut(150);
    divMain.fadeOut(150);
    formMain.delay(900).trigger("reset");
  });

  btnAddNewItem.click(function () {
    divMainBackdrop.fadeIn(150);
    divMain.fadeIn(150);
    btnSubmitItem.removeClass("hidden");
    btnSubmitEditedItem.addClass("hidden");
  });
});
