<?php
session_start();


error_reporting(E_ERROR);

// Mock login check (replace with your login logic)
$isLoggedIn = isset($_SESSION['user_id']); // Set after user logs in
//$userEmail = $isLoggedIn ? $_SESSION['user_email'] : null;
$first = isset($_SESSION['first_name']);


// Database connection
$conn = new mysqli('localhost', 'root', '', 'teachify');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all products
$sql = "SELECT * FROM products ORDER BY created_at DESC";
$result = $conn->query($sql);
$name = "SELECT * FROM user";
$res = $conn->query($name);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachify|Store</title>
    <link rel="stylesheet" href="styles/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <?php 
    if (!$isLoggedIn) {
        echo '<div class="alert alert-warning text-center mt-2">
            Please <a href="login.php">log in</a> to sell your products.
        </div>';
    }
    ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Teaching and Learning Resources</h2>

        <!-- Filters -->
        <form class="mb-4  row">
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Subject" name="subject">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Grade/Level" name="level">
            </div>
            <!-- <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Type" name="type">
            </div> -->
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Search</button>
                <?php   
                    if ($isLoggedIn) {
                        echo '<div class="text-end">
                    <a href="add-product.php" class="btn btn-success w-100 mt-3">Add Your Product</a>
                </div>';
                    }
                ?>
            </div>
            <!-- <div class="col">
                <!-- Add Product Button -->
                <?php if ($isLoggedIn): ?>
                
                <?php else: ?>
                <!-- <div class="alert alert-warning text-center">
                    Please <a href="login.php">log in</a> to sell your products.
                </div> -->
                <?php endif; ?>
            <!-- </div> --> -->
        </form>

        <!-- Products -->

        <!-- <div class="alert alert-danger" role="alert">
            Please <a href="login.php">log in</a> to sell your products.
          </div> -->
        <div class="row  ">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
            <div class="col-4 mobcard ">
                <div class="card mb-4">
                    <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </h5>
                        <p class="card-text">
                            <?php echo htmlspecialchars($row['description']); ?>
                        </p>
                        <p><strong>Price:</strong> Rs 
                            <?php echo htmlspecialchars($row['price']); ?>
                        </p>
                        <p><strong>Upload By :</strong>        
                             <?php
                             
                                 echo htmlspecialchars($row['email']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>
        </div>


    </div>

    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>