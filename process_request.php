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

    $conn->close();
}
?>
