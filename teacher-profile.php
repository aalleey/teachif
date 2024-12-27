<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'teachify');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the ID to avoid SQL injection
    $sql = "SELECT * FROM teachers WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $teacher = $result->fetch_assoc(); // Fetch teacher details
    } else {
        die("Teacher not found.");
    }
} else {
    die("Invalid teacher ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $teacher['name']; ?> - Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mt-5">
    <h2><?php echo $teacher['name']; ?></h2>
    <p><strong>Subject:</strong> <?php echo $teacher['subject']; ?></p>
    <p><?php echo $teacher['description']; ?></p>

    <h4>Details</h4>
    <ul>
        <li><strong>Location:</strong> <?php echo $teacher['location']; ?></li>
        <li><strong>Hourly Rate:</strong> $<?php echo $teacher['price']; ?>/hour</li>
        <li><strong>Experience:</strong> <?php echo $teacher['experience']; ?> years</li>
    </ul>

    <button class="btn btn-primary" onclick="startChat()">Chat with <?php echo $teacher['name']; ?></button>
</div>

<script>
function startChat() {
    alert("Chat functionality will be implemented here!");
}
</script>
</body>
</html>
