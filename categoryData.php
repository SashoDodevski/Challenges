<?php
// session_start();

// if (isset($_SESSION['username'])) {
//     header('Location: dashboard.php');
//     die();
// }
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

    <!-- Local CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Document title -->
    <title>Library SignIn</title>
</head>

<body>

    <div class="container flex flex-wrap items-center justify-between mx-auto">

        <!-- Navbar -->

        <nav class="bg-white px-2 sm:px-4 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <div class="flex flex-wrap items-center justify-between">
                    <a href="index.php" class="flex items-center">
                        <img src="./images/Navbar_img.png" class="h-6 mr-3 sm:w-20 sm:h-10 object-cover m-2" alt="Online book library">
                    </a>
                    <span class="self-center text-sm text-green-600 italic mr-1 mt-1 whitespace-nowrap dark:text-white ">go to</span>
                    <span class="self-center text-xl font-semibold text-blue-900 whitespace-nowrap dark:text-white"> Book library</span>
                </div>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="./signout.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Alert message -->
        <?php if (isset($_SESSION['msg'])) { ?>
            <div class="text-center alert <?= $_SESSION['status'] ?>">
                <?= $_SESSION['msg'] ?>
            </div>
        <?php  }
        unset($_SESSION['msg']);
        unset($_SESSION['status']); ?>


        <!-- Book data -->
        <div class="p-6 shadow-lg rounded-lg bg-gray-100 text-gray-700 mx-auto mt-24 mb-10 w-10/12 p-10">

            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 mx-auto">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 text-blue-900">
                    <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-white">
                        Enter category
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter category name" required="">
                        </div>
                        
                        <button type="submit" class="w-full text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>

        </div>

        </div>
        
<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-10/12 mx-auto mb-10">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="pl-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 w-full">
                    Name
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    1
                </th>
                <td class="pl-6 py-4">
                    Sliver
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

    </div>

    </div>

    </div>