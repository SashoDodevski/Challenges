<?php

$name = $_POST["name"];
$company = $_POST["company"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$students = $_POST["students"];


$host = "localhost";
$dbname = "vraboti_student_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}


$postsql = "INSERT INTO aplication_form (name, company, email, phone, students)
VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $postsql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssss",
                        $name,
                        $company,
                        $email,
                        $phone,
                        $students);


mysqli_stmt_execute($stmt);

$link_address = '"./test.html"';
echo '
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"/>

    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/2acadc57f5.js" crossorigin="anonymous"></script>

    <!-- Document title -->
    <title>Document</title>

  </head>

  <body>

    <div class="container-fluid bg-primary vh-100">

        <!-- Banner -->



        <div class="row pt-5">
            <div class="form-success-container offset-md-3 offset-lg-4 col-sm-12 col-md-6 col-lg-4">
                <div class="form-success mx-auto shadow">
                    <div class="image p-5"></div>
                        <div class="body text-center m-0 p-0 d-flex flex-column">
                            <h2 class="card-title h2 pt-5">Формата е успешно пратена! <br><br>Ви благодариме</h2>
                            <a href="./form.php" class="btn btn-danger text-white px-2 py-3 w-100 fixed-bottom">Вратете се на претходната страна</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
   

    <!-- Scripts -->

    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

';
 

?>