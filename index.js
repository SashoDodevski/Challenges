$(function () {
  // Endpoint URLs
  let urlData = "./booksInfo.php";

  // item elements
  let books = $("#books");

  let showContent = function () {
    // AJAX GET data from endpoint

    $.ajax({
      url: urlData,
      type: "GET",
      contentType: "application/json",
      success: function (itemsData) {

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
                            <p class="mb-3 font-bold text-green-700 dark:text-gray-400">${element.category}</p>
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
