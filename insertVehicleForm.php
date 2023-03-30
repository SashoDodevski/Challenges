<?php

session_start();

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
        .top-positioning {
            margin-top: -56px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="index.php">Vehicle Registration</a>
        <ul class="navbar-nav ml-auto float-right">
            <li class="nav-item">
                <a class="nav-link text-primary" href="dashboard.php">Back</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <?php if (isset($_SESSION['msg'])) { ?>
            <div class="text-center alert <?= $_SESSION['status'] ?>">
                <?= $_SESSION['msg'] ?>
            </div>
        <?php  }
        unset($_SESSION['status']);
        unset($_SESSION['msg']) ?>
        <div class="row vh-100 top-positioning">
            <div class="col-12 my-5 d-flex align-items-center">

                <form class="search-box d-flex justify-content-around text-center mx-auto" action="insertVehicleToDB.php" method="POST">
                    <div class="jumbotron bg-info">
                        <h2>Insert new vehicle model</h2>
                        <p class="lead">Enter new vehicle model</p>

                        <input class="form-control mt-4" type="text" placeholder="vehicle model..." name="vehicle_model"><br />
                        <button type="submit" class="btn btn-dark px-4">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>