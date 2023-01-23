import {
  testFunction,
  createPagination,
} from "./admin_interface/commonFunctions.js";

$(function () {
  // Endpoint URLs
  let urlData = "./booksInfo.php";

  // item elements
  let books = $("#books");
  let pageNumbers = $("#pageNumbers");
  let filterCategory = $("#filterCategory");
  let categoryCheckbox = $(".categoryCheckbox")

  let showContent = function () {
    // AJAX GET data from endpoint
    let page = "";
    if (location.hash.slice(6) === "") {
        page = "1";
      } else {
        page = location.hash.slice(6);
      }
    
    let url = "";
    if (location.hash === "") {
      url = urlData + "?page=1";
    } else {
      url = urlData + "?page=" + page["page"];
    }

    let getItems = {
      action: "getBooks",
      page: page
    };

    $.ajax({
      url: url,
      type: "POST",
      contentType: "application/json",
      data: JSON.stringify(getItems),
      success: function (itemsData) {
        createPagination(
          pageNumbers,
          itemsData.Total_pages,
          itemsData.Page,
          books
        );

        // books from database
        itemsData.data.forEach((element) => {
          let card = $(`
                      <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 ${element.category}">
                          <a href="./book.php#${element.book_id}">
                              <img class="rounded-t-lg mx-auto p-5 max-h-96" src="${
                                element.book_image
                              }" alt="" />
                          </a>
                          <div class="p-5">
                          <a href="./book.php#${element.book_id}">
                              <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">${
                                element.book_title
                              }</h5>
                          </a>
                          <h6 class="mb-2 text-sm font-bold tracking-tight text-gray-700 dark:text-white">${
                            element.author_name + " " + element.author_surname
                          }</h6>
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${
                            element.category
                          }</p>
                          <a href="./book.php#${element.book_id}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                              Read more
                          </a>
                          </div>
                      </div>`);

          books.append(card);
        });
      },
      error: function (error) {
        console.log("Error: " + JSON.stringify(error));
      },
    });
  };

// Category filters

  $.ajax({
    url: "./categoriesInfo.php",
    type: "GET",
    contentType: "application/json",
    success: function (itemsData) {
      

      // books from database
      itemsData.data.forEach((element) => {
        let category = $(`
        <div class="flex items-center ml-4">
            <input id="${element.category}" type="checkbox" value="#${element.category}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 categoryCheckbox">
            <label for="${element.category}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">  ${element.category}</label>
        </div>`);

        filterCategory.append(category);
      });
    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });


  categoryCheckbox.click(
      console.log("click")
   )


  // on load show content in item table
  showContent();
});
