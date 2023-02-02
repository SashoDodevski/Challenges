<?php

include_once "./page_parts/clients/header.php";

?>

<!-- SignIn Form-->
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 pt-24 pb-14 mx-auto my-20">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8 text-cyan-900">
                <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-white">
                    Sign in to your account
                </h1>
                <div class="my-2">
                    <p href="#" class="text-sm text-red-500 h-1"><?php if (isset($_SESSION['msg'])) { 
                        echo $_SESSION['msg']; 
                    } 
                    unset($_SESSION['status']);
                    unset($_SESSION['msg'])?>
                    </p>
                </div>
                <form class="space-y-4 md:space-y-6" action="./authentication/authentication.php" method="POST">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="name@somemail.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" required="">
                    </div>

                    <div>
                        <a href="#" class="text-sm font-medium text-cyan-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800">Sign in</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account yet? <a href="./register.php" class="font-medium xt-blue-900 hover:underline dark:xt-blue-900">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php

include_once "./page_parts/clients/footer.php";

?>