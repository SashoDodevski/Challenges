<?php
session_start();
require_once __DIR__ . "/database/db.php";

$businessTypeSql = "SELECT * FROM business_types";
$businessTypeStmt = $pdo->prepare($businessTypeSql);
$businessTypeStmt->execute();

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

    <div class="container-fluid fixedcontainer">

        <div class="row my-5">

            <div class="col-md-12 vh-100 d-flex align-items-center flex-column align-middle textShadow text-dark">

                <?php if (isset($_SESSION['status']) && isset($_SESSION['msg'])) { ?>
                    

                    <p class='alert <?=$_SESSION['status']?> w-100 text-center'><?=$_SESSION['msg']?></p>
                   
                <?php    
                    unset($_SESSION['status']);
                    unset($_SESSION['msg']);
                }
                ?>
                
                <h2 class="h5">You are one step away from your webpage</h2><br>

                <form class="form" method="POST" action="createPage.php">

                    <div class="rounded-lg w-50 bg-light p-4 mx-auto mb-4">
                        <div class="form-group">
                            <label for="coverImageUrl">Cover image URL</label>
                            <input type="text" class="form-control" id="coverImageUrl" name="coverImageUrl">
                        </div>
                        <div class="form-group">
                            <label for="mainTitle">Main Title of Page</label>
                            <input type="text" class="form-control" id="mainTitle" name="mainTitle">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtitle of page</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle">
                        </div>
                        <div class="form-group">
                            <label for="shortInfo">Short info of the company</label>
                            <textarea type="text" class="form-control" id="shortInfo" name="shortInfo" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telephone number</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                    </div>

                    <div class="rounded-lg w-50 bg-light p-4 mx-auto mb-4">
                        <div class="form-group">
                            <label for="businessType">Do you provide products or services?</label>
                            <select class="form-control" id="businessType" name="businessType">
                                <?php
                                while ($row = $businessTypeStmt->fetch()) {
                                    echo "
                                    <option value=\"{$row['id']}\">{$row['business_type']}</option>";
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="rounded-lg w-50 bg-light p-4 mx-auto mb-4">
                        <p>Provide url for an image and description of your service/product</p>
                        <div class="form-group">
                            <label for="imageUrl1">Image URL</label>
                            <input type="text" class="form-control" id="imageUrl1" name="imageUrl1">
                        </div>
                        <div class="form-group">
                            <label for="businessDescription1">Description of service/product</label>
                            <textarea type="text" class="form-control" id="businessDescription1" name="businessDescription1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="imageUrl2">Image URL</label>
                            <input type="text" class="form-control" id="imageUrl2" name="imageUrl2">
                        </div>
                        <div class="form-group">
                            <label for="businessDescription2">Description of service/product</label>
                            <textarea type="text" class="form-control" id="businessDescription2" name="businessDescription2" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="imageUrl3">Image URL</label>
                            <input type="text" class="form-control" id="imageUrl3" name="imageUrl3">
                        </div>
                        <div class="form-group">
                            <label for="businessDescription3">Description of service/product</label>
                            <textarea type="text" class="form-control" id="businessDescription3" name="businessDescription3" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="rounded-lg w-50 bg-light p-4 mx-auto mb-4">
                        <div class="form-group pb-4">
                            <label for="fullInfo">Provide a description of your company, something people shoud be aware of before they contact you:</label>
                            <textarea type="text" class="form-control" id="fullInfo" name="fullInfo" rows="3"></textarea>
                        </div>
                        <hr class="pb-4">
                        <div class="form-group">
                            <label for="linkedin">LinkedIn</label>
                            <input type="textarea" class="form-control" id="linkedin" name="linkedin">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="textarea" class="form-control" id="facebook" name="facebook">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="textarea" class="form-control" id="twitter" name="twitter">
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="textarea" class="form-control" id="instagram" name="instagram">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-5">
                        <button type="submit" class="btn btn-secondary w-50">Save</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>