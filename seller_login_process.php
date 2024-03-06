<?php
session_start();
include 'config/dbconnect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInputEmail = $_POST['email'];
    $userInputPassword = $_POST['password'];
    

    $tableName = "seller";
    $emailColumn = 'SellerEmail'; 
    $passwordColumn = 'password'; 
    $stmt = $conn->prepare("SELECT * FROM $tableName WHERE $emailColumn = ?");
    $stmt->bind_param("s", $userInputEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($userInputPassword, $user[$passwordColumn])) {

        $seller_Id = $user['SellerID']; 

        $redirectLocation = 'sellerdashboard.php?sellerId=' . urlencode($seller_Id);

        header("Location: $redirectLocation");
        exit();
    } else {

        header("Location: seller_login.php?error=Invalid email or password.");
        exit();
    }
} else {
    header("Location: seller_login.php");
    exit();
}
?>
