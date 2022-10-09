<?php 

    require_once __DIR__ . "/autoload.php";

    checkRequest();


    $errors = [];
    $warnings = [];

    $username = $_POST['username'];
    $password = $_POST['password'];

    checkLoginFields($username, $password);
    checkUsername($username);
    checkPassword($password);

    $checkLoginFields = checkLoginFields($username, $password);
    $checkUsername = checkUsername($username);
    $checkPassword = checkPassword($password);

    if (isset($checkLoginFields)) {
        array_push($errors, $checkLoginFields);
    }
    if (isset($checkUsername)) {
        array_push($errors, $checkUsername);
    }
    if (isset($checkPassword)) {
        array_push($errors, $checkPassword);
    }

    if(count($errors) > 0) {
        redirect("login.php", "danger", $errors);
    }

    $allUsers = file_get_contents(__DIR__ . "/database/users.txt");
    $allUsers = trim($allUsers);
    $allUsers = explode(PHP_EOL, $allUsers);


    foreach($allUsers as $user) {
        $user = explode("=", $user);
        if(($username == $user[0]) && password_verify($password, $user[1])) {
            $_SESSION['username'] = $user[0];
            redirect("membersonly.php", "", $errors);
            die();
        }
    }
