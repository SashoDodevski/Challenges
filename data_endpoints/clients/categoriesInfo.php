<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$database_table = "categories";

require_once "../../database/db.php";

$active = 1;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = "SELECT * FROM `categories` 
            WHERE categories.category_status = $active
            ORDER BY category";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $categories = ["data" => $categories];

    header("Content-Type:application/json");
    $jsonobject = json_encode($categories);
    echo $jsonobject;
}
