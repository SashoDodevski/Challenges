<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    die();
}

require_once __DIR__ . "/db/db.php";

$sqlGetVehicleModel = "SELECT * FROM vehicle_models";
$stmtGetVehicleModel = $pdo->query($sqlGetVehicleModel);

$sqlGetVehicleType = "SELECT * FROM vehicle_types";
$stmtGetVehicleType = $pdo->query($sqlGetVehicleType);

$sqlGetFuelType = "SELECT * FROM fuel_types";
$stmtGetFuelType = $pdo->query($sqlGetFuelType);

$sqlGetRegistration = "SELECT * FROM registrations";
$stmtGetRegistration = $pdo->query($sqlGetRegistration);
$stmtGetId = $pdo->query($sqlGetRegistration);

$sqlOneMonthExpiry = "SELECT * from registrations WHERE 'registration_to' < NOW() - INTERVAL 30 DAY;";
$stmtOneMonthExpiry = $pdo->query($sqlOneMonthExpiry);

$sqlExpiredRegistration = "SELECT * from registrations WHERE 'registration_to' < NOW() - INTERVAL 0 DAY;";
$stmtExpiredRegistration = $pdo->query($sqlExpiredRegistration);

if (!empty($_POST['action'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'search' && $_POST['search'] == '') {
            $_SESSION['msg'] = 'Please enter search parameter!';
            $_SESSION['status'] = 'alert-danger';
        } else {
            if ($_POST['action'] == 'search') {

                $search = $_POST['search'];

                $sql = "SELECT * FROM registrations WHERE vehicle_model LIKE :search OR registration_number LIKE :search OR vehicle_chassis_number LIKE :search";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam('search', $search);

                $stmt->execute();

                $results = $stmt->fetchAll();

                $_SESSION['search_results'][] = $results;

                if (empty($_SESSION['search_results'][0])) {

                    $_SESSION['msg'] = 'No result found!';
                    $_SESSION['status'] = 'alert-danger';
                }
            } elseif ($_POST['action'] == 'edit' || $_POST['action'] == 'extend') {
                $edit_form = [];

                $sql = "SELECT * FROM registrations WHERE id = :id LIMIT 1";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'id' => $_POST['id']
                ]);

                if ($stmt->rowCount() == 1) {
                    $edit_form = $stmt->fetch();
                }
            } elseif ($_POST['action'] == 'delete') {
                $sql = "DELETE FROM registrations WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'id' => $_POST['id'],
                ]);
        
                $_SESSION['msg'] = 'Vehicle registration deleted!';
                $_SESSION['status'] = 'alert-success';
            } elseif ($_POST['action'] == 'update') {
                if (
                    empty($_POST['vehicle_chassis_number']) || empty($_POST['vehicle_production_year']) || empty($_POST['registration_number']) || empty($_POST['registration_to'])
                ) {
                    $_SESSION['msg'] = 'All fields are required!';
                    $_SESSION['status'] = 'alert-danger';
                } else {
                    $sql = "UPDATE registrations SET
                    vehicle_model = :vehicle_model, 
                    vehicle_type = :vehicle_type, 
                    vehicle_chassis_number = :vehicle_chassis_number, 
                    vehicle_production_year = :vehicle_production_year, 
                    registration_number = :registration_number, 
                    fuel_type = :fuel_type,
                    registration_to = :registration_to
                    WHERE id = :id
                    ";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(
                        [
                            'vehicle_model' => $_POST['vehicle_model'],
                            'vehicle_type' => $_POST['vehicle_type'],
                            'vehicle_chassis_number' => $_POST['vehicle_chassis_number'],
                            'vehicle_production_year' => $_POST['vehicle_production_year'],
                            'registration_number' => $_POST['registration_number'],
                            'fuel_type' => $_POST['fuel_type'],
                            'registration_to' => $_POST['registration_to'],
                            'id' => $_POST['id']
                        ]
                    );

                    $_SESSION['msg'] = 'Registration updated!';
                    $_SESSION['status'] = 'alert-success';
                }
            }
        }
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
        .top-positioning {
            margin-top: -48px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="index.php">Vehicle Registration</a>
        <a class="nav-item nav-link text-primary" href="insertVehicleForm.php">Insert vehicle model</a>

        <ul class="navbar-nav ml-auto float-right">
            <li class="nav-item">
                <a class="nav-link disabled">Hi <?= $_SESSION['username'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2 my-5">
                <?php if (isset($_SESSION['msg'])) { ?>
                    <div class="top-positioning text-center alert <?= $_SESSION['status'] ?>">
                        <?= $_SESSION['msg'] ?>
                    </div>
                <?php  }
                unset($_SESSION['status']);
                unset($_SESSION['msg']) ?>

                <h2 class="text-center mb-4">Vehicle Registration</h2>
                <form class="form" method="POST" <?= empty($edit_form) ? 'action="insertRegistration.php"' : '' ?>>

                <?php
                    if (isset($edit_form['id'])) {
                ?>
                <input type="hidden" class="form-control" name="id" value="<?=$edit_form['id']?>">
                <?php } ?>

                    <div class="row">
                        <div class="col">
                            <label for="vehicle_model">Vehicle model</label>
                            <select class="form-control" name="vehicle_model">
                                <?php while ($vehicleModel = $stmtGetVehicleModel->fetch()) { ?>
                                    <option>
                                        <?= isset($edit_form['vehicle_model']) ? $edit_form['vehicle_model'] : $vehicleModel['vehicle_model'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="vehicle_type">Vehicle type</label>
                            <select class="form-control" name="vehicle_type">
                                <?php while ($vehicleType = $stmtGetVehicleType->fetch()) { ?>
                                    <option>
                                        <?= isset($edit_form['vehicle_type']) ? $edit_form['vehicle_type'] : $vehicleType['vehicle_type'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="vehicle_chassis_number">Vehicle chassis number</label>
                            <input type="text" class="form-control" name="vehicle_chassis_number" placeholder="enter chassis number..." value="<?= isset($edit_form['vehicle_chassis_number']) ? $edit_form['vehicle_chassis_number'] : '' ?>">
                        </div>
                        <div class="col">
                            <label for="vehicle_production_year">Vehicle production year</label>
                            <input type="date" class="form-control" name="vehicle_production_year">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="registration_number">Vehicle registration number</label>
                            <input type="text" class="form-control" name="registration_number" placeholder="enter registration number here..." value="<?= isset($edit_form['registration_number']) ? $edit_form['registration_number'] : '' ?>">
                        </div>
                        <div class="col">
                            <label for="fuel_type">Fuel type</label>
                            <select class="form-control" name="fuel_type">
                                <?php while ($fuelType = $stmtGetFuelType->fetch()) { ?>
                                    <option>
                                        <?= isset($edit_form['fuel_type']) ? $edit_form['fuel_type'] : $fuelType['fuel_type'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="registration_to">Registration to</label>
                            <input type="date" class="form-control" name="registration_to">
                        </div>
                        <div class="col mt-auto">
                            <?php
                            if (isset($edit_form['fuel_type'])) {
                            ?>
                                <input type="hidden" name="action" value="update">
                                <button type="submit" class="btn btn-primary px-4 w-100">Update</button>
                            <?php } else {
                            ?>
                                <button type="submit" class="btn btn-primary px-4 w-100">Submit</button>
                            <?php }
                            ?>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-10 offset-1">
                <table class="table table-hover">
                    <thead>
                        <form class="search-box d-flex justify-content-around" action="" method="POST">
                            <div>
                                <tr class="bg-light">
                                    <th scope="col" colspan="9">
                                        <div class="input-group w-25 float-right">
                                            <input type="hidden" name="action" value="search">
                                            <input type="text" class="form-control" name="search" placeholder="Search...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                                            </div>
                                    </th>
                                </tr>
                        </form>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Vehicle model</th>
                            <th scope="col">Vehicle type</th>
                            <th scope="col">Vehicle chassis number</th>
                            <th scope="col">Vehicle production year</th>
                            <th scope="col">Registration number</th>
                            <th scope="col">Fuel type</th>
                            <th scope="col">Registered to</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['search_results'])) {
                            foreach ($results as $result) {
                        ?>
                                <tr class="
                                <?php
                                    if( (strtotime($result['registration_to'])) - time() < (0) ) {
                                        echo 'text-danger';
                                    } elseif (  (strtotime($result['registration_to'])) - time() < (30 * 24 * 60 * 60) ) {
                                        echo 'text-warning';
                                    };
                                ?>
                                ">
                                    <option>
                                        <th scope="row"><?= $result['id'] ?></th>
                                        <td><?= $result['vehicle_model'] ?></td>
                                        <td><?= $result['vehicle_type'] ?></td>
                                        <td><?= $result['vehicle_chassis_number'] ?></td>
                                        <td><?= $result['vehicle_production_year'] ?></td>
                                        <td><?= $result['registration_number'] ?></td>
                                        <td><?= $result['fuel_type'] ?></td>
                                        <td><?= $result['registration_to'] ?></td>
                                        <td class="d-flex">
                                            <form action="" method="POST">
                                                <input type="hidden" name="action" value="edit">
                                                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-warning mx-1">Edit</button>
                                            </form>
                                            <form action="" method="POST">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-danger mx-1">Delete</button>
                                            </form>
                                            <?php
                                                if((strtotime($result['registration_to'])) - time() < (30 * 24 * 60 * 60) ) { ?>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="action" value="extend">
                                                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                                        <button type="submit" class="btn btn-sm btn-success mx-1">Extend</button>
                                            </form>
                                            <?php  
                                                };
                                            ?>
                                        </td>
                                    </option>
                                </tr>
                            <?php
                            }
                            unset($_SESSION['search_results']);
                        } else {
                            while ($registration = $stmtGetRegistration->fetch()) { ?>
                                <tr class="
                                <?php
                                    if( (strtotime($registration['registration_to'])) - time() < (0) ) {
                                        echo 'text-danger';
                                    } elseif (  (strtotime($registration['registration_to'])) - time() < (30 * 24 * 60 * 60) ) {
                                        echo 'text-warning';
                                    };
                                ?>
                                ">
                                    <option>
                                        <th scope="row"><?= $registration['id'] ?></th>
                                        <td><?= $registration['vehicle_model'] ?></td>
                                        <td><?= $registration['vehicle_type'] ?></td>
                                        <td><?= $registration['vehicle_chassis_number'] ?></td>
                                        <td><?= $registration['vehicle_production_year'] ?></td>
                                        <td><?= $registration['registration_number'] ?></td>
                                        <td><?= $registration['fuel_type'] ?></td>
                                        <td><?= $registration['registration_to'] ?></td>
                                        <td class="d-flex">
                                            <form action="" method="POST">
                                                <input type="hidden" name="action" value="edit">
                                                <input type="hidden" name="id" value="<?= $registration['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-warning mx-1">Edit</button>
                                            </form>
                                            <form action="" method="POST">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?= $registration['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-danger mx-1">Delete</button>
                                            </form>
                                            <?php
                                                if((strtotime($registration['registration_to'])) - time() < (30 * 24 * 60 * 60) ) { ?>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="action" value="extend">
                                                        <input type="hidden" name="id" value="<?= $registration['id'] ?>">
                                                        <button type="submit" class="btn btn-sm btn-success mx-1">Extend</button>
                                            </form>
                                            <?php  
                                                };
                                            ?>
                                        </td>
                                    </option>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>