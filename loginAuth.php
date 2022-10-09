<?php 

    require_once __DIR__ . "/autoload.php";

    checkRequest();


    $errors = [];
    $warnings = [];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    checkFields($username, $email, $password);
    checkUsername($username);
    checkPassword($password);

    if(count($errors) > 0) {
        redirect("login.php", "danger", $errors);
    }

    $allUsers = file_get_contents(__DIR__ . "/database/users.txt");
    $allUsers = trim($allUsers);
    $allUsers = explode(PHP_EOL, $allUsers);

    foreach($userEmails as $userEmail) {
        $userEmail = explode(",", $userEmail);
        if(($email == $userEmail[0])) {
            $_SESSION['email'] = $userEmail[0];
            array_push($warnings, "A user with this email already exists.");
        }
    }

    foreach($allUsers as $user) {
        $user = explode("=", $user);
        if(($username == $user[0]) && password_verify($password, $user[1])) {
            $_SESSION['username'] = $user[0];
            redirect("membersonly.php", "", $errors);
            die();
        }
    }
