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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tutors from All Countries</h2>
        
        <!-- Search Form -->
        <form class="mb-4 d-flex justify-content-center align-items-center">
            <input type="text" class="form-control me-2" placeholder="Subject / Skill" style="max-width: 300px;">
            <input type="text" class="form-control me-2" placeholder="Location" style="max-width: 300px;">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div class="row">
            <div class="col-md-8">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="card mb-4">
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
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No tutor requests found.</p>";
                }
                ?>
            </div>

            <!-- Sidebar -->
            <!-- <div class="col-md-4">
                <h4>Locations</h4>
                <ul class="list-unstyled">
                    <li><a href="#">Online</a></li>
                    <li><a href="#">Afghanistan</a></li>
                    <li><a href="#">Albania</a></li>
                    <li><a href="#">Algeria</a></li>
                    <li><a href="#">Angola</a></li>
                    <!-- Add more locations -->
                </ul>
            </div> -->
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
