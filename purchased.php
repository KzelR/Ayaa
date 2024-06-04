


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/purchased.css">
    <title>Inventory Management</title>
   
</head>
<body>
    <header>
        <h1>Purchased Table</h1>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Product Name</th>
                <th>Product Quantity</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample data for demonstration purposes -->
            <tr>
                <td>1</td>
                <td>101</td>
                <td class="quantity-buttons">
                    <button onclick="decrementQuantity(this)">-</button>
                    <span>201</span>
                    <button onclick="incrementQuantity(this)">+</button>
                </td>
                <td>5</td>
            </tr>
            <tr>
                <td>2</td>
                <td>102</td>
                <td class="quantity-buttons">
                    <button onclick="decrementQuantity(this)">-</button>
                    <span>202</span>
                    <button onclick="incrementQuantity(this)">+</button>
                </td>
                <td>3</td>
            </tr>
            <tr>
                <td>3</td>
                <td>103</td>
                <td class="quantity-buttons">
                    <button onclick="decrementQuantity(this)">-</button>
                    <span>203</span>
                    <button onclick="incrementQuantity(this)">+</button>
                </td>
                <td>2</td>
            </tr>
        </tbody>
    </table>
    <footer>
        <p>&copy; 2024 Inventory Management System. All Rights Reserved.</p>
    </footer>

    <script>
        function incrementQuantity(button) {
            var span = button.parentNode.querySelector("span");
            var quantity = parseInt(span.innerText);
            span.innerText = quantity + 1;
        }

        function decrementQuantity(button) {
            var span = button.parentNode.querySelector("span");
            var quantity = parseInt(span.innerText);
            if (quantity > 0) {
                span.innerText = quantity - 1;
            }
        }
    </script>
</body>
</html>
