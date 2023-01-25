<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$database_table = "categories";

require_once "../database/db.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = "SELECT * FROM `categories` 
            WHERE categories.category_status = 'ACTIVE'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $categories = ["data" => $categories];

    header("Content-Type:application/json");
    $jsonobject = json_encode($categories);
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
        $sql = "INSERT INTO $database_table (category, category_status) VALUES (:category, :category_status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'category' => $data['category'],
                'category_status' => $data['category_status'],
            ]
        );
    } elseif ($data['action'] == 'edit') {
        $sql = "UPDATE $database_table
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
        $sql = "UPDATE $database_table SET category_status = :category_status WHERE category_id = :category_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'category_id' => $data['category_id'],
                'category_status' => $data['category_status'],
            ]
        );
    } 
}
