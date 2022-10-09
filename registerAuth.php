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
checkEmail($email);
checkPassword($password);

$checkFields = checkFields($username, $email, $password);
$checkUsername = checkUsername($username);
$checkEmail = checkEmail($email);
$checkPassword = checkPassword($password);

$allUsers = file_get_contents(__DIR__ . "/database/users.txt");
$allUsers = trim($allUsers);
$allUsers = explode(PHP_EOL, $allUsers);

foreach ($allUsers as $user) {
    $user = explode("=", $user);
    if ($username == $user[0]) {
        array_push($errors, "Username must be unique");
        break;
    }
}

$userEmails = file_get_contents(__DIR__ . "/database/userEmails.txt");
$userEmails = trim($userEmails);
$userEmails = explode(PHP_EOL, $userEmails);

foreach ($userEmails as $userEmail) {
    $userEmail = explode(",", $userEmail);
    if (($email == $userEmail[0])) {
        $_SESSION['email'] = $userEmail[0];
        array_push($warnings, "A user with this email already exists");
    }
}


if (isset($checkFields)) {
    array_push($errors, $checkFields);
}
if (isset($checkUsername)) {
    array_push($errors, $checkUsername);
}
if (isset($checkEmail)) {
    array_push($errors, $checkEmail);
}
if (isset($checkPassword)) {
    array_push($errors, $checkPassword);
}


if (count($errors) > 0) {
    redirect("register.php", "danger", $errors);
}
if (count($warnings) > 0) {
    redirect("register.php", "warning", $warnings);
}

$password = password_hash($password, PASSWORD_BCRYPT);

$usernamePassword = "$username=$password";

$registerText = "$email,$usernamePassword";

file_put_contents(__DIR__ . "/database/users.txt", $usernamePassword . PHP_EOL, FILE_APPEND);

if (file_put_contents(__DIR__ . "/database/userEmails.txt", $registerText . PHP_EOL, FILE_APPEND)) {
    redirect("registered.php", 'success', ['User registered. You can login now.']);
} else {
    redirect("register.php", "danger", ['Registration failed']);
}




redirect("login.php", "danger", ["Wrong username/password combination"]);

header("Location: login.php");
die();
