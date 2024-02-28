<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "swiss_collection.sql";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query to check if email already exists
$email = $_POST["email"];
$email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = $conn->query($email_check_query);
$user = $result->fetch_assoc();

if ($user) {
    // If email exists, redirect back to sign-up page with an error message
    header("Location: signup.html?error=Email already exists.");
    exit();
}

// Prepare SQL query to insert user data into the database
$user_firstname = $_POST["userfirstname"];
$user_lastname = $_POST["userlastname"];
$contact_no = $_POST["contact_no"];
$address = $_POST["address"];
$userpassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
$role = $_POST["role"];

$sql = "INSERT INTO users (first_name, last_name, email, contact_no, user_address, password, isAdmin) VALUES ('$user_firstname', '$user_lastname', '$email', '$contact_no', '$address', '$userpassword', '$role')";

if ($conn->query($sql) === TRUE) {
    if ($role === '1') {
        // Redirect admin to admin page
        header("Location: sellerdashboard.php");
        exit();
    } else {
        // Redirect regular user to user page
        header("Location: index.php");
        exit();
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
