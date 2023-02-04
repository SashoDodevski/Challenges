<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../database/db.php";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('email', $email);
    $stmt->execute([
        'email' => $email
    ]);

    if ($_POST['name'] == "" || $_POST['surname'] == "" || $_POST['email'] == "" || $_POST['password'] == "") {
        $_SESSION['msg'] = 'All fields are required!';
        header('Location: ../register.php');
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { {
            $_SESSION['msg'] = 'Invalid email format!';
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['email'] = $email;
            header('Location: ../register.php');
        }
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
        $_SESSION['msg'] = "Only letters and white space allowed";
        $_SESSION['name'] = $name;
        $_SESSION['surname'] = $surname;
        $_SESSION['email'] = $email;
        header('Location: ../register.php');
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['surname'])) {
        $_SESSION['msg'] = "Only letters and white space allowed";
        $_SESSION['name'] = $name;
        $_SESSION['surname'] = $surname;
        $_SESSION['email'] = $email;
        header('Location: ../register.php');
    } else {
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();

            if ($_SESSION['email'] = $user['email']) {
                $_SESSION['msg'] = 'You already have an account! Sign in please.';

                header('Location: ../signin.php');
            }
        } else {
            $sql = "INSERT INTO users (email, password, name, surname) 
                VALUES(:email, :password, :name, :surname)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'email' => $email,
                    'password' => $password,
                    'name' => $name,
                    'surname' => $surname
                ]
            );

            $_SESSION['msg'] = 'Account registered! Sign in please.';

            header('Location: ../signin.php');
            die();
        }
    }
} else {
    header('Location: index.php');
    die();
}
