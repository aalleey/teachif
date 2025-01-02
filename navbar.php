<?php
session_start();
error_reporting(E_ERROR);
$isLoggedIn = isset($_SESSION['user_id']); // Set after user logs in
//$userEmail = $isLoggedIn ? $_SESSION['user_email'] : null;
$first = isset($_SESSION['first_name']);
if(isset($_POST['login'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>



    <nav class="bg-white shadow-md dark:bg-black">
        <div class="container mx-auto flex justify-between items-center p-4">
            <!-- Logo and Brand -->
            <a href="home.php" class="flex items-center space-x-2">
                <img src="assets/logo.png" alt="Teachify Logo" class="h-8">
                <span class="text-lg font-semibold">Teachify</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button id="menu-toggle" class="md:hidden text-gray-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Navigation Items -->
            <div id="menu" class="hidden md:flex space-x-6">
                <a href="index.php" class="text-gray-700 hover:text-blue-500">Home</a>
                <a href="all-tutors.php" class="text-gray-700 hover:text-blue-500">All Tutors</a>
                <a href="tutor_request.php" class="text-gray-700 hover:text-blue-500">Tutor Requests</a>
                <a href="store.php" class="text-gray-700 hover:text-blue-500">Store</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="request_tutor.php" class="text-gray-700 hover:text-blue-500">Request a Tutor</a>
                <?php else: ?>
                    <a href="/contact" class="text-gray-700 hover:text-blue-500">Contact</a>
                <?php endif; ?>
            </div>

            <!-- Conditional Login/SignUp or Profile -->
            <div class="flex items-center space-x-4">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="relative">
                        <button id="profile-toggle" class="text-gray-700 hover:text-blue-500 focus:outline-none">
                            <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['email']); ?>
                        </button>
                        <div id="profile-menu" class="hidden absolute right-0 mt-2 bg-white shadow-lg rounded-md py-2 w-48">
                            <a href="teacher-profile.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                    
                <?php else: ?>
                    <div class="relative">
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Login/SignUp
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white shadow-md">
            <a href="index.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Home</a>
            <a href="all-tutors.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">All Tutors</a>
            <a href="tutor_request.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Tutor Requests</a>
            <a href="store.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Store</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="request_tutor.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Request a Tutor</a>
            <?php else: ?>
                <a href="/contact" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Contact</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
Toggle modal
</button> -->

    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <img src="assets/logo.svg" class="h-[130px] mx-auto"  alt="">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                    <button name="login" id="login" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        <a href="login.php">Login</a>
                    </button>
                    <button   data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><a href="signup.php">SignUp</a></button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Toggle Menu Visibility
        document.getElementById('menu-toggle').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Toggle Profile Menu
        document.getElementById('profile-toggle')?.addEventListener('click', () => {
            document.getElementById('profile-menu').classList.toggle('hidden');
        });

        // Toggle Login Menu
        document.getElementById('login-toggle')?.addEventListener('click', () => {
            document.getElementById('login-menu').classList.toggle('hidden');
        });
    </script>

<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>