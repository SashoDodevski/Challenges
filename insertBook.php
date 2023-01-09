<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . "./database/db.php";

$sql = "INSERT INTO books (book_title, author_id, book_category_id, publication_year, no_of_pages, book_image) VALUES (:nambook_title, :author_id, :book_category_id, :publication_year, :no_of_pages, :book_image)";
$stmt = $pdo->prepare($sql);
$stmt->execute(
    [
        'book_title' => $POST['book_title'],
        'author_id' => $POST['author_id'],
        'book_category_id' => $POST['book_category_id'],
        'publication_year' => $POST['publication_year'],
        'no_of_pages' => $POST['no_of_pages'],
        'book_image' => $POST['book_image'],
    ]
);


$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type:application/json"); 
$jsonobject = json_encode($books); 
echo $jsonobject; 

?>