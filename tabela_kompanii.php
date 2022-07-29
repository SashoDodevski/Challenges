<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela_kompanii</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"/>

    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css" />

</head>
<body>

    <div class="container-fluid p-5 m-0">

        
        <h2>Табела со компании заинтересирани за вработување на студенти од академиите на Brainster</h2>
        <br>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Име</th>
                    <th scope="col">e-mail</th>
                    <th scope="col">Компанија</th>
                    <th scope="col">Телефон за контакт</th>
                    <th scope="col">Студент од академија</th>
                </tr>
                <tbody>

                    <?php
                    $hostname = "localhost";
                    $username = "root";
                    $password = "";
                    $databaseName = "vraboti_student_db";

                    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

                    // Check connection
                    if ($connect->connect_error) {
                        die("Connection failed: " . $connect->connect_error);
                    }

                    $query = "SELECT * FROM `aplication_form`";

                    $result = mysqli_query($connect, $query);

                    if (!$result) {
                        die ("Invalid query: " . $connect->connect_error);
                    }

                    while($row = mysqli_fetch_array($result)) {

                        echo "
                        <tr>
                            <td>" . $row["0"] . "</td>
                            <td>" . $row["1"] . "</td>
                            <td>" . $row["2"] . "</td>
                            <td>" . $row["3"] . "</td>
                            <td>" . $row["4"] . "</td>
                            <td>" . $row["5"] . "</td>
                        </tr>
                        ";
                    }
                    ?>

                    
                </tbody>
            </thead>
        </table>

    </div>

</body>
</html>