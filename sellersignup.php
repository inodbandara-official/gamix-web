<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <style>
       .radiotext{
    text-align: left;
    color: #767070;
    font-size: 15px;
 }
 </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <?php
        // Check if an error message exists in the URL parameters
        if (isset($_GET['error'])) {
            // Display the error message in red
            echo '<p style="color: red;">' . $_GET['error'] . '</p>';
        }
        ?>
        <form action="sellersignup_process.php" method="POST">
            <input type="text" name="seller_id" placeholder="ID" required><br>
            <input type="text" name="shop_name" placeholder="Shop Name" required><br>
            <input type="text" name="shop_address" placeholder="Shop Address" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="tel" name="contact_no" placeholder="Contact Number" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <br>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="./seller_login.php">Login here</a></p>
    </div>
</body>
</html>
