$(function(){

    let divBook = $("#divBook");
    let formBook = $("#formBook");
    let bookTitle = $("#bookTitle");
    let author = $("#author");
    let bookCategory = $("#bookCategory");
    let publicationYear = $("#publicationYear");
    let numberOfPages = $("#numberOfPages");
    let bookImageUrl = $("#bookImageUrl");
    let btnSubmitBook = $("#btnSubmitBook");

    btnSubmitBook.click(
        function(e){
            e.preventDefault();

            let data = {
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
                data: JSON.stringify(data),
                success: function(data) {
                    console.log("Successfuly sent AJAX POST request." + data)
                },
                error: function(error) {
                    console.log("Error: " + JSON.stringify(error))
                }
              });

        }
    )  
})