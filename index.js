$(function () {
  // Endpoint URLs
  let urlData = "./data_endpoints/clients/booksInfo.php";

  // item elements
  let books = $("#books");

  let showContent = function () {
    // AJAX GET data from endpoint

      let getItems = {
        action: "getBannerBooks"
      };


    $.ajax({
      url: urlData,
      type: "GET",
      contentType: "application/json",
      data: getItems,
      success: function (itemsData) {

        // data from database
        itemsData.data.forEach((element) => {
   
        let card = $(`
        <div class="max-w-fit bg-none text-center">
        <a href="./book.php#${element.book_id}">
            <img class="rounded-xl shadow-lg mx-auto min-w-28 max-h-96" src="${element.book_image}" alt=""/>
        </a>
        <div class="p-2">
            <a href="./book.php#${element.book_id}">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-800 dark:text-white">${element.book_title}</h5>
            </a>
            <h6 class="mb-2 text-sm font-bold tracking-tight text-gray-700 dark:text-white">by ${element.author_name} ${element.author_surname}</h6>
            <p class="mb-3 font-bold text-teal-700 dark:text-gray-400">${element.category}</p>
        </div>
    </div>`);

        books.append(card);


        });

        setTimeout(function () {
          books.empty().hide().fadeIn(1500);
          showContent();
    
        }, 3500);
      },
      error: function (error) {
        console.log("Error: " + JSON.stringify(error));
      },
    });
  };

  // on load show content in item table
  showContent();

});
