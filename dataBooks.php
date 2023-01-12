<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . "./database/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if (strcasecmp($contentType, 'application/json') != 0) {
        throw new Exception('Content type must be: application/json');
    }

    $jsonContent = trim(file_get_contents("php://input"));

    $data = json_decode($jsonContent, true);

    if (!is_array($data)) {
        throw new Exception('Received content contained invalid JSON!');
    }
    if ($data['action'] == 'delete') {
        $sql = "UPDATE books SET book_status = :book_status WHERE book_id = :book_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'book_status' => $data['book_status'],
                'book_id' => $data['book_id'],
            ]
        );
    } elseif ($data['action'] == 'edit') {
        $sql = "UPDATE books
        SET book_title = :book_title, book_author_id = :book_author_id, book_category_id = :book_category_id, publication_year = :publication_year, no_of_pages = :no_of_pages, book_image = :book_image, book_status = :book_status
        WHERE book_id = :book_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'book_id' => $data['book_id'],
                'book_title' => $data['book_title'],
                'book_author_id' => $data['book_author_id'],
                'book_category_id' => $data['book_category_id'],
                'publication_year' => $data['publication_year'],
                'no_of_pages' => $data['no_of_pages'],
                'book_image' => $data['book_image'],
                'book_status' => $data['book_status']
            ]
        );
    }
}


$sql = "SELECT * FROM `books`";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type:application/json");
$jsonobject = json_encode($books);
echo $jsonobject;
