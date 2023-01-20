export function testFunction (){
    console.log("TEST")
}

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
        location.reload()
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
        location.reload()
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
        location.reload()
      });
    }
  }