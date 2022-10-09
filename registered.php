<?php

include './autoload.php';
include_once "./parts/header.php";

$name = $_SESSION['old']['username'];

?>


        <div class="row banner">
            <div class="col-md-12 text-center">
                <h2 class="text-info mt-5 mb-2">Welcome <?=$name?>! <br/> You are now a member!</h2>
                <p class="bg-white">Wanna Log In? <br/> Click <a href="./login.php">here</a>.</p> 
            </div>
        </div>
    </div>

<?php 
    require_once __DIR__ . "/parts/footer.php";
?>