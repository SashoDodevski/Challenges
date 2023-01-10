<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . "./database/db.php";


$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}

$jsonContent = trim(file_get_contents("php://input"));

$data = json_decode($jsonContent, true);

if(!is_array($data)){
    throw new Exception('Received content contained invalid JSON!');
}

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