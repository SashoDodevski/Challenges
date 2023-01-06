<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . "./database/db.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlAdmins = "SELECT * FROM admins WHERE email = :email LIMIT 1";
    $stmtAdmins = $pdo->prepare($sqlAdmins);
    $stmtAdmins->execute([
          'email' => $email
    ]);

    $sqlUsers = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmtUsers = $pdo->prepare($sqlUsers);
    $stmtUsers->execute([
          'email' => $email
    ]);

    if ($stmtAdmins->rowCount() == 1) {
        $user = $stmtAdmins->fetch();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['name'];

            header('Location: adminInterface.php');
        } else {
            $_SESSION['msg'] = 'Wrong password!';
            $_SESSION['status'] = 'bg-red-100';

            header('Location: signin.php');
            die();
        }
    } elseif ($stmtUsers->rowCount() == 1) {
        $user = $stmtUsers->fetch();

        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['username'];
            ?> 
            <script>
                let showContentToClients = document.querySelectorAll(".showContentToClients");
                showContentToClients.style.display = "block";
                let hideContentToClients = document.querySelectorAll(".hideContentToClients");
                hideContentToClients.style.display = "none";
            </script>
            <?php

            $_SESSION['msg'] = 'Something something!';
            $_SESSION['status'] = 'bg-yellow-100';
            header('Location: index.php');
        } else {
            $_SESSION['msg'] = 'Wrong password!';
            $_SESSION['status'] = 'bg-red-100';

            header('Location: signin.php');
            die();
        } 
    } else {
        $_SESSION['msg'] = 'Wrong credentials!';
        $_SESSION['status'] = 'bg-red-100';

        header('Location: signin.php');
        die();
    }
} else {
    header('Location: index.php');
    die();
}
