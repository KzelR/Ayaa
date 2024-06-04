<?php
require_once('classes/database.php');
$con = new database();
// session_start();

if (empty($product_id = $_POST['id'])) {
     header('location:index.php');
    }else{
      
        $product_id = $_POST['id'];
        echo $product_id;
        $data = $con->viewProduct($product_id);
    }
    

    if(isset($_POST['update'])) {
        //user information 
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        $expiration = $_POST['expiration'];
       

        echo $product_id;

        if(1 == 1) {
            if ($con->updateProduct($name, $stock, $price,$expiration)) {
            // Update user address
            if ($con->updateCategory($type)) {
                // Both updates successful, redirect to a success page or display a success message
                header('location:product.php');
                exit();
                
            } else {
            //     // User address update failed
                $error = "Error occurred while updating user address. Please try again.";
             }
        } else {
            // User update failed
            $error = "Error occurred while updating user information. Please try again.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/product.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Update Product</h2>
       
       

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" value="<?php echo $data['stock']?>"  name="stock" >
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $data['price']?>" >
            </div>
            <div class="mb-3">
                <label for="expiration" class="form-label">Expiration Date</label>
                <input type="date" class="form-control" id="expiration" name="expiration" value="<?php echo $data['expiration']?>" >
            </div>
            
            <button type="submit" class="btn btn-primary" name="update">Update Product</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./bootstrap-5.3.3-dist
