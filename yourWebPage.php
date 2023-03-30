<?php

require_once __DIR__ . "/database/db.php";

$sql = "SELECT users_info.*, business_types.*, user_banners.*, business_descriptions.*, social_networks.* 
FROM users_info 
JOIN business_types ON business_types.id = users_info.business_type_id 
JOIN user_banners ON user_banners.user_id = users_info.id JOIN business_descriptions ON business_descriptions.user_id = users_info.id 
JOIN social_networks ON social_networks.user_id = users_info.id
ORDER BY users_info.id DESC
LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$page = $stmt->fetch();

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
    <style>
        .SectionHomeBg {
            background-image: url(<?=$page['cover_img_url']?>);
        }

    </style>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/2acadc57f5.js" crossorigin="anonymous"></script>


    <!-- Document title -->
    <title>Your Page</title>
</head>

<body>

    <div class="container-fluid">


        <!-- Navbar -->

        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed col-12" id="navbar">
                <a class="navbar-brand" href="index.php">Webster</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#Home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#AboutUs">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#<?=$page['business_type']?>"><?=$page['business_type']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <!-- Home -->

        <div id="Home">
            <div class="row SectionHome text-white overflow-hidden">
                <div class="col-12 d-flex align-items-center justify-content-center flex-column align-middle text-white textShadow SectionHomeBg">
                    <h1><?=$page['main_title']?></h1><br>
                    <p class="subtitle"><?=$page['subtitle']?></p>
                </div>
            </div>
        </div>


        <!-- About Us -->

        <div id="AboutUs">
            <div class="row offset-1 col-10 SectionAboutUs d-flex text-center color-secondary text-dark px-5 py-4">
                <div class="col-8 offset-2">
                    <h3>About us</h3>
                        <p><?=$page['short_info']?></p>
                        <div class="col-6 offset-3">
                            <hr>
                        </div>
                        <p>Tel: <?=$page['phone']?></p>
                        <p>Location:  <?=$page['location']?></p>
                </div>
            </div>
        </div>


        <!-- Services -->

        <div id="Services">
            <div class="row SectionServices offset-1 col-10 d-flex flex-column color-secondary text-dark py-5">
                <div class="row">
                    <div class="col-12">
                        <h2>Services</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        <div class="card col-3">
                            <img src="<?=$page['image_url_1']?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><?=$page['business_1_description']?></p>
                            </div>
                        </div>
                        <div class="card col-3">
                        <img src="<?=$page['image_url_2']?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><?=$page['business_2_description']?></p>
                            </div>
                        </div>
                        <div class="card col-3">
                        <img src="<?=$page['image_url_3']?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><?=$page['business_3_description']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Contact -->

        <div id="Contact">
            <div class="offset-1 col-10 d-flex text-dark py-5 px-0">
                <div class="col-lg-6">
                    <h4>Contact</h4>
                    <p class="pt-3 pb-3"><?= $page['full_info'] ?></p>
                </div>

                <div class="col-lg-6">
                    <form class="form" method="POST" action="#">
                        <div class="form-group">
                            <label for="imageUrl">Name</label>
                            <input type="text" class="form-control" id="imageUrl" name="imageUrl">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <input type="textarea" class="form-control" id="message" name="message">
                        </div>
                        <div class="d-flex mb-5">
                            <button type="submit" class="btn btn-info">Send</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>


        <!-- Footer -->

        <div class="row">
            <div class="col-12 bg-secondary text-white text-center py-1">
                <div class="row">
                    <div class="col-12 bg-secondary text-white text-center">
                        <p class="m-0 h6 py-1">Copyright &copy 2022</p>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-4 offset-4 bg-secondary text-white text-center py-1 mb-0">
                        <ul class="d-flex flex-row justify-content-around mb-0">
                            <li><a href="<?= $page['linked_in'] ?>" target="_blank"><i class="fa-brands fa-linkedin-in text-white"></i></a></li>
                            <li><a href="<?= $page['facebook'] ?>" target="_blank"><i class="fa-brands fa-facebook-f text-white"></i></a></li>
                            <li><a href="<?= $page['twitter'] ?>" target="_blank"><i class="fa-brands fa-twitter text-white"></i></a></li>
                            <li><a href="<?= $page['instagram'] ?>" target="_blank"><i class="fa-brands fa-instagram text-white"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- <?php 
                    while ($row = $stmt->fetch()) { ?> 
                <div class="row mb-0">
                    <div class="col-4 offset-4 bg-secondary text-white text-center py-1 mb-0">
                        <ul class="d-flex flex-row justify-content-around mb-0">
                            <li><a href="<?=$row['linkedIn']?>" target="_blank"><i class="fa-brands fa-linkedin-in text-white"></i></a></li>
                            <li><a href="<?= $row['facebook']?>" target="_blank"><i class="fa-brands fa-facebook-f text-white"></i></a></li>
                            <li><a href="<?= $row['twitter']?>" target="_blank"><i class="fa-brands fa-twitter text-white"></i></a></li>
                            <li><a href="<?= $row['instagram']?>" target="_blank"><i class="fa-brands fa-instagram text-white"></i></a></li>
                        </ul>
                    </div>
                </div>
                <?php } ?> -->
            </div>
        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>