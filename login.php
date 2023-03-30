<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Local CSS -->
    <link rel="stylesheet" href="./style/style.css" />

    <!-- Document title -->
    <title>Document</title>

    <style>
        .negative-top-positioning {
            margin-top: -56px;
        }
        .navbar {
            z-index: 1;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="index.php">Vehicle Registration</a>
    </nav>

    

    <?php if (isset($_SESSION['msg'])) { ?>
        <div class="text-center alert <?=$_SESSION['status']?>">
            <?= $_SESSION['msg'] ?>
        </div>
    <?php  }
    unset($_SESSION['msg']);
    unset($_SESSION['status']); ?>

    <div class="container-fluid">
        <div class="row vh-100 negative-top-positioning">
            <div class="col-md-12 d-flex align-items-center">
                <div class="col-4 offset-4">
                    <h2 class="mb-3 text-primary text-center">Login</h2>
                    <form class="pt-3 pb-5" method="POST" action="authentication.php">
                        <input type="hidden" name="action" value="login" />
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" placeholder="Enter username" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="password" />
                        </div>
                        <button type="submit" class="btn btn-primary px-4">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>