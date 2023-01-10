<?php

require_once __DIR__ . './constants.php';

try {
    $pdo = new PDO('mysql:host=' . HOST . '; dbname=' . DB_NAME, USERNAME, PASSWORD);
} catch (PDOException $e) {
    echo "Database down!";
    die();
}

?>