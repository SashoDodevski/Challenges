<?php

include './autoload.php';
include_once "./parts/header.php";

?>

        <div class="row banner">

        <div class="col-md-12 d-flex align-items-center">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-3 text-info">LogIn</h2>
                <form class="pt-3 pb-5" method="POST" action="loginAuth.php">
                <input type="hidden" name="action" value="login" />
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Enter username" name="username" value="<?= old('username') ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input  type="text" class="form-control" placeholder="Enter password" name="password" />
                    </div>
                    <button type="submit" class="btn btn-info">Login</button>
                </form>

                <p class="bg-white">You don't have an account? <br/> Than click <a href="./register.php">here</a>.</p> 
            </div>
        </div>
    </div>
    
<?php 

    require_once __DIR__ . "/parts/footer.php";

?>