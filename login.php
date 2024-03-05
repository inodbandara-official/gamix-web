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
        <form action="login_process.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="radiotext">
                <br>
                <label for="role">Select Role</label><br><br>
                    <input type="radio" name="role" value="0" checked>User
                    <input type="radio" name="role" value="1">Seller<br>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account yet? <a href="signup.php">Sign up here</a></p>
    </div>
</body>
</html>
