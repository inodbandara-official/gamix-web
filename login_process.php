<?php
session_start();

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

// Assuming you have retrieved the user input from the login form
$userInputEmail = $_POST['email'];
$userInputPassword = $_POST['password'];

// Retrieve user from the database based on the provided email
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $userInputEmail);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Check if the user exists and verify the password
if ($user && password_verify($userInputPassword, $user['password'])) {
    // Password is correct; proceed with login
    $_SESSION['email'] = $userInputEmail;
    
    $role = $user['isAdmin'];
    // Check user's role
    if ($role === "1") {
        // Redirect admin to admin page
        header("Location: sellerdashboard.php");
        exit();
    } else {
        // Redirect regular user to user page
        header("Location: index.php");
        exit();
    }
} else {
    // Invalid email or password; redirect back to login page with error message
    header("Location: login.php?error=Invalid email or password.");
    exit();
}

$stmt->close();
$conn->close();
?>
