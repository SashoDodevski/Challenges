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


        <!-- Book info -->
        <div class="p-6 shadow-lg rounded-lg bg-gray-100 text-gray-700 mx-auto mt-24 mb-10 w-10/12 m-0">
            <div href="#" class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full mb-6">
                <img class="object-cover rounded-t-lg h-96 md:h-auto md:rounded-none md:rounded-l-lg w-4/12" src="https://books.google.mk/books/content?id=XzrioQEACAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE73b8WsbZb79IMjTkNyGPJFL7C0BbENqpdgV1XsFV84dl05qqr6E7Lqi4tnKbF_0wqxkqGqtJms9MCrCN1U6zF0EqGdI8zYWVqQgY4mFXQ95xigrwkF1sjdf7sYfPUFa_lkzo__6" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal w-8/12">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Book title</h5>
                    <h6 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Author</h6>

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Book category</p>
                </div>
            </div>
            <div class="mb-6">
                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comments about the book:</p>
                <div id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></div>
            </div>

            <div class="mb-6">
                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your notes about the book:</p>
                <div id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></div>
            </div>

            <div href="#" class="p-6 flex items-left bg-white border rounded-lg shadow-md md:flex-col hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full mb-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Leave a comment:</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your comment here..."></textarea>
            </div>

            <div href="#" class="p-6 flex items-left bg-white border rounded-lg shadow-md md:flex-col hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full mb-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Make your notes:</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your note here..."></textarea>
            </div>
        </div>
    </div>

    </div>

    </div>