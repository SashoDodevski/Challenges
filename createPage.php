<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . "/database/db.php";

    if (
        empty($_POST['coverImageUrl']) || empty($_POST['mainTitle']) || empty($_POST['subtitle']) || empty($_POST['shortInfo'])
        || empty($_POST['phone']) || empty($_POST['location'])|| empty($_POST['businessType'])|| empty($_POST['imageUrl1']) || empty($_POST['businessDescription1']) || empty($_POST['imageUrl2'])|| empty($_POST['businessDescription2']) || empty($_POST['imageUrl3'])|| empty($_POST['businessDescription3']) || empty($_POST['fullInfo']) || empty($_POST['linkedin']) || empty($_POST['facebook']) || empty($_POST['twitter']) || empty($_POST['instagram'])
    ) {
        $_SESSION['status'] = 'alert-danger';
        $_SESSION['msg'] = 'All fields are required!';
    
        header("Location: pageForm.php");
        die();

    } else {
        $sqlUserInfo = "INSERT
                INTO users_info (short_info, phone, location, full_info, business_type_id) 
                VALUES (:short_info, :phone, :location, :full_info, :business_type_id)";
        $stmtUserInfo = $pdo->prepare($sqlUserInfo);

        $sqlUserBanner = "INSERT 
                INTO user_banners (user_id, cover_img_url, main_title, subtitle) 
                VALUES ((SELECT id FROM users_info ORDER BY id DESC LIMIT 1), :cover_img_url, :main_title, :subtitle)";
        $stmtUserBanner = $pdo->prepare($sqlUserBanner);

        $sqlDescription = "INSERT 
                INTO business_descriptions (user_id, image_url_1, business_1_description, image_url_2, business_2_description, image_url_3, business_3_description) 
                VALUES ((SELECT id FROM users_info ORDER BY id DESC LIMIT 1), :image_url_1, :business_1_description, :image_url_2, :business_2_description, :image_url_3, :business_3_description)";
        $stmtDescription = $pdo->prepare($sqlDescription);

        $sqlSocialNetworks = "INSERT 
                INTO social_networks (user_id, linked_in, facebook, twitter, instagram) 
                VALUES ((SELECT id FROM users_info ORDER BY id DESC LIMIT 1), :linkedIn, :facebook, :twitter, :instagram)";
        $stmtSocialNetworks = $pdo->prepare($sqlSocialNetworks);


        $stmtUserInfo->execute(['short_info' => $_POST['shortInfo'], 'phone' => $_POST['phone'], 'location' => $_POST['location'], 'full_info' => $_POST['fullInfo'], 'business_type_id' => $_POST['businessType']])
            && $stmtUserBanner->execute(['cover_img_url' => $_POST['coverImageUrl'], 'main_title' => $_POST['mainTitle'], 'subtitle' => $_POST['subtitle']])
            && $stmtSocialNetworks->execute(['linkedIn' => $_POST['linkedin'], 'facebook' => $_POST['facebook'], 'twitter' => $_POST['twitter'], 'instagram' => $_POST['instagram']])
            && $stmtDescription->execute(['image_url_1' => $_POST['imageUrl1'], 'business_1_description' => $_POST['businessDescription1'], 'image_url_2' => $_POST['imageUrl2'], 'business_2_description' => $_POST['businessDescription2'], 'image_url_3' => $_POST['imageUrl3'], 'business_3_description' => $_POST['businessDescription3']]);

        header("Location: yourWebPage.php");
        die();
    }
} else {
    $_SESSION['status'] = 'alert-danger';
    $_SESSION['msg'] = 'Wrong credentials!';

    header("Location: index.php");
    die();
}
