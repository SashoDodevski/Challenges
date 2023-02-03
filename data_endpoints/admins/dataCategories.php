<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once "../../database/db.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (array_key_exists('form', $_GET)) {
        $sql = "SELECT * FROM categories 
        LEFT JOIN statuses ON categories.category_status = statuses.status_id
        ORDER BY category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categories = ["data" => $categories];

        header("Content-Type:application/json");
        $jsonobject = json_encode($categories);
        echo $jsonobject;
    } else {
        if (!isset($_GET['page'])) {
            $page_number = 1;
        } else {
            $page_number = $_GET['page'];
        }

        $sqlTotalItems = "SELECT COUNT(category_id) FROM categories";
        $stmtTotalItems = $pdo->prepare($sqlTotalItems);
        $stmtTotalItems->execute();
        $items = $stmtTotalItems->fetchAll(PDO::FETCH_ASSOC);

        $newItems = [];
        foreach ($items as $item) {
            $items = array_merge($newItems, $item);
        };

        $count = "COUNT(category_id)";
        $items['Total_items'] = $items[$count];
        unset($items[$count]);

        $itemsPerPage = 6;
        $initial_limit = ($page_number - 1) * $itemsPerPage;

        $sql = "SELECT * FROM categories 
            LEFT JOIN statuses ON categories.category_status = statuses.status_id
            LIMIT $initial_limit, $itemsPerPage";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categories = ["data" => $categories];

        $itemsPerPage = ["Items_per_page" => $itemsPerPage];
        $page_number = ["Page" => $page_number];
        $totalPages = ceil($items['Total_items'] / $itemsPerPage["Items_per_page"]);
        $totalPages = ["Total_pages" => $totalPages];

        $data = array_merge($page_number, $itemsPerPage, $items, $totalPages, $categories);

        header("Content-Type:application/json");
        $jsonobject = json_encode($data);
        echo $jsonobject;
    }
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
        $sql = "INSERT INTO categories (category, category_status) VALUES (:category, :category_status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'category' => $data['category'],
                'category_status' => $data['category_status'],
            ]
        );
    } elseif ($data['action'] == 'edit') {
        $sql = "UPDATE categories
        SET category = :category, category_status = :category_status
        WHERE category_id = :category_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'category_id' => $data['category_id'],
                'category' => $data['category'],
                'category_status' => $data['category_status'],
            ]
        );
    } elseif ($data['action'] == 'delete') {
        $sql = "UPDATE categories SET category_status = :category_status WHERE category_id = :category_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'category_id' => $data['category_id'],
                'category_status' => $data['category_status'],
            ]
        );
    }
}
