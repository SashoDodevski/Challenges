<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vraboti_student_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, akademija FROM studenti";
$result = $conn->query($sql);


?>