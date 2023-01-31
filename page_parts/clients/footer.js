  $(function(){
    let urlData = "http://api.quotable.io/random";

    let quote = $("#quote")

      // Get quote
    
      $.ajax({
        url: urlData,
        type: "GET",
        contentType: "application/json",
        success: function (itemsData) {
            quote.text(itemsData.content)
        },
        error: function (error) {
          console.log("Error: " + JSON.stringify(error));
        },
      });


  })