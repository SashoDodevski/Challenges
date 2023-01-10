<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . "./database/db.php";

    // $book_title = $_POST['book_title'];
    // $author_id = $_POST['author_id'];
    // $book_category_id = $_POST['book_category_id'];
    // $publication_year = $_POST['publication_year'];
    // $no_of_pages = $_POST['no_of_pages'];
    // $book_image = $_POST['book_image'];

//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}

//Receive the RAW post data.
$jsonContent = trim(file_get_contents("php://input"));

//Attempt to decode the incoming RAW post data from JSON.
$data = json_decode($jsonContent, true);

//If json_decode failed, the JSON is invalid.
if(!is_array($data)){
    throw new Exception('Received content contained invalid JSON!');
}

//Process the JSON.



$sql = "INSERT INTO books (book_title, author_id, book_category_id, publication_year, no_of_pages, book_image) VALUES (:book_title, :author_id, :book_category_id, :publication_year, :no_of_pages, :book_image)";
$stmt = $pdo->prepare($sql);
$stmt->execute(
    [
        'book_title' => $data['book_title'],
        'author_id' => $data['author_id'],
        'book_category_id' => $data['book_category_id'],
        'publication_year' => $data['publication_year'],
        'no_of_pages' => $data['no_of_pages'],
        'book_image' => $data['book_image']
    ]
);

}
?>