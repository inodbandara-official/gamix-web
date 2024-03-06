<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database = "gamix";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST["email"];
$email_check_query = $conn->prepare("SELECT * FROM seller WHERE SellerEmail = ? LIMIT 1");
$email_check_query->bind_param("s", $email);
$email_check_query->execute();
$result = $email_check_query->get_result();
$user = $result->fetch_assoc();

if ($user) {
  
    header("Location: sellersignup.php?error=Email already exists.");
    exit();
}


$seller_Id = $_POST["seller_id"];
$shop_name = $_POST["shop_name"];
$shop_address = $_POST["shop_address"];
$contact_no = $_POST["contact_no"];
$seller_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$role = 1; 

$sql = $conn->prepare("INSERT INTO seller (SellerID, ShopName, SellerEmail, PhoneNumber, ShopAddress, Password) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssss", $seller_Id, $shop_name, $email, $contact_no, $shop_address, $seller_password);

if ($sql->execute()) {
 
    header("Location: seller_login.php);
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
