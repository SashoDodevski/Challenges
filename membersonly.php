<?php

include './autoload.php';
include_once "./parts/header.php";

$name = $_SESSION['username'];

?>


        <div class="row banner">
            <div class="col-md-12">
                <h3 class="text-info my-5">Welcome <?= $name ?>!</h3>
                <p>Here is our offer: ...</p>
            </div>
        </div>
    </div>

<?php 
    require_once __DIR__ . "/parts/footer.php";
?>
