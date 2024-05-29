<?php
require_once('classes/database.php');
$con = new database();

 session_start();

if(isset($_POST['category'])){
    $type = $_POST['type'];

    
                $category_id = $con->addCategory($type);

                if ($category_id) {
                    // Signup successful, redirect to login page
                    header('location: category.php');
                    exit; // Stop further execution
                } else {
                    // Signup failed, display error message
                    echo "Sorry, there was an error signing up.";
                
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="product.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Add Category Product</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category</label>
                <input type="text" class="form-control" id="categoryName" name="type" required>
            </div>
            <button type="submit" name="category"class="btn btn-primary">Add Category Product</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
