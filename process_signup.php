<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL root password
$dbname = "teachify"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$age = intval($_POST['age']);
$phone = htmlspecialchars($_POST['phone']);
$location = htmlspecialchars($_POST['location']);
$experience = htmlspecialchars($_POST['experience']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validate passwords
if ($password !== $confirm_password) {
    die("Passwords do not match!");
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Insert data into the database
$stmt = $conn->prepare("INSERT INTO user (first_name, last_name, age, phone, location, experience, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisssss", $first_name, $last_name, $age, $phone, $location, $experience, $email, $hashed_password);

if ($stmt->execute()) {
    // echo "Signup successful! Welcome to Teachify.";
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>