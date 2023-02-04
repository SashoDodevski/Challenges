export function createPagination(wrapper, totalPages, page, tableBody) {
  let active;
  wrapper.empty();
  if (page > 1) {
    let firstPageBtn =
      $(`<button  value="1" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">First
        </button>`);
    firstPageBtn.click(function () {
      let pageNumber = location.hash.slice(6);
      pageNumber = 1;
      let urlHash = "Page_" + pageNumber;
      location.hash = urlHash;
      tableBody.empty();
      location.reload();
    });
    wrapper.append(firstPageBtn);
  }

  for (
    let plength = parseFloat(page) - 1;
    plength <= parseFloat(page) + 1;
    plength++
  ) {
    if (plength > totalPages) {
      continue;
    }
    if (plength == 0) {
      plength = plength + 1;
    }
    if (page == plength) {
      active = "text-blue-500";
    } else {
      active = "";
    }
    let button = $(
      `<button value="${plength}" class="px-4 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ${active}">${plength}</button>`
    );
    button.click(function () {
      let urlHash = "Page_" + button.val();
      location.hash = urlHash;
      tableBody.empty();
      location.reload();
    });
    wrapper.append(button);
  }

  if (page < totalPages) {
    let lastBtn = $(
      `<button value="${totalPages}" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Last</button>`
    );
    wrapper.append(lastBtn);
    lastBtn.click(function () {
      let pageNumber = location.hash.slice(6);
      pageNumber = parseFloat(pageNumber);
      pageNumber = totalPages;
      let urlHash = "Page_" + pageNumber;
      location.hash = urlHash;
      tableBody.empty();
      location.reload();
    });
  }
}

// Post request
export function postRequest(urlData, data) {
  $.ajax({
    url: urlData,
    type: "POST",
    contentType: "application/json",
    data: JSON.stringify(data),
    success: function (success) {},
    error: function (error) {
      console.log("Error: " + JSON.stringify(error));
    },
  });
}

// Submit item in database
export function submitItem(urlData, data, callback) {
  new swal({
    text: "Are you sure you want to submit?",
    icon: "warning",
    confirmButtonText: "Submit",
    cancelButtonText: "Cancel",
    confirmButtonColor: "#5ea91d",
    showCancelButton: true,
  }).then(function (result) {
    if (result.value) {
      new swal({
        text: "Item has been submitted!",
        icon: "success",
        timer: 1500,
        showCancelButton: false,
        showConfirmButton: false,
      });

      callback(urlData, data);

      window.setTimeout(function () {
        location.reload();
      }, 1500);
    } else {
    }
  });
}

// Edit item in database
export function editItem(urlData, data, callback1, event){
  new swal({
    text: "Are you sure you want to edit this item?",
    icon: "warning",
    confirmButtonText: "Edit",
    cancelButtonText: "Cancel",
    confirmButtonColor: "#5ea91d",
    showCancelButton: true,
  }).then(function (result) {
    if (result.value) {
      event.currentTarget.parentElement.parentElement.nextSibling.nextSibling.innerHTML= "ACTIVE";
      event.currentTarget.parentElement.nextSibling.nextSibling[1].classList.remove("hidden")
      event.currentTarget.parentElement.parentElement.parentElement.classList.remove("bg-red-50");
      new swal({
        text: "Item has been edited!",
        icon: "success",
        timer: 1500,
        showCancelButton: false,
        showConfirmButton: false,
      });

      callback1(urlData, data);

    } else {
    }
  });
}


  // Delete item in database (add delete status)
  export function deleteItem(urlData, data, callback, event){
    console.log(event.currentTarget.parentElement.previousSibling.previousSibling.firstChild.nextSibling.nextSibling.nextSibling)
    new swal({
      text: "Are you sure you want to delete this item?",
      icon: "warning",
      confirmButtonText: "Delete",
      cancelButtonText: "Cancel",
      confirmButtonColor: "#DD6B55",
      showCancelButton: true,
    }).then(function (result) {
      if (result.value) {
        event.currentTarget.parentElement.parentElement.nextSibling.nextSibling.innerHTML= "DELETED";
        event.currentTarget.parentElement.classList.add("hidden");
        event.currentTarget.parentElement.previousSibling.previousSibling.firstChild.nextSibling.nextSibling.nextSibling.innerHTML= "Activate"
        event.currentTarget.parentElement.parentElement.parentElement.classList.add("bg-red-50");
        new swal({
          text: "Item has been deleted!",
          icon: "success",
          timer: 1500,
          showCancelButton: false,
          showConfirmButton: false,
        });

        callback(urlData, data);

      } else {
      }
    });
  }

