<?php
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
$email_check_query = $conn->prepare("SELECT * FROM user WHERE Email = ? LIMIT 1");
$email_check_query->bind_param("s", $email);
$email_check_query->execute();
$result = $email_check_query->get_result();
$user = $result->fetch_assoc();

if ($user) {
    // If email exists, redirect back to sign-up page with an error message
    header("Location: usersignup.php?error=Email already exists.");
    exit();
}

// Corrected variable name for consistency
$userId = $_POST["user_id"];
$user_firstname = $_POST["userfirstname"];
$user_lastname = $_POST["userlastname"];
$contact_no = $_POST["contact_no"];
$address = $_POST["address"];
$userpassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
$reg_date = $_POST["date"];
$role = 0; //  0 represents a regular user

// Insert data using a prepared statement
$sql = $conn->prepare("INSERT INTO user (UserID, FirstName, LastName, Email, PhoneNumber, Address, Password, IsAdmin, RegisterDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param("sssssssis", $userId, $user_firstname, $user_lastname, $email, $contact_no, $address, $userpassword, $role, $reg_date);

if ($sql->execute()) {
    // Redirect to user page
    header("Location: web/index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
