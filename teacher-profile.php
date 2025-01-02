<?php
session_start();
error_reporting(E_ERROR);

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Retrieve user data from the session
$user_id = $_SESSION['user_id'];

include 'db_connection.php';

// Fetch user details
$query = "SELECT * FROM user WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white">
    <div class="container mx-auto py-12 px-4">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <!-- Title -->
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Automation Job Support assignment help teacher needed in Pune
                </h1>

                <!-- Contact Button -->
                <div class="mt-4">
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-600">
                        Contact Harshada A.
                    </button>
                </div>

                <!-- Tags -->
                <div class="mt-4">
                    <span class="inline-block bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full text-sm font-medium">
                        Automation Job Support
                    </span>
                </div>

                <!-- Details Grid -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Location and Date -->
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657A8 8 0 118.343 7.343a8 8 0 019.314 9.314z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Pune, Maharashtra, India</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v6a4 4 0 008 0V7"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19v2"></path>
                        </svg>
                        <span>Due Date: 04-01-2025</span>
                    </div>

                    <!-- Posted By -->
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A2 2 0 007 20h10a2 2 0 001.879-2.196"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.95 3.536a8 8 0 00-9.9 0"></path>
                        </svg>
                        <span>Posted by: Harshada A. (Student)</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11m4-2H5a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2h-4m-4-4v4"></path>
                        </svg>
                        <span>Phone: Unavailable</span>
                    </div>

                    <!-- Other Details -->
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5a7 7 0 00-12 5v7a3 3 0 003 3h2a2 2 0 100-4H6"></path>
                        </svg>
                        <span>Available for home tutoring</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0l-2 2m2-2h3"></path>
                        </svg>
                        <span>Can communicate in: English, Hindi</span>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <h3 class="text-xl font-semibold">Description</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        I want real-time work support as I am selected as a Specialist Quality Engineer at one of the MNC companies, so I am looking for proper support.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
