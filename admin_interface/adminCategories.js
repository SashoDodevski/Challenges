import { testFunction, createPagination } from "../common_items/commonFunctions.js";

$(function () {
    // Endpoint URLs
    let urlData = "../data_endpoints_admins/dataCategories.php";
  
    // admin item elements
    let divMain = $("#divMain");
    let divMainBackdrop = $("#divMain-backdrop");
    let formMain = $("#formMain");
  
    let category = $("#category");
  
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="tableRow${
                      element["category_id"]
                    }">
                    <td class="px-3 py-3 grid content-start">
                    <form method="POST">
                    <input type="hidden" name="action" value="edit">
                      <button type="submit" class="w-20 text-white bg-green-700/80 hover:bg-green-600/80 focus:ring-1 focus:outline-none focus:ring-green-300 font-medium rounded text-xs px-2 py-1 my-1 text-center dark:bg-green-900 dark:hover:bg-green-800 dark:focus:ring-green-800" id="btnEditItem${
                        element["category_id"]
                      }">Edit</button>
                      </form>
                      <form method="POST">
                      <input type="hidden" name="action" value="delete">
                      <button data-modal-target="deleteModal" data-modal-toggle="defaultModal" type="button" class="w-20 text-white bg-red-500/90 hover:bg-red-400 focus:ring-1 focus:outline-none focus:ring-red-300 font-medium rounded text-xs px-2 py-1 text-center dark:bg-red-900 dark:hover:bg-red-800 dark:focus:ring-red-800 "id="btnDeleteItem${
                        element["category_id"]
                      }">Delete</button>
                    </form>
                    </td>
                    <td class="px-3 py-3 text-xs h-full align-text-top text-center">
                        ${element["category_status"]}
                    </td>
                    <td class="px-3 py-3 align-text-top text-right">
                        ${element["category_id"]}
                    </td>
                    <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white align-text-top">
                    ${element["category"]}
                    </th>
                </tr>`);
  
                
            tableBody.append(tableRow);

            // Important variable for the next code
            let item = element["category_id"];

            if (element["category_status"] === "DELETED") {
                $(`#btnDeleteItem${item}`).addClass("hidden");
                $(`#btnEditItem${item}`).text("Activate");
                $(`#tableRow${item}`).addClass("bg-red-50");
            }

            // Soft delete item in database
            $(`#btnDeleteItem${item}`).click(function () {
              divMainBackdrop.fadeIn(100);
              deleteModal.fadeIn(100);
              deleteModalBtn.attr("id", `deleteModalBtn${item}`);

              $(`#deleteModalBtn${item}`).click(function () {
                let deleteItem = {
                action: "delete",
                category_id: element["category_id"],
                category_status: "DELETED",
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
            $(`#btnEditItem${item}`).click(function (e) {
              e.preventDefault();
  
              category.val(element["category"]);
                            
              $("#divMain h1").text("Edit item")
  
              divMainBackdrop.fadeIn(150);
              divMain.fadeIn(150);
              btnSubmitItem.addClass("hidden");
              btnSubmitEditedItem.removeClass("hidden");
  
              btnSubmitEditedItem.click(function () {
                let editItem = {
                    action: "edit",
                    category_id: element["category_id"],
                    category: category.val(),
                    category_status: "ACTIVE"
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
    $(document).ready(showContent);
  
    
    // Submit new item to database
    btnSubmitItem.click(function (e) {
      e.preventDefault();
  
      let newItem = {
        action: "create",
        category: category.val(),
        category_status: "ACTIVE"
      };
  
      let newItemFormValidation = function () {
        if (
            category.val() === ""
        ) {
          msgForm.text("All field are required!");
          msgForm.addClass("text-red-500");
        } else {
          $.ajax({
            url: urlData,
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(newItem),
            success: function (success) {},
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
      newItemFormValidation();
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
  