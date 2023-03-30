<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . "/db/db.php";

    if (
        empty($_POST['vehicle_model'])
        ) {
        $_SESSION['status'] = 'alert-danger';
        $_SESSION['msg'] = 'No vehicle entered in form!';
    
        header("Location: insertVehicleForm.php");
        die();

    } else {
        $sqlInsertVehicleModel = "INSERT
                                INTO vehicle_models (vehicle_model) 
                                VALUES (:vehicle_model)";
        $stmtInsertVehicleModel = $pdo->prepare($sqlInsertVehicleModel);
        $stmtInsertVehicleModel->execute(['vehicle_model' => $_POST['vehicle_model']]);

        $_SESSION['status'] = 'alert-success';
        $_SESSION['msg'] = 'New vehicle model added!';

        header("Location: dashboard.php");
        die();
    }
} else {
    $_SESSION['status'] = 'alert-danger';
    $_SESSION['msg'] = 'An error occured. Please try again.';

    header("Location: insertVehicleForm.php");
    die();
}
