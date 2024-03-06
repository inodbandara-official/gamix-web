<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php
            if (isset($_GET['error'])) {
                echo '<p style="color: red;">' . $_GET['error'] . '</p>';
            }
            ?>
        <form action="seller_login_process.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="radiotext">
                <br>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account yet? <a href="./sellersignup.php">Sign up here</a></p>
    </div>
</body>
</html>
