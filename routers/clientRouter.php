<?php

if(isset($_SESSION["username"]) && $_SESSION["username"] != "admin"){
    header('Location: index.php');
}

?>