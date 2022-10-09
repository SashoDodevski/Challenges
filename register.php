<?php

include './autoload.php';
include_once "./parts/header.php";

?>

        <div class="row banner">

            <div class="col-md-12 d-flex align-items-center">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-3 text-info">Sign Up</h2>
                <form class="pt-3 pb-5" method="POST" action="authentication.php">
                <input type="hidden" name="action" value="register" />
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Enter username" id="username" name="username" value="<?= old('username') ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="<?= old('email') ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" placeholder="Enter password" id="password" name="password" />
                    </div>
                    <button type="submit" class="btn btn-info">Sign Up</button>
                </form>

                <p class="bg-white">Already have an account? <br/> 
                    Than click <a href="./login.php">here</a>.</p> 
            </div>
            </div>

        </div>
    </div>

<?php

require_once __DIR__ . "/parts/footer.php";

?>