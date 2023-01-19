<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once "../database/db.php";

$sql = "SELECT * FROM `book_comments`";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type:application/json"); 
$jsonobject = json_encode($comments); 
echo $jsonobject; 

?>