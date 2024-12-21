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
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

// Check if email exists
$stmt = $conn->prepare("SELECT id, password FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// If user exists, verify password
if ($stmt->num_rows > 0) {
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        // Start session
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;

        // Redirect to dashboard
        header("Location: index.php");
        exit;
    } else {
        echo "Incorrect password!";
    }
} else {
    echo "No account found with this email.";
}

// Close connections
$stmt->close();
$conn->close();
?>
