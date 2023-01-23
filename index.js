$(function () {
  // Endpoint URLs
  let urlData = "./booksInfo.php";

  // item elements
  console.log("Hello from console");
  let books = $("#books");

  let showContent = function () {
    // AJAX GET data from endpoint

    $.ajax({
      url: urlData,
      type: "GET",
      contentType: "application/json",
      success: function (itemsData) {

        console.log(itemsData)
        // data from database
        itemsData.data.forEach((element) => {
   
        let card = $(`
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a>
                                <img class="rounded-t-lg mx-auto p-5 max-h-96" src="${element.book_image}" alt="" />
                            </a>
                            <div class="p-5">
                            <a>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">${element.book_title}</h5>
                            </a>
                            <h6 class="mb-2 text-sm font-bold tracking-tight text-gray-700 dark:text-white">${element.author_name + " " + element.author_surname}</h6>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${element.category}</p>
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                            </a>
                            </div>
                        </div>`);

        books.append(card);

          if (element.book_status === "DELETED") {
            $(`#btnDeleteItem${element.author_id}`).addClass("hidden");
            $(`#btnEditItem${element.author_id}`).text("Activate");
            $(`#tableRow${element.author_id}`).addClass("bg-red-50");
          }


        });

        setTimeout(function () {
          books.empty().hide().fadeIn(1500);
          showContent();
    
        }, 8500);
      },
      error: function (error) {
        console.log("Error: " + JSON.stringify(error));
      },
    });


  };

  // on load show content in item table
  showContent();

});
