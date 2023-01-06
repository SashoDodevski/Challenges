<?php

require_once './constants.php';

try {
    $pdo = new PDO('mysql:host=' . HOST . '; dbname=' . DB_NAME, USERNAME, PASSWORD);
} catch (PDOException $e) {
    echo "Database down!";
    die();
}

?>