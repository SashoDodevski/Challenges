<?php
session_start();

require_once __DIR__ . "./db/db.php";


if ($_POST['search_registration'] == "") {
    $_SESSION['msg'] = 'Please enter search parameter!';
    $_SESSION['status'] = 'alert-danger';
    header("Location: index.php");
    die();
} else {

    $search = $_POST['search_registration'];

    $sql = "SELECT * FROM registrations WHERE registration_number LIKE :search";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam('search', $search);

    $stmt->execute();

    $results = $stmt->fetch();

    $_SESSION['registration_results'][] = $results;

    if (!$results) {

        $_SESSION['msg'] = 'No such registration found!';
        $_SESSION['status'] = 'alert-danger';
        header("Location: index.php");
        die();
    }
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
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="index.php">Vehicle Registration</a>
        <ul class="navbar-nav ml-auto float-right">
            <li class="nav-item">
                <a class="nav-link text-primary" href="index.php">Go Back</a>
            </li>
        </ul>
    </nav>


    <div class="container-fluid">

        <div class="row mt-5">
            <div class="col-10 offset-1">


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Vehicle model</th>
                            <th scope="col">Vehicle type</th>
                            <th scope="col">Vehicle chassis number</th>
                            <th scope="col">Vehicle production year</th>
                            <th scope="col">Registration number</th>
                            <th scope="col">Fuel type</th>
                            <th scope="col">Registered to</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <option>
                                <th scope="row"><?= $results['id'] ?></th>
                                <td><?= $results['vehicle_model'] ?></td>
                                <td><?= $results['vehicle_type'] ?></td>
                                <td><?= $results['vehicle_chassis_number'] ?></td>
                                <td><?= $results['vehicle_production_year'] ?></td>
                                <td><?= $results['registration_number'] ?></td>
                                <td><?= $results['fuel_type'] ?></td>
                                <td><?= $results['registration_to'] ?></td>
                            </option>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>