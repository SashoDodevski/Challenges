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
                
                console.log(data);

                let stringed = JSON.stringify(data);
                console.log(stringed);

            $.ajax({
                url: "insertBook.php",
                type: "POST",
                contentType: 'application/json',
                dataType: "json",
                data: JSON.stringify(data),
                success: function(data) {
                    alert(result)
                },
                error: function(error) {
                    alert("something went wrong")
                }
              });
        

        }
    )

    
})