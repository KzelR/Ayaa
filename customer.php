



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="customer.css">
   
</head>
<body>
  <div class="container">
    <h2>Customer Information</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="contact">Contact Number:</label>
        <input type="number" id="contact" name="contact" required>

        <label for="profilepic">Profile Picture:</label>
        <input type="file" id="profilepic" name="profilepic" accept="image/*" required>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
