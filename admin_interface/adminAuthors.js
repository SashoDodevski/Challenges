import { testFunction, createPagination } from "./commonFunctions.js";

$(function () {
  // Endpoint URLs
  let urlData = "../data_endpoints/dataAuthors.php";

  // admin item elements
  let divMain = $("#divMain");
  let divMainBackdrop = $("#divMain-backdrop");
  let formMain = $("#formMain");

  let authorName = $("#authorName");
  let authorSurname = $("#authorSurname");
  let authorCV = $("#authorCV");

  let msgForm = $("#msgForm");
  let btnSubmitItem = $("#btnSubmitItem");
  let btnSubmitEditedItem = $("#btnSubmitEditedItem");
  let btnAddNewItem = $("#btnAddNewItem");
  let btnCloseForm = $(".btnCloseForm");
  let divTable = $("#divTable");
  let tableBody = $("#tableBody");
  let pageNumbers = $("#pageNumbers");
  let showPageNo = $("#showPageNo");
  let deleteModal = $("#deleteModal");
  let deleteModalBtn = $(".deleteModalBtn");
  let closeDeleteModal = $(".closeDeleteModal");

  let showContent = function () {
    // AJAX GET data from endpoint
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
          createPagination(pageNumbers, itemsData.Total_pages, itemsData.Page, tableBody)
        );

        showPageNo.text(`Page ${itemsData.Page} of ${itemsData.Total_pages}`);

        // data from database
        itemsData.data.forEach((element) => {
          // Fill table with data
          let tableRow = $(`
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="tableRow${element["author_id"]}">
                    <td class="px-3 py-3 grid content-start">
                    <form method="POST">
                    <input type="hidden" name="action" value="edit">
                      <button type="submit" class="w-20 text-white bg-green-700/80 hover:bg-green-600/80 focus:ring-1 focus:outline-none focus:ring-green-300 font-medium rounded text-xs px-2 py-1 my-1 text-center dark:bg-green-900 dark:hover:bg-green-800 dark:focus:ring-green-800" id="btnEditItem${element["author_id"]}">Edit</button>
                      </form>
                      <form method="POST">
                      <input type="hidden" name="action" value="delete">
                      <button data-modal-target="deleteModal" data-modal-toggle="defaultModal" type="button" class="w-20 text-white bg-red-500/90 hover:bg-red-400 focus:ring-1 focus:outline-none focus:ring-red-300 font-medium rounded text-xs px-2 py-1 text-center dark:bg-red-900 dark:hover:bg-red-800 dark:focus:ring-red-800 "id="btnDeleteItem${element["author_id"]}">Delete</button>
                    </form>
                    </td>
                    <td class="px-3 py-3 text-xs h-full align-text-top text-center">
                        ${element["author_status"]}
                    </td>
                    <td class="px-3 py-3 align-text-top text-right">
                        ${element["author_id"]}
                    </td>
                    <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white align-text-top">
                    ${element["author_name"]}
                    </th>
                    <td scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white align-text-top">
                        ${element["author_surname"]}
                    </td>
                    <td class="px-3 py-3 text-left">
                        ${element["author_CV"]}
                    </td>
                </tr>`);

          tableBody.append(tableRow);


          if (element.author_status === "DELETED") {
            $(`#btnDeleteItem${element.author_id}`).addClass("hidden");
            $(`#btnEditItem${element.author_id}`).text("Activate");
            $(`#tableRow${element.author_id}`).addClass("bg-red-50");
          }

          // Soft delete item in database
          $(`#btnDeleteItem${element.author_id}`).click(function () {
            divMainBackdrop.fadeIn(100);
            deleteModal.fadeIn(100);
            deleteModalBtn.attr("id", `deleteModalBtn${element.author_id}`);
            $(`#deleteModalBtn${element.author_id}`).click(function () {
              let deleteItem = {
                action: "delete",
                author_status: "DELETED",
                author_id: element.author_id,
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
              deleteModal.fadeOut(200);
              divMainBackdrop.fadeOut(200);
              window.setTimeout(function () {
                location.reload();
              }, 200);
            });
            closeDeleteModal.click(function () {
              deleteModal.fadeOut(200);
              divMainBackdrop.fadeOut(200);
            });
          });

          // Edit item in database
          $(`#btnEditItem${element.author_id}`).click(function (e) {
            e.preventDefault();

            authorName.val(element.author_name);
            authorSurname.val(element.author_surname);
            authorCV.val(element.author_CV);

            $("#divMain h1").text("Edit item");

            divMainBackdrop.fadeIn(150);
            divMain.fadeIn(150);
            btnSubmitItem.addClass("hidden");
            btnSubmitEditedItem.removeClass("hidden");

            btnSubmitEditedItem.click(function () {
              let editItem = {
                action: "edit",
                author_status: "ACTIVE",
                author_id: element.author_id,
                author_name: authorName.val(),
                author_surname: authorSurname.val(),
                author_CV: authorCV.val(),
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
          });
        });
      },
      error: function (error) {
        console.log("Error: " + JSON.stringify(error));
      },
    });
  };

  // on load show content in item table
  showContent();

  // Submit new item to database

  let createNewItem = function () {
    if (
      authorName.val() === "",
      authorSurname.val() === "",
      authorCV.val() === ""
    ) {
      msgForm.text("All field are required!");
      msgForm.addClass("text-red-500");
    } else {
      $.ajax({
        url: urlData,
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(newItem),
        success: function (success) {
          console.log(success);
        },
        error: function (error) {
          console.log("Error: " + JSON.stringify(error));
        },
      });
      msgForm.text("Category successfuly added!");
      msgForm.addClass("text-green-500");
      window.setTimeout(function () {
        location.reload();
      }, 700);
    }
  };
  createNewItem();
  
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
