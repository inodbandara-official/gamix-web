<?php
include 'config/dbconnect.php';

// Initialize variables to store form data and error messages
$currentPassword = $newPassword = $confirmPassword = "";
$currentPasswordErr = $newPasswordErr = $confirmPasswordErr = $changePasswordSuccess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $currentPassword = mysqli_real_escape_string($conn, $_POST["currentPassword"]);
    $newPassword = mysqli_real_escape_string($conn, $_POST["newPassword"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

    // Validate current password
    // Add your own logic for password validation
    if (empty($currentPassword)) {
        $currentPasswordErr = "Current password is required";
    }

    // Validate new password
    // Add your own logic for password validation
    if (empty($newPassword)) {
        $newPasswordErr = "New password is required";
    }

    // Validate confirm password
    if (empty($confirmPassword)) {
        $confirmPasswordErr = "Please confirm the new password";
    } elseif ($newPassword != $confirmPassword) {
        $confirmPasswordErr = "Passwords do not match";
    }

    // If there are no validation errors, proceed to update the password
    if (empty($currentPasswordErr) && empty($newPasswordErr) && empty($confirmPasswordErr)) {
        // Check if the current password matches the one in the database
        // Add your own logic for checking the current password
        $userId = 2; // Assuming the user ID is 2 for demonstration purposes

        $checkPasswordSql = "SELECT Password FROM user WHERE UserId = $userId";
        $result = $conn->query($checkPasswordSql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row["Password"];

            // Verify the current password
            if (password_verify($currentPassword, $storedPassword)) {
                // Update the password in the database
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updatePasswordSql = "UPDATE user SET Password = '$hashedNewPassword' WHERE UserId = $userId";

                if ($conn->query($updatePasswordSql) === TRUE) {
                    $changePasswordSuccess = "Password changed successfully!";
                } else {
                    echo "Error updating password: " . $conn->error;
                }
            } else {
                $currentPasswordErr = "Incorrect current password";
            }
        } else {
            echo "User not found!";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (Existing head content) ... -->
    <style>
        /* Add the CSS style here (the same style as provided earlier) */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #666;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #b38a00;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color:  #ffcd00;
        }

        .error-message {
            color: #dc3545;
            margin-top: 8px;
        }

        .success-message {
            color: #28a745;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Change Password</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="currentPassword">Current Password:</label>
            <input type="password" id="currentPassword" name="currentPassword" required>
            <span class="error-message"><?php echo $currentPasswordErr; ?></span>

            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required>
            <span class="error-message"><?php echo $newPasswordErr; ?></span>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <span class="error-message"><?php echo $confirmPasswordErr; ?></span>

            <button type="submit">Change Password</button>
            <button type="button" onclick="window.location.href='buyerdashboardprofile.php'">Cancel</button>
        </form>
        <span class="success-message"><?php echo $changePasswordSuccess; ?></span>
    </div>
