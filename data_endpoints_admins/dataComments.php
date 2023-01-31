<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once "../database/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    
    if (!isset($_GET['page'])) {
        $page_number = 1;
    } else {
        $page_number = $_GET['page'];
    }

    $itemsPerPage = 6;
    $initial_limit = ($page_number - 1) * $itemsPerPage;
    $itemsPerPage = 6;
    $initial_limit = ($page_number - 1) * $itemsPerPage;

    $sqlTotalItems = "SELECT COUNT(comment_id) FROM `comments`";
    $stmtTotalItems = $pdo->prepare($sqlTotalItems);
    $stmtTotalItems->execute();
    $items = $stmtTotalItems->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM `comments` 
        LEFT JOIN users ON comments.user_id = users.user_id
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN statuses ON comments.comment_status = statuses.status_id
        LIMIT $initial_limit, $itemsPerPage";
 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $comments = ["data" => $comments];

    $newItems = [];
    foreach ($items as $item) {
        $items = array_merge($newItems, $item);
    };

    $count = "COUNT(comment_id)";
    $items['Total_items'] = $items[$count];
    unset($items[$count]);

    $itemsPerPage = ["Items_per_page" => $itemsPerPage];
    $page_number = ["Page" => $page_number];
    $totalPages = ceil($items['Total_items'] / $itemsPerPage["Items_per_page"]);
    $totalPages = ["Total_pages" => $totalPages];

    $data = array_merge($page_number, $itemsPerPage, $items, $totalPages, $comments);

    header("Content-Type:application/json");
    $jsonobject = json_encode($data);
    echo $jsonobject;

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if (strcasecmp($contentType, 'application/json') != 0) {
        throw new Exception('Content type must be: application/json');
    }

    $jsonContent = trim(file_get_contents("php://input"));

    $data = json_decode($jsonContent, true);

    if (!is_array($data)) {
        throw new Exception('Received content contained invalid JSON!');
    }

    if ($data['action'] === 'getData') {

    $status = $data['status'];

    if (!isset($_GET['page'])) {
        $page_number = 1;
    } else {
        $page_number = $_GET['page'];
    }

    $itemsPerPage = 6;
    $initial_limit = ($page_number - 1) * $itemsPerPage;

    $sqlTotalItems = "SELECT COUNT(comment_id) FROM `comments`";
    $stmtTotalItems = $pdo->prepare($sqlTotalItems);
    $stmtTotalItems->execute();
    $items = $stmtTotalItems->fetchAll(PDO::FETCH_ASSOC);

    $status = $data['status'];

    if ($status == 4) {
        $sql = "SELECT * FROM `comments` 
        LEFT JOIN users ON comments.user_id = users.user_id
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN statuses ON comments.comment_status = statuses.status_id
        LIMIT $initial_limit, $itemsPerPage";
 
    } else if ($status == 1) {
        $sql = "SELECT * FROM `comments` 
        LEFT JOIN users ON comments.user_id = users.user_id
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN statuses ON comments.comment_status = statuses.status_id
        WHERE comment_status = 1
        LIMIT $initial_limit, $itemsPerPage";
    } else if ($status == 2) {
        $sql = "SELECT * FROM `comments` 
        LEFT JOIN users ON comments.user_id = users.user_id
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN statuses ON comments.comment_status = statuses.status_id
        WHERE comment_status = 2
        LIMIT $initial_limit, $itemsPerPage";
    } else if ($status == 3) {
        $sql = "SELECT * FROM `comments` 
        LEFT JOIN users ON comments.user_id = users.user_id
        LEFT JOIN books ON comments.book_id = books.book_id
        LEFT JOIN statuses ON comments.comment_status = statuses.status_id
        WHERE comment_status = 3
        LIMIT $initial_limit, $itemsPerPage";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $comments = ["data" => $comments];

    $newItems = [];
    foreach ($items as $item) {
        $items = array_merge($newItems, $item);
    };

    $count = "COUNT(comment_id)";
    $items['Total_items'] = $items[$count];
    unset($items[$count]);

    $itemsPerPage = ["Items_per_page" => $itemsPerPage];
    $page_number = ["Page" => $page_number];
    $totalPages = ceil($items['Total_items'] / $itemsPerPage["Items_per_page"]);
    $totalPages = ["Total_pages" => $totalPages];

    $data = array_merge($page_number, $itemsPerPage, $items, $totalPages, $comments);

    header("Content-Type:application/json");
    $jsonobject = json_encode($data);
    echo $jsonobject;

} elseif ($data['action'] == 'edit') {
        $sql = "UPDATE comments SET comment_status = :comment_status WHERE comment_id = :comment_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'comment_status' => $data['comment_status'],
                'comment_id' => $data['comment_id'],
            ]
        );
    } elseif ($data['action'] == 'delete') {
        $sql = "UPDATE comments SET comment_status = :comment_status WHERE comment_id = :comment_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'comment_status' => $data['comment_status'],
                'comment_id' => $data['comment_id'],
            ]
        );
    } 
}
