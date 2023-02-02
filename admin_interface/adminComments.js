import { createPagination, postRequest, editItem, deleteItem } from "../common_items/commonFunctions.js";

$(function () {
    // Endpoint URLs
    let urlData = "../data_endpoints/admins/dataComments.php";
    let urlStatuses = "../data_endpoints/admins/dataStatuses.php";
  
    // admin item elements
    let tableBody = $("#tableBody");
    let pageNumbers = $("#pageNumbers");
    let showPageNo = $("#showPageNo");
    let selectStatus = $("#selectStatus");

 
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

      let getItems = {
        action: "getData",
        page: location.hash.slice(6),
        status: selectStatus.val(),
      }

      $.ajax({
        url: url,
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(getItems),
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
                      element.comment_id
                    }">
                    <td class="px-3 py-3 grid content-start">
                    <form method="POST">
                    <input type="hidden" name="action" value="edit">
                      <button type="button" class="w-20 text-white bg-green-700/80 hover:bg-green-600/80 focus:ring-1 focus:outline-none focus:ring-green-300 font-medium rounded text-xs px-2 py-1 my-1 text-center dark:bg-green-900 dark:hover:bg-green-800 dark:focus:ring-green-800" id="btnEditItem${
                        element.comment_id
                      }">Approve</button>
                      </form>
                      <form method="POST">
                      <input type="hidden" name="action" value="delete">
                      <button type="button" class="w-20 text-white bg-red-500/90 hover:bg-red-400 focus:ring-1 focus:outline-none focus:ring-red-300 font-medium rounded text-xs px-2 py-1 text-center dark:bg-red-900 dark:hover:bg-red-800 dark:focus:ring-red-800 "id="btnDeleteItem${
                        element.comment_id
                      }">Delete</button>
                    </form>
                    </td>
                    <td class="px-3 py-3 text-xs h-full align-text-top text-center">
                        ${element.status}
                    </td>
                    <td class="px-3 py-3 align-text-top text-right">
                        ${element.comment_id}
                    </td>
                    <td class="px-3 py-3 align-text-top text-right">
                        ${element.user_id}
                    </td>
                    <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white align-text-top">
                    ${element.name + " " + element.surname}
                    </th>
                    <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white align-text-top">
                    ${element.book_title}
                    </th>
                    <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white align-text-top">
                    ${element.comment}
                    </th>
                </tr>`);
  
                
            tableBody.append(tableRow);

            // Important variable for the next code
            let item = element.comment_id;

            if (element.comment_status == "2") {
                $(`#btnDeleteItem${item}`).addClass("hidden");
                $(`#btnEditItem${item}`).text("Activate");
                $(`#tableRow${item}`).addClass("bg-red-50");
            }

              
            // Activate item in database
            $(`#btnEditItem${item}`).click(function () {
              let editItemData = {
                action: "edit",
                comment_id: element.comment_id,
                comment_status: "1",
              };
              editItem(urlData, editItemData, postRequest);
              window.setTimeout(function () {
                location.reload();
              }, 2500);
              });

            // Soft delete item in database
            $(`#btnDeleteItem${item}`).click(function () {
              let deleteItemData = {
                action: "delete",
                comment_id: element.comment_id,
                comment_status: "2",
                };
                deleteItem(urlData, deleteItemData, postRequest);
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

// Show content according filter for comment status
    selectStatus.change(function (){
      tableBody.empty();
      showContent()
  })
  
    // AJAX GET data from statuses endpoint
    $.ajax({
        url: urlStatuses,
        type: "GET",
        success: function (dataStatuses) {
            dataStatuses.data.forEach((element) => {
            let statusOption = $(
              `<option value="${element.status_id}"></option>`
            );
            statusOption.text(element.status);
            selectStatus.append(statusOption);
          });
        },
        error: function (error) {
          console.log("Error: " + JSON.stringify(error));
        },
      });

  });
  