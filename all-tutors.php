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

    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">All Tutors</h2>

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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold text-gray-800"> <?php echo $row['name']; ?> </h3>
                        <p class="text-gray-600 mt-2"><strong>Subjects:</strong> <?php echo $row['subject']; ?></p>
                        <p class="text-gray-600 mt-2"><strong>Experience:</strong> <?php echo $row['experience']; ?> years</p>
                        <p class="text-gray-600 mt-2"><strong>Description:</strong> <?php echo $row['description']; ?></p>
                        <a href="teacher-profile.php?id=<?php echo $row['id']; ?>" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">View Profile</a>
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
