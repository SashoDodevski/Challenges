<?php

include_once "./page_parts/clients/header.php";
if(isset($_SESSION['username'])){
    header('Location: index.php');
}
?>

    <!-- Register Form-->
    <section class="bg-amber-50/40 dark:bg-gray-900 pt-14 pb-4">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 text-cyan-900">
                    <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl dark:text-white">
                        Register your account
                    </h1>
                    <div class="mt-0">
                        <p href="#" class="text-sm text-red-500 h-1"><?php if (isset($_SESSION['msg'])) { 
                            echo $_SESSION['msg']; 
                        } 
                        unset($_SESSION['msg'])?>
                        </p>
                    </div>
                    <form class="space-y-4 md:space-y-6" action="./authentication/userRegistration.php" method="POST">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Name" required="" value="<?php if (isset($_SESSION['name'])) { 
                            echo $_SESSION['name']; 
                            } 
                            unset($_SESSION['name'])?>">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your surname</label>
                            <input type="text" name="surname" id="surname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Surname" required="" value="<?php if (isset($_SESSION['surname'])) { 
                            echo $_SESSION['surname']; 
                            } 
                            unset($_SESSION['surname'])?>">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="name@somemail.com" required="" value="<?php if (isset($_SESSION['email'])) { 
                            echo $_SESSION['email']; 
                            } 
                            unset($_SESSION['email'])?>">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" required="">
                        </div>
                        <button type="submit" class="w-full text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-900 dark:hover:bg-cyan-800 dark:focus:ring-cyan-800">Register</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="./signin.php" class="font-medium text-cyan-900 hover:underline dark:text-cyan-900">Sign in</a>
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