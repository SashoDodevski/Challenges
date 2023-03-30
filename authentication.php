<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . "./db/db.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = :username LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
          'username' => $username
    ]);

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];

            header('Location: dashboard.php');
        } else {
            $_SESSION['msg'] = 'Wrong password!';
            $_SESSION['status'] = 'alert-danger';

            header('Location: login.php');
            die();
        }
    } else {
        $_SESSION['msg'] = 'Wrong credentials!';
        $_SESSION['status'] = 'alert-danger';

        header('Location: login.php');
        die();
    }
} else {
    header('Location: index.php');
    die();
}
