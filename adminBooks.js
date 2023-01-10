$(function(){

    let urlAuthors = "dataAuthors.php";
    let urlBooks = "dataBooks.php";
    let urlCategories = "dataCategories.php";
    let urlComments = "dataComments.php";
    let urlBooksFullInfo = "booksFullInfo.php";

    let divBook = $("#divBook");
    let formBook = $("#formBook");
    let bookTitle = $("#bookTitle");
    let author = $("#author");
    let bookCategory = $("#bookCategory");
    let publicationYear = $("#publicationYear");
    let numberOfPages = $("#numberOfPages");
    let bookImageUrl = $("#bookImageUrl");
    let btnSubmitBook = $("#btnSubmitBook");
    let divTableBooks = $("#divTableBooks");
    let tableBodyBooks = $("#tableBodyBooks");
    

    $.ajax({
        url: urlAuthors,
        type: "GET",
        success: function(authorData) {
            authorData.forEach(element => {
                let authorOption = $("<option></option>");
                authorOption.text(element["author_name"] + " " + element["author_surname"]);
                author.append(authorOption)                
                
            });
            console.log(authorData)
        },
        error: function(error) {
            console.log("Error: " + JSON.stringify(error))
        }
      });

      $.ajax({
        url: urlBooks,
        type: "GET",
        success: function(bookData) {
            console.log(bookData)
        },
        error: function(error) {
            console.log("Error: " + JSON.stringify(error))
        }
      });

      $.ajax({
        url: urlCategories,
        type: "GET",
        success: function(categoryData) {
            categoryData.forEach(element => {
                let categoryOption = $("<option></option>");
                categoryOption.text(element["book_category"]);
                bookCategory.append(categoryOption)                
                
            });
            console.log(categoryData)
        },
        error: function(error) {
            console.log("Error: " + JSON.stringify(error))
        }
      });

      $.ajax({
        url: urlComments,
        type: "GET",
        success: function(commentData) {
            console.log(commentData)
        },
        error: function(error) {
            console.log("Error: " + JSON.stringify(error))
        }
      });

      $.ajax({
        url: urlBooksFullInfo,
        type: "GET",
        success: function(booksFullData) {
            booksFullData.forEach(element => {
                let tableRow = $(`
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-3 py-3">
                <button type="submit" class="w-full text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-xs px-2 py-1 my-1 text-center dark:bg-green-900 dark:hover:bg-green-800 dark:focus:ring-green-800" id="btnUpdateBook">Update</button>
                <button type="submit" class="w-full text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-xs px-2 py-1 text-center dark:bg-red-900 dark:hover:bg-red-800 dark:focus:ring-red-800" id="btnDeleteBook">Delete</button>
                </td>
                <td class="px-3 py-3 text-right">
                    ${element["id"]}
                </td>
                <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    ${element["book_title"]}
                </th>
                <td class="px-3 py-3">
                    ${element["author_name"] + " " + element["author_surname"]}
                </td>
                <td class="px-3 py-3 text-center">
                    ${element["book_category"]}
                </td>
                <td class="px-3 py-3 text-center">
                    ${element["publication_year"]}
                </td>
                <td class="px-3 py-3 text-center">
                    ${element["no_of_pages"]}
                </td>
                <td class="px-3 py-3">
                    ${element["book_image"]}
                </td>
            </tr>
                `);
                tableBodyBooks.append(tableRow)                
            })
            console.log(booksFullData)
        },
        error: function(error) {
            console.log("Error: " + JSON.stringify(error))
        }
      });

    btnSubmitBook.click(
        function(e){
            e.preventDefault();

            let bookData = {
                book_title: bookTitle.val(),
                author_id: author.val(),
                book_category_id: bookCategory.val(),
                publication_year: publicationYear.val(),
                no_of_pages: numberOfPages.val(),
                book_image: bookImageUrl.val()
            }

            $.ajax({
                url: "insertBook.php",
                type: "POST",
                contentType: 'application/json',
                data: JSON.stringify(bookData),
                success: function(bookData) {
                    console.log("Successfuly sent AJAX POST request." + bookData)
                },
                error: function(error) {
                    console.log("Error: " + JSON.stringify(error))
                }
              });
        }
    )  

})