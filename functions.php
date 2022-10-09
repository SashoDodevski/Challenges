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

