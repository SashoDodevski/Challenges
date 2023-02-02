<?php

if((!isset($_SESSION["username"])) || (isset($_SESSION["username"]) && $_SESSION["username"] !== "admin")){
    header('Location: ../index.php');
}

?>