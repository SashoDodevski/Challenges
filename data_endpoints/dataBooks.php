<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once "../database/db.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['page'])) {
        $page_number == 1;
    } else {
        $page_number = $_GET['page'];
    }

    $itemsPerPage = 6;
    $initial_limit = ($page_number - 1) * $itemsPerPage;

    $sqlTotalItems = "SELECT COUNT(book_id) FROM `books`";
    $stmtTotalItems = $pdo->prepare($sqlTotalItems);
    $stmtTotalItems->execute();
    $items = $stmtTotalItems->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM `books` 
            LEFT JOIN authors ON books.author_id = authors.author_id
            LEFT JOIN categories ON books.category_id = categories.category_id
            LIMIT $initial_limit, $itemsPerPage";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $books = ["data" => $books];

    $newItems = [];
    foreach ($items as $item) {
        $items = array_merge($newItems, $item);
    };

    $count = "COUNT(book_id)";
    $items['Total_items'] = $items[$count];
    unset($items[$count]);

    $itemsPerPage = ["Items_per_page" => $itemsPerPage];
    $page_number = ["Page" => $page_number];
    $totalPages = ceil($items['Total_items'] / $itemsPerPage["Items_per_page"]);
    $totalPages = ["Total_pages" => $totalPages];

    $data = array_merge($page_number, $itemsPerPage, $items, $totalPages, $books);

    header("Content-Type:application/json");
    $jsonobject = json_encode($data);
    echo $jsonobject;
}

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

    if ($data['action'] == 'create') {
        $sql = "INSERT INTO books (book_title, author_id, category_id, publication_year, no_of_pages, book_image, book_status) VALUES (:book_title, :author_id, :category_id, :publication_year, :no_of_pages, :book_image, :book_status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'book_title' => $data['book_title'],
                'author_id' => $data['author_id'],
                'category_id' => $data['category_id'],
                'publication_year' => $data['publication_year'],
                'no_of_pages' => $data['no_of_pages'],
                'book_image' => $data['book_image'],
                'book_status' => "ACTIVE"
            ]
        );
    } elseif ($data['action'] == 'edit') {
        $sql = "UPDATE books
        SET book_title = :book_title, author_id = :author_id, category_id = :category_id, publication_year = :publication_year, no_of_pages = :no_of_pages, book_image = :book_image, book_status = :book_status
        WHERE book_id = :book_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'book_id' => $data['book_id'],
                'book_title' => $data['book_title'],
                'author_id' => $data['author_id'],
                'category_id' => $data['category_id'],
                'publication_year' => $data['publication_year'],
                'no_of_pages' => $data['no_of_pages'],
                'book_image' => $data['book_image'],
                'book_status' => $data['book_status']
            ]
        );
    } elseif ($data['action'] == 'delete') {
        $sql = "UPDATE books SET book_status = :book_status WHERE book_id = :book_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'book_status' => $data['book_status'],
                'book_id' => $data['book_id'],
            ]
        );
    } 
}
