<?php

include_once "./page_parts/header.php";

?>

<div class="mt-24">
    hello
</div>


<form>
    <div class="flex">

    </div>
    <div class="relative w-full">

        <div class="mb-6">
            <div id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-4 border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">${element.name + " " + element.surname} commented:</p>
                <p class="block mb-2 text-sm font-small text-gray-900 dark:text-white">${element.comment}</p>
                <a type="button" class="text-gray-500 hover:text-gray-700"><i class="fa-solid fa-pen-to-square fa-lg mr-3"></i></a>
                <a type="button" class="text-gray-500 hover:text-gray-700"><i class="fa-solid fa-trash-can fa-lg mr-3"></i></a>
            </div>
        </div>


    </div>
    </div>
</form>