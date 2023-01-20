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

    $sqlTotalItems = "SELECT COUNT(author_id) FROM `authors`";
    $stmtTotalItems = $pdo->prepare($sqlTotalItems);
    $stmtTotalItems->execute();
    $items = $stmtTotalItems->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM `authors` 
            LIMIT $initial_limit, $itemsPerPage";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $authors = ["data" => $authors];

    $newItems = [];
    foreach ($items as $item) {
        $items = array_merge($newItems, $item);
    };

    $count = "COUNT(author_id)";
    $items['Total_items'] = $items[$count];
    unset($items[$count]);

    $itemsPerPage = ["Items_per_page" => $itemsPerPage];
    $page_number = ["Page" => $page_number];
    $totalPages = ceil($items['Total_items'] / $itemsPerPage["Items_per_page"]);
    $totalPages = ["Total_pages" => $totalPages];

    $data = array_merge($page_number, $itemsPerPage, $items, $totalPages, $authors);

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
        if (
            empty($data['author_name'])
        ) {
            $_SESSION['status'] = 'text-red-500';
            $_SESSION['msg'] = 'Item not saved. All fields in form are required!';

            $success = ["Hello from here"];
            $jsonobject = json_encode($success);
            echo $jsonobject;

            header("Location: adminAuthors.php");
            die();
        } else {
            $sql = "INSERT INTO authors (author_name, author_surname, author_CV, author_status) VALUES (:author_name, :author_surname, :author_CV, :author_status)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'author_name' => $data['author_name'],
                    'author_surname' => $data['author_surname'],
                    'author_CV' => $data['author_CV'],
                    'author_status' => $data['author_status']
                ]
            );
        }
    } elseif ($data['action'] == 'edit') {
        $sql = "UPDATE authors
        SET author_name = :author_name, author_surname = :author_surname, author_CV = :author_CV, author_status = :author_status
        WHERE author_id = :author_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'author_id' => $data['author_id'],
                'author_name' => $data['author_name'],
                'author_surname' => $data['author_surname'],
                'author_CV' => $data['author_CV'],
                'author_status' => $data['author_status']
            ]
        );
    } elseif ($data['action'] == 'delete') {
        $sql = "UPDATE authors SET author_status = :author_status WHERE author_id = :author_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'author_id' => $data['author_id'],
                'author_status' => $data['author_status'],
            ]
        );
    }
}
