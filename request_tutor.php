<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'teachify');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $email = $conn->real_escape_string($_POST['email']);
    $name = $conn->real_escape_string($_POST['name']);
    $location = $conn->real_escape_string($_POST['location']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $details = $conn->real_escape_string($_POST['details']);

    // Insert data into database
    $sql = "INSERT INTO tutor_requests (email, name, location, phone, details) 
            VALUES ('$email', '$name', '$location', '$phone', '$details')";

    if ($conn->query($sql) === TRUE) {
        echo `
<div class="modal-dialog modal-fullscreen-sm-down">
  ...
</div>`;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // $conn->close();
}
?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Tutor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Request a Tutor</h2>
        <form action="request_tutor.php" method="POST" class="p-4 border rounded shadow-sm">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                    required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your full name" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="City, Country"
                    required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+92 XXX XXXXXXX" required>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Details of your requirement</label>
                <textarea class="form-control" id="details" name="details" rows="5"
                    placeholder="Example: I am looking for a tutor who specializes in..." required></textarea>
            </div>
            <div class="alert alert-warning">
                Please don't share any contact details (phone, email, website, etc.) here.
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">Continue</button>
            </div>
        </form>
  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>