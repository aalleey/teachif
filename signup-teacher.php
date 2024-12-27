<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'teachify');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $experience = $_POST['experience'];

    // Insert data into the database
    $sql = "INSERT INTO teachers (name, email, subject, description, location, price, experience) 
            VALUES ('$name', '$email', '$subject', '$description', '$location', '$price', '$experience')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Teacher added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .signt-form {
            width: 40vw !important;
        }
    </style>
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
   
<div class="container signt-form mt-5 mb-5  border border-black border-1">
    <h2>Teacher Signup</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject/Skill</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="price">Hourly Rate</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="experience">Experience (in years)</label>
            <input type="number" class="form-control" id="experience" name="experience" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    
</div>

<?php
    include 'footer.php';
    ?>
</body>
</html>
