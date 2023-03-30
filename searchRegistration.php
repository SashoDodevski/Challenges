<?php

session_start();
require_once __DIR__ . "/db/db.php";


if ($_POST['search'] == '') {
    $_SESSION['msg'] = 'Please enter search parameter!';
    $_SESSION['status'] = 'alert-danger';

    header("Location: dashboard.php");
    die();
} else {

    $search = $_POST['search'];

    $sql = "SELECT * FROM registrations WHERE vehicle_model LIKE '%$search%'";

    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch()) {
        $_SESSION['registrations'][] = $row;
    }

    if (!isset($row)== "") {
        $_SESSION['msg'] = 'No such registration found!';
        $_SESSION['status'] = 'alert-danger';
        header("Location: dashboard.php");
        die();
    }
    
    header("Location: dashboard.php");
    die();
}
