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
    
</head>
<body>

    <div class="container-fluid ">

        <div class="row ">

            <div class="col-md-12 vh-100 d-flex align-items-center justify-content-center flex-column align-middle text-white textShadow indexBg">
                <?php if(isset($_SESSION['status']) && isset($_SESSION['msg'])) {
                    echo "<p class='alert {$_SESSION['status']}'>{$_SESSION['msg']}</p>";
                    unset($_SESSION['status']);
                    unset($_SESSION['msg']);
                }
                ?>
                <h1 class="h2">Create Your own web page!</h1><br>
                <p class="subtitle ">All You need to do is fill up this form</p><br>          
                <a class="btn btn btn-light px-3" href="./pageForm.php">Start</a>

            </div>
        
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
</body>
</html>
