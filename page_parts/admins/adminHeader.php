<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include_once "../routers/clientRouter.php";
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

    
  <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.css" rel="stylesheet"></link>

    <!-- Local CSS -->
    <link rel="stylesheet" href="../style/style.css" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/2acadc57f5.js" crossorigin="anonymous"></script>

    <!-- Document title -->
    <title id="Admin Interface"></title>
</head>

<body class="dark:bg-gray-700">

    <!-- Navbar -->

    <nav class="bg-white px-2 sm:px-4 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="container grid grid-cols-2 items-center mx-auto">
        <div class="flex justify-start hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex justify-end flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                    <li>
                    <a href="./adminInterface.php" class="py-2 pl-3 pr-4 text-cyan-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" >Admin interface</a>
                    </li>
                    <li>
                        <a href="./adminBooks.php" class="py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Books</a>
                    </li>
                    <li>
                        <a href="./adminAuthors.php" class="py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Authors</a>
                    </li>
                    <li class="showContentToClients">
                        <a href="./adminCategories.php" class="py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Categories</a>
                    </li>
                    <li>
                        <a href="./adminComments.php" class="py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Comments</a>
                    </li>
                </ul>
            </div>

            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>

            </button>


            <div class="flex justify-end hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex justify-end flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                    <li class="showContentToClients">
                        <p class="py-2 pl-3 pr-4 text-cyan-600 rounded md:p-0 dark:text-cyan-500 dark:border-cyan-700" id="clientName">
                            <?php
                            if (isset($_SESSION["username"])) {
                                echo "Hello " . $_SESSION["username"];
                            }
                            ?>
                        </p>
                    </li>
                    <li class="hideContentToClients">
                        <a href="../authentication/signin.php" class="py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" id="navbarSignIn">Sign in</a>
                    </li>
                    <li class="showContentToClients">
                        <a href="../authentication/signout.php" class="py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" id="navbarSignOut">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>