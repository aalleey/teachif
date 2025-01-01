<?php
session_start();
error_reporting(E_ERROR);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'teachify');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    $emai = $_POST['emai'];

    $sql = "INSERT INTO products (user_id, email, title, description, price, image_url) VALUES ('$user_id','$emai', '$title', '$description', '$price', '$image_url')";
    if ($conn->query($sql)) {
        header("Location: add-product.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
   
    <div style="border-radius: 10px;" class="container sm:mx-auto sm:w-[80%] mt-5 mb-5 border shadow-2xl ">
        <h2 class="text-center font-bold mb-4">Add Your Product</h2>
        <form class="w-11/12 mx-auto" method="POST">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="title" name="title" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price ($)</label>
                <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="price" name="price" required>
            </div>
            <div class="mb-4">
                <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL</label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="image_url" name="image_url" required>
                <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['email'] ?>">
            </div>
            <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Add Product</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <?php
    include 'footer.php';
    ?>
</body>
</html>
