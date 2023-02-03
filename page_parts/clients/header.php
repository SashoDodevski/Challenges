<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if ((isset($_SESSION["username"]) && $_SESSION["username"] === "admin")) {
  header('Location: ./admin_interface/adminInterface.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />

  <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.css" rel="stylesheet">
  </link>

  <!-- Local CSS -->
  <link rel="stylesheet" href="style/style.css" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/2acadc57f5.js" crossorigin="anonymous"></script>

  <!-- Document title -->
  <title id="pageTitle"></title>
</head>

<body class="bg-amber-50/40 dark:bg-gray-800">
  <!-- Navbar -->

  <nav class="bg-white px-2 sm:px-4 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600" id="navbar">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
      <div class="flex flex-wrap items-center justify-between">
        <a href="index.php" class="flex items-center">
          <img src="./style/images/navbar_img3.png" class="h-6 mr-3 sm:w-20 sm:h-10 object-contain m-2" alt="Online book library">
        </a>
        <span class="self-center text-sm text-green-300 italic mr-1 mt-1 whitespace-nowrap dark:text-white ">go to</span>
        <a class="self-center text-xl font-semibold text-white whitespace-nowrap dark:text-white" href="dashboard.php"> Book library</a>
      </div>

      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
        </svg>
      </button>

      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 dark:border-gray-700">
          <?php
          if (isset($_SESSION["username"])) {
          ?>
            <li>
              <p class="py-2 pl-3 pr-4 text-white rounded md:p-0 dark:text-white dark:border-cyan-700" id="clientName">
                <?= "Hello " . $_SESSION["username"]; ?>
              </p>
            </li>
            <li>
              <a href="./authentication/signout.php" class="py-2 px-3 text-white rounded hover:bg-gray-200 md:hover:bg-transparent md:hover:text-cyan-900 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" id="navbarSignOut">Sign out</a>
            </li>
          <?php
          } else {
          ?>
            <li>
              <a href="register.php" class="py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-900 md:p-0 md:dark:hover:text-white dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" id="navbarRegister">Register</a>
            </li>
            <li>
              <a href="signin.php" class="py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-900 md:p-0 md:dark:white:text-white dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" id="navbarSignIn">Sign in</a>
            </li>
          <?php }
          ?>

        </ul>
      </div>
    </div>
  </nav>