<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SummerFun</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

<div class="container">

    <div class="row">
        <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        
        <li class="nav-item">
            <a class="nav-link" href="register.php">Sign Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a>
        </li>
        
        </ul>
    </div>
</nav>
        </div>
    </div>

    <?php
    if (isset($_SESSION['status'])) {
        $msgs = $_SESSION['msgs'];

        echo "<div class='container'><div class='row'><div class='col'>";

        if ($_SESSION['status'] == 'danger') {
            echo "<div class='alert alert-danger text-center'>";
            foreach ($msgs as $msg) {
                echo "$msg <br/>";
            }
            echo "</div>";
        } else if ($_SESSION['status'] == 'warning') {
            echo "<div class='alert alert-warning text-center'>";
            foreach ($msgs as $msg) {
                echo "$msg<br/>";
            }
            echo "</div>";
        } else if ($_SESSION['status'] == 'success') {
            echo "<div class='alert alert-success text-center'>";
            foreach ($msgs as $msg) {
                echo "$msg<br/>";
            }
            echo "</div>";
        }

        echo "</div></div></div>";

        unset($_SESSION['status']);
        unset($_SESSION['msg']);
    }
    ?>