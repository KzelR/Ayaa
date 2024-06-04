<?php
require_once('classes/database.php');
$con = new database();
 
// session_start();


// if (empty($_SESSION['admin_id'])){
//   header('location:product.php');                                                                                                                                                 
//  }

 if(isset($_POST['product'])){
    $product_id = $_POST['id'];
    if($con->deletePro($product_id)){
        header('location:product.php');
    } else {
        echo 'Something went wrong';
    }

}


?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- For Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="./css/product.css">
</head>

<body>

<?php include('user_navbar.php');?>
<?php include('sidebar.php');?>
<div class="container">
        <h1>Inventory Management</h1>
<div class="container user-info rounded shadow p-3 my-2">
    <h2 class="text-center mb-2">Product Table</h2>
    <div class="table-responsive text-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Expiration Date</th>
                    <th>Actions</th> <!-- Actions column header -->
                </tr>
            </thead>
            <tbody>
            <?php
                $counter = 1;
                $data = $con->getProductData();
                foreach($data as $row) {
                ?>
                <tr>
                    <td><?php echo $counter++;?></td>
                    <td>
                        <?php if (!empty($row['picture'])): ?>
                        <img src="<?php echo htmlspecialchars($row['picture']); ?>" alt="productPicture" style="width: 50px; height: 50px; border-radius: 50%;">
                        <?php else: ?>
                        <img src="path/to/default/profile/pic.jpg" alt="Default productPicture" style="width: 50px; height: 50px; border-radius: 50%;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['type'];?></td>
                    <td><?php echo $row['stock'];?></td>
                    <td><?php echo $row['price'];?></td>
                    <td><?php echo $row['expiration_date']; ?>
                  </td>
                    <td>
                        <!-- Edit button -->
                        <form action="updateproduct.php" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
                            <button type="submit"  name="edit" class="btn btn-primary btn-sm">Edit</button>
                        </form>
                        <!-- Delete button -->
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
                            <input type="submit"  name="product" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- Button for adding product -->
    <div class="text-center mt-3">
        <a href="addproduct.php" class="btn btn-primary">Add Product</a>
    </div>
</div>


 
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<!-- Bootsrap JS na nagpapagana ng danger alert natin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 
</body>
</html>