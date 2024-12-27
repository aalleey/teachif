<!-- all-tutors.php -->
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

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">

    <title>Teachify</title>
    <link href="/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
<script src="/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <title>All Tutors</title>
    <style>
     .cad {
        width: 50%;
     }
    </style>
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    <h2 style="text-align: center;">All Tutors</h2>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="tutor-card cad">
                <h3><?php echo $row['name']; ?></h3>
                <p>Subjects: <?php echo $row['subject']; ?></p>
                <p>Experience: <?php echo $row['experience']; ?></p>
                <p>Subjects: <?php echo $row['description']; ?></p>
                <a href="teacher-profile.php?id=<?php echo $row['id']; ?>">View Profile</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No tutors found.</p>
    <?php endif; ?>

    <?php
    include 'footer.php';
    ?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
