<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . "./database/db.php";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email' => $email
    ]);

    if ($_POST['name'] == "" || $_POST['surname'] == "" || $_POST['email'] == "" || $_POST['password'] == "") {
        $_SESSION['msg'] = 'All fields are required!';
        header('Location: register.php');
    } else {
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();

            if ($_SESSION['email'] = $user['email']) {
                $_SESSION['msg'] = 'You already have an account! Sign in please.';

                header('Location: signin.php');
            }
        } else {
            $sql = "INSERT INTO users (email, password, name, surname) 
                VALUES(:email, :password, :name, :surname)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname']
                ]
            );

            $_SESSION['msg'] = 'Account registered! Sign in please.';

            header('Location: signin.php');
            die();
        }
    }
} else {
    header('Location: index.php');
    die();
}
