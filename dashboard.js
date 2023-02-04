import {
  createPagination,
} from "./common_items/commonFunctions.js";

$(function () {
  // Endpoint URLs
  let urlData = "./data_endpoints/clients/booksInfo.php";

  // item elements
  let books = $("#books");
  let pageNumbers = $("#pageNumbers");
  let filterCategory = $("#filterCategory");
  let categoryCheckbox = $(".categoryCheckbox");
  let showHideFilter = $(".showHideFilter");
  let hiddenDiv = $(".hiddenDiv");


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
      type: "GET",
      contentType: "application/json",
      data: getItems,
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
          <div class="max-w-fit bg-none text-center my-10 ${element.category_id} card">
          <a href="./book.php#${element.book_id}">
              <img class="rounded-xl shadow-lg mx-auto min-w-28 max-h-96" src="${element.book_image}" alt="" />
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
      },
      error: function (error) {
        console.log("Error: " + JSON.stringify(error));
      },
    });
  };

// Category filters

  $.ajax({
    url: "./data_endpoints/clients/categoriesInfo.php",
    type: "GET",
    success: function (itemsData) {
      
      // books from database
      itemsData.data.forEach((element) => {
        let category = $(`
          <div class="flex items-left ml-4 my-3">
            <input id="${element.category}" type="checkbox" rel="${element.category_id}" class="w-4 h-4 text-cyan-600 bg-gray-100 border-gray-300 rounded focus:ring-cyan-500 dark:focus:ring-cyan-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 categoryCheckbox">
            <label for="${element.category}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">  ${element.category}</label>
          </div>
        `);

        filterCategory.append(category);
      });



    },
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });



  // on load show content in item table
  showContent();

  
  // Filter category
  
  $("body").on("click",".categoryCheckbox", (e) => {

    change()
    function change() {
      let categoryCheckboxes = $(".categoryCheckbox");
      
      let filters = {
        categories: getClassOfCheckedCheckboxes(categoryCheckboxes),
      };
    
      filterResults(filters);
    }
    
    function getClassOfCheckedCheckboxes(checkboxes) {
      let classes = [];
    
      if (checkboxes && checkboxes.length > 0) {
        for (let i = 0; i < checkboxes.length; i++) {
          let cb = checkboxes[i];
    
          if (cb.checked) {
            classes.push(cb.getAttribute("rel"));
          }
        }
      }
    
      return classes;
    }
    
    function filterResults(filters) {
      let rElems = $("#books .card");
      let hiddenElems = [];
    
      if (!rElems || rElems.length <= 0) {
        return;
      }
    
      for (let i = 0; i < rElems.length; i++) {
        let el = rElems[i];
    
        if (filters.categories.length > 0) {
          let isHidden = true;
    
          for (let j = 0; j < filters.categories.length; j++) {
            let filter = filters.categories[j];
    
            if (el.classList.contains(filter)) {
              isHidden = false;
              break;
            }
          }
    
          if (isHidden) {
            hiddenElems.push(el);
          }
        }
    
      }
    
      for (let i = 0; i < rElems.length; i++) {
        rElems[i].style.display = "block";
      }
    
      if (hiddenElems.length <= 0) {
        return;
      }
    
      for (let i = 0; i < hiddenElems.length; i++) {
        hiddenElems[i].style.display = "none";
      }
    }

});


showHideFilter.click(function(){
  if(hiddenDiv.css("left") == "0px") {
    hiddenDiv.animate({left: '286px'})
    $('#showFilter').addClass('hidden')
    $('#hideFilter').removeClass('hidden')
  } else if (hiddenDiv.css("left") == "286px") {
    hiddenDiv.animate({left: '0px'})
    $('#hideFilter').addClass('hidden')
    $('#showFilter').removeClass('hidden')
  }
  })


});
