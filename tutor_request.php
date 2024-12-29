<?php
// Fetch tutor requests from the database
$conn = new mysqli('localhost', 'root', '', 'teachify');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, location, phone, details, email FROM tutor_requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutors from All Countries</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container mt-5">
        <div class="max-w-6xl mx-auto p-6">
            <!-- Header -->
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
                Tutors from all countries
            </h1>

            <!-- Search Container -->
            <div class="bg-white rounded-lg shadow-lg p-4 mb-6">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Subject/Skill Input -->
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input
                            type="text"
                            placeholder="Subject / Skill"
                            class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all">
                    </div>

                    <!-- Location Input -->
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <input
                            type="text"
                            placeholder="Location"
                            class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all">
                    </div>

                    <!-- Search Button -->
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-search"></i>
                        <span>Search</span>
                    </button>
                </div>
            </div>

            <!-- Filter Options -->
            <div class="flex flex-wrap items-center gap-4 px-2">
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium">All</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium">Online</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium">Home</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium">Assignment</a>

                <!-- Level Dropdown -->
                <div class="relative ml-auto">
                    <button class="flex items-center gap-2 text-gray-600 hover:text-blue-600 font-medium">
                        <i class="fas fa-sliders-h"></i>
                        <span>Level</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($row['location']); ?></h6>
                                <p class="card-text"><?php echo htmlspecialchars($row['details']); ?></p>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="bi bi-envelope"></i> <?php echo htmlspecialchars($row['email']); ?></li>
                                    <li class="list-inline-item"><i class="bi bi-phone"></i> <?php echo htmlspecialchars($row['phone']); ?></li>
                                </ul>
                                <a href="#" class="btn btn-sm btn-outline-primary">Contact</a>
                            </div>
                        </div> -->


                        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-end px-4 pt-4">
                                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                    <span class="sr-only">Open dropdown</span>
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2" aria-labelledby="dropdownButton">
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex flex-col items-center pb-10">
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image" />
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?php echo htmlspecialchars($row['name']); ?></h5>
                                <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($row['details']); ?></span>
                                <div class="flex mt-4 md:mt-6">
                                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add friend</a>
                                    <a href="#" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Message</a>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo "<p>No tutor requests found.</p>";
                }
                ?>
            </div>

            <!-- Sidebar -->
            
        </div>
    </div>
    </div>
    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>