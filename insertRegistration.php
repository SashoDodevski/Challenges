<?php

session_start();

require_once __DIR__ . "/db/db.php";

$chassis_number = $_POST['vehicle_chassis_number'];
$sqlGetChassis = "SELECT vehicle_chassis_number FROM registrations WHERE vehicle_chassis_number LIKE $chassis_number";
$stmtGetChassis = $pdo->query($sqlGetChassis);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        empty($_POST['vehicle_chassis_number']) || empty($_POST['vehicle_production_year']) || empty($_POST['registration_number']) || empty($_POST['registration_to'])
    ) {
        $_SESSION['msg'] = 'All fields are required!';
        $_SESSION['status'] = 'alert-danger';

        header('Location: dashboard.php');
        die();
    } else if (!$stmtGetChassis) {
        $_SESSION['msg'] = 'Vehicle aleady exists!';
        $_SESSION['status'] = 'alert-danger';

        header('Location: dashboard.php');
        die();
    } else {
        $sql = "INSERT INTO registrations (vehicle_model, vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type, registration_to) 
                    VALUES(:vehicle_model, :vehicle_type, :vehicle_chassis_number, :vehicle_production_year, :registration_number, :fuel_type, :registration_to)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'vehicle_model' => $_POST['vehicle_model'],
                'vehicle_type' => $_POST['vehicle_type'],
                'vehicle_chassis_number' => $_POST['vehicle_chassis_number'],
                'vehicle_production_year' => $_POST['vehicle_production_year'],
                'registration_number' => $_POST['registration_number'],
                'fuel_type' => $_POST['fuel_type'],
                'registration_to' => $_POST['registration_to']
            ]
        );

        $_SESSION['msg'] = 'Vehicle registration registered!';
        $_SESSION['status'] = 'alert-success';

        header('Location: dashboard.php');
        die();
    }
}
