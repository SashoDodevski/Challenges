<?php
try {
    //dsn = data source name
    $pdo = new PDO("mysql:host=localhost;dbname=challenge16_php-pdo", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (PDOException $e) {
    echo "Database down!";
    die();
}
