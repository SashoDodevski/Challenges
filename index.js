class Book {
    constructor(_title, _author, _maxPages, _onPage) {
      this.title = _title;
      this.author = _author;
      this.maxPages = _maxPages;
      this.onPage = _onPage;
    }
}

let book1 = new Book ("The Three Musketeers", "Alexandre Dumas", 200, 200);
let book2 = new Book ("Treasure Island", "Louis Stevenson", 250, 217);
let book3 = new Book ("Journey to the Center of the Earth", "Jules Verne", 300, 200);

let books = [book1, book2, book3];
console.log(books);

    const header = document.querySelector("h1");
    console.log(header);

    let tableData = document.querySelector("#tableData");

books.forEach(function (book, index) {
        let dataRow = document.createElement("tr");
        dataRow.setAttribute("class", "test");

        let bookData = document.createElement("td");
        bookData.innerHTML = `"${book.title}" by author ${book.author}`;

        

        let bookStatus = document.createElement("td");
        if(book.onPage == book.maxPages) {
            bookStatus.innerHTML = `You have read "${book.title}" by author ${book.author}.`;
            bookStatus.style.color = "green";
        } else {
            bookStatus.innerHTML = `You still need to read "${book.title}" by author ${book.author}.`;
            bookStatus.style.color = "red";
        }

        let progressData = document.createElement("td");
           
        let progress = document.createElement("div");
        progress.setAttribute("class", "progress");

        let progressBar = document.createElement("div");
        progressBar.setAttribute("class", "progress-bar progress-bar-striped bg-info");
        progressBar.setAttribute("role", "progressbar");
        let progressResult = `width: ${book.onPage / book.maxPages * 100}%`;
        progressBar.setAttribute("style", `${progressResult}`);
        progressBar.setAttribute("aria-valuemin", "0");
        progressBar.setAttribute("aria-valuemax", "100");
        console.log(progressResult);

        dataRow.appendChild(bookData);
        dataRow.appendChild(bookStatus);
        progress.appendChild(progressBar);
        progressData.appendChild(progress);
        dataRow.appendChild(progressData);
        tableData.appendChild(dataRow);
  });


const handleFormSubmit = function(e) {
    e.preventDefault();

    let title = document.getElementById("title").value;
    let author = document.getElementById("author").value;
    let maxPages = document.getElementById("maxPages").value;
    let onPage = document.getElementById("onPage").value;

    let newBook = new Book(title, author, maxPages, onPage);
    books.push(newBook);

    let tableData = document.getElementById("tableData");
    let dataRow = document.createElement("tr");

    let bookData = document.createElement("td");
    bookData.innerHTML = `"${newBook.title}" by author ${newBook.author}`;

    let bookStatus = document.createElement("td");
    if(newBook.onPage == newBook.maxPages) {
        bookStatus.innerHTML = `You have read "${newBook.title}" by author ${newBook.author}.`;
        bookStatus.style.color = "green";
    } else {
        bookStatus.innerHTML = `You still need to read "${newBook.title}" by author ${newBook.author}.`;
        bookStatus.style.color = "red";
    }

    let progressData = document.createElement("td");
   
    let progress = document.createElement("div");
    progress.setAttribute("class", "progress");
    
    let progressBar = document.createElement("div");
    progressBar.setAttribute("class", "progress-bar progress-bar-striped bg-info");
    progressBar.setAttribute("role", "progressbar");
    progressBar.setAttribute("aria-valuemin", "0");
    progressBar.setAttribute("aria-valuemax", "100");
    let progressResult = `width: ${onPage / maxPages * 100}%`;
    progressBar.setAttribute("style", progressResult);
    progressBar.setAttribute("aria-valuenow", "50");

    dataRow.appendChild(bookData);
    dataRow.appendChild(bookStatus);
    progress.appendChild(progressBar);
    progressData.appendChild(progress);
    dataRow.appendChild(progressData);
    tableData.appendChild(dataRow);
    
    document.getElementById("title").value = "";
    document.getElementById("author").value = "";
    document.getElementById("maxPages").value = "";
    document.getElementById("onPage").value = "";
};
  

let form = document.querySelector("#booksData");
form.addEventListener("submit", handleFormSubmit);
