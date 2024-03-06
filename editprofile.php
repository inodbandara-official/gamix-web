<?php
include 'config/dbconnect.php';

// Initialize variables to store form data
$newFullName = $newEmail = $newMobile = $newAddress = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $newFullName = mysqli_real_escape_string($conn, $_POST["fullName"]);
    $newEmail = mysqli_real_escape_string($conn, $_POST["email"]);
    $newMobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
    $newAddress = mysqli_real_escape_string($conn, $_POST["address"]);

    // Update user profile in the database
    $updateSql = "UPDATE user SET FirstName = '$newFullName', Email = '$newEmail', PhoneNumber = '$newMobile', Address = '$newAddress' WHERE UserID = 2";

    if ($conn->query($updateSql) === TRUE) {
        // Redirect back to the profile page after updating
        header("Location: buyerdashboardprofile.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

// Retrieve user's current profile information
$sql = "SELECT FirstName, LastName, Email, PhoneNumber, Address FROM user WHERE UserID = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fullName = $row["FirstName"] . " " . $row["LastName"];
    $email = $row["Email"];
    $mobile = $row["PhoneNumber"];
    $address = $row["Address"];
} else {
    echo "User not found!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
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

        input,
        textarea {
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
            background-color: #ffcd00;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" value="<?php echo $fullName; ?>" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile; ?>" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required><?php echo $address; ?></textarea>

            <button type="submit">Save Changes</button>
            <button type="button" onclick="window.location.href='buyerdashboardprofile.php'">Cancel</button>
        </form>
    </div>
</body>

</html>