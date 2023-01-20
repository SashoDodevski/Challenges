<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once "../database/db.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = "SELECT * FROM `statuses`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $statuses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $statuses = ["data" => $statuses];

    $data = array_merge($statuses);

    header("Content-Type:application/json");
    $jsonobject = json_encode($data);
    echo $jsonobject;
}