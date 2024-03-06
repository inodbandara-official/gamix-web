<?php
// Enable error reporting for debugging (remove or turn off in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database = "gamix";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL query to check if email already exists using prepared statement
$email = $_POST["email"];
$email_check_query = $conn->prepare("SELECT * FROM seller WHERE Email = ? LIMIT 1");
$email_check_query->bind_param("s", $email);
$email_check_query->execute();
$result = $email_check_query->get_result();
$user = $result->fetch_assoc();

if ($user) {
    // If email exists, redirect back to sign-up page with an error message
    header("Location: sellersignup.php?error=Email already exists.");
    exit();
}

// Corrected variable name for consistency
$seller_Id = $_POST["seller_id"];
$shop_name = $_POST["shop_name"];
$shop_address = $_POST["shop_address"];
$contact_no = $_POST["contact_no"];
$seller_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$role = 1; // Assuming 0 represents a regular user

// Insert data using a prepared statement
$sql = $conn->prepare("INSERT INTO seller (SellerID, ShopName, SellerEmail, PhoneNumber, ShopAddress, Password) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("sssssssis", $seller_Id, $shop_name, $email, $contact_no, $shop_address, $seller_password);

if ($sql->execute()) {
    // Redirect to user page
    header("Location: sellerdashboard.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
