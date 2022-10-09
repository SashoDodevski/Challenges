<?php

function checkRequest() {
    if($_SERVER['REQUEST_METHOD'] != "POST") {
        redirect(INDEX_PAGE);
    } 
}

function redirect($url, $status = '', $msgs = []) {
    $_SESSION['status'] = $status;
    $_SESSION['msgs'] = $msgs;

    $_SESSION['old'] = $_POST;

    header("Location: $url");
    die();
}

function old($fieldName) {
    return $_SESSION['old'][$fieldName] ?? '';
}

function checkFields($username, $email, $password) {
    if($username == '' || $email == '' || $password == '') {
        $error = 'All inputs are required (no empty fields are allowed) !';
        return $error;
    }  
}

function checkUsername($username) {
    if( !preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        $error = 'Username cannot contain empty spaces or special signs !';
        return $error; 
    }
}

function checkEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailCheck = explode("@", $email);
        if(strlen($emailCheck[0]) < 5) {
            $error = 'Email must have at least 5 characters before @ !';
            return $error; 
        }
      }
}

function checkPassword($password) {
    if( !preg_match('/[a-z]+/', $password)  
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
        $error = 'Password must contain at least 1 lowercase, uppercase, number and special character !';
        return $error; 
    }
}

