<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>All Tutors - Teachify</title>
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
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

    <div class="container mx-auto py-8">
        <!-- <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">All Tutors</h2> -->

        <?php
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'teachify');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch all teachers
        $sql = "SELECT * FROM teachers";
        $result = $conn->query($sql);
        ?>

        <?php if ($result && $result->num_rows > 0): ?>
            <div class="flex flex-col  gap-6">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <!-- <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold text-gray-800"> <?php echo $row['name']; ?> </h3>
                        <p class="text-gray-600 mt-2"><strong>Subjects:</strong> <?php echo $row['subject']; ?></p>
                        <p class="text-gray-600 mt-2"><strong>Experience:</strong> <?php echo $row['experience']; ?> years</p>
                        <p class="text-gray-600 mt-2"><strong>Description:</strong> <?php echo $row['description']; ?></p>
                        <a href="teacher-profile.php?id=<?php echo $row['id']; ?>" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">View Profile</a>
                    </div> -->
                    <div style="width: 60%" class="  bg-white rounded-xl sm:shadow-lg shadow-2xl overflow-hidden  my-4 mx-6 ">
                        <div class="md:flex">
                            <div class="md:shrink-0">
                                <img class="h-48 w-full object-cover md:w-48" src=  alt="Tutor Picture">
                            </div>
                            <div class="p-4">
                                <div class="uppercase tracking-wide text-2xl text-indigo-500 font-semibold">
                                <?php echo $row['name']; ?> 
                                </div>
                                <p class="mt-2 text-gray-500">
                                <?php echo $row['description']; ?>
                                </p>
                                <div class="flex mt-4 items-center space-x-2">
                                    <span class="bg-gray-200 text-gray-800 text-xs px-3 py-1 rounded-full"><?php echo $row['subject']; ?> </span>
                                  
                                </div>
                                <div class="flex mt-4 text-sm text-gray-500 space-x-4">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2a9.9 9.9 0 00-7.071 2.929A9.9 9.9 0 002 12c0 2.647.98 5.13 2.929 7.071A9.9 9.9 0 0012 22c2.647 0 5.13-.98 7.071-2.929A9.9 9.9 0 0022 12c0-2.647-.98-5.13-2.929-7.071A9.9 9.9 0 0012 2zm0 18a7.933 7.933 0 01-5.657-2.343A7.933 7.933 0 014 12c0-2.121.828-4.145 2.343-5.657A7.933 7.933 0 0112 4c2.121 0 4.145.828 5.657 2.343A7.933 7.933 0 0120 12c0 2.121-.828 4.145-2.343 5.657A7.933 7.933 0 0112 20z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        <span class="ml-2 uppercase"><?php echo $row['location']; ?> </span>
                                    </div>
                                    <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2a9.9 9.9 0 00-7.071 2.929A9.9 9.9 0 002 12c0 2.647.98 5.13 2.929 7.071A9.9 9.9 0 0012 22c2.647 0 5.13-.98 7.071-2.929A9.9 9.9 0 0022 12c0-2.647-.98-5.13-2.929-7.071A9.9 9.9 0 0012 2zm0 18a7.933 7.933 0 01-5.657-2.343A7.933 7.933 0 014 12c0-2.121.828-4.145 2.343-5.657A7.933 7.933 0 0112 4c2.121 0 4.145.828 5.657 2.343A7.933 7.933 0 0120 12c0 2.121-.828 4.145-2.343 5.657A7.933 7.933 0 0112 20z"></path>
                                        </svg>
                                       
                                        <span class="ml-2">Rs <?php echo $row['price']; ?> /Hr </span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2a9.9 9.9 0 00-7.071 2.929A9.9 9.9 0 002 12c0 2.647.98 5.13 2.929 7.071A9.9 9.9 0 0012 22c2.647 0 5.13-.98 7.071-2.929A9.9 9.9 0 0022 12c0-2.647-.98-5.13-2.929-7.071A9.9 9.9 0 0012 2zm0 18a7.933 7.933 0 01-5.657-2.343A7.933 7.933 0 014 12c0-2.121.828-4.145 2.343-5.657A7.933 7.933 0 0112 4c2.121 0 4.145.828 5.657 2.343A7.933 7.933 0 0120 12c0 2.121-.828 4.145-2.343 5.657A7.933 7.933 0 0112 20z"></path>
                                        </svg>
                                        <span class="ml-2"><?php echo $row['experience']; ?> Years </span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>


                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600">No tutors found.</p>
        <?php endif; ?>


    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>

</html>