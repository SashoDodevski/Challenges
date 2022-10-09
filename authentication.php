<?php 
require_once __DIR__ . "/autoload.php";

if($_SERVER['REQUEST_METHOD'] !== "POST") {
    redirect("index.php");
}


$errors = [];
$warnings = [];

if($_POST['action'] == 'register') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_BCRYPT); 


    if($username == '' || $email == '' || $password == '') {
        array_push($errors, 'All inputs are required (no empty fields are allowed) !');
    }

    if( !preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        array_push($errors, 'Username cannot contain empty spaces or special signs!');
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailCheck = explode("@", $email);
        if(strlen($emailCheck[0]) <= 5) {
            array_push($errors, 'Email must have at least 5 characters before @ !');
        }
      }

    if( !preg_match('/[a-z]+/', $password)  
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
        array_push($errors, 'Password must contain at least 1 lowercase, uppercase, number and special character');
    }

    $userEmails = file_get_contents(__DIR__ . "/database/userEmails.txt");
    $userEmails = trim($userEmails);
    $userEmails = explode(PHP_EOL, $userEmails);

    $allUsers = file_get_contents(__DIR__ . "/database/users.txt");
    $allUsers = trim($allUsers);
    $allUsers = explode(PHP_EOL, $allUsers);

    foreach($userEmails as $userEmail) {
        $userEmail = explode(",", $userEmail);
        if(($email == $userEmail[0])) {
            $_SESSION['email'] = $userEmail[0];
            array_push($warnings, "A user with this email already exists");
        }
    }

    foreach($allUsers as $user) {
        $user = explode("=", $user);
        if($username == $user[0]) {
            array_push($errors, " username must be unique");
            break;
        } 
    }

    if(count($errors) > 0) {
        redirect("register.php", "danger", $errors);
    }
    if(count($warnings) > 0) {
        redirect("register.php", "warning", $warnings);
    }


    $usernamePassword = "$username=$password";

    $registerText = "$email,$usernamePassword";

    file_put_contents(__DIR__ . "/database/users.txt", $usernamePassword . PHP_EOL, FILE_APPEND);

    if(file_put_contents(__DIR__ . "/database/userEmails.txt", $registerText . PHP_EOL, FILE_APPEND)) {
        redirect("registered.php", 'success', ['User registered. You can login now.']);
    } else {
        redirect("register.php", "danger", ['Registration failed']);
    }


} else if($_POST['action'] == 'login') {
    $username = $_POST['username']; //min4, unique
    $email = $_POST['email'];
    $password = $_POST['password']; //min6,


    if(strlen($username) < 4) {
        array_push($errors, "Email or username must be min 4 chars");
    }

    if(strlen($password) < 6) {
        array_push($errors, "Password must be at least 6 chars");
    }

    if( !preg_match('/[a-z]+/', $password)  
    || !preg_match('/[A-Z]+/', $password)
    || !preg_match('/[0-9]+/', $password)
    || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
    array_push($errors, 'Password must contain at least 1 lowercase, uppercase, number and special character');
    }   

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


    //ako stigne do tuka, korisnikot ne postoi
    redirect("login.php", "danger", ["Wrong username/password combination"]);

    header("Location: login.php");
    die();
 
}

