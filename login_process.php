<?php
session_start();
include 'config/dbconnect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInputEmail = $_POST['email'];
    $userInputPassword = $_POST['password'];
    $userRole = $_POST['role']; 


    if ($userRole == "1") {
        $tableName = "seller";
        $redirectLocation = 'sellerdashboard.php';
        $emailColumn = 'SellerEmail'; 
        $passwordColumn = 'password'; 
    } else {
        $tableName = "user";
        $redirectLocation = 'web/index.php';
        $emailColumn = 'Email'; 
        $passwordColumn = 'Password';
    }

    $stmt = $conn->prepare("SELECT * FROM $tableName WHERE $emailColumn = ?");
    $stmt->bind_param("s", $userInputEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($userInputPassword, $user[$passwordColumn])) {
        $_SESSION['email'] = $userInputEmail;
        $_SESSION['user_id'] = $user['UserID'] ?? $user['SellerID'];
        header("Location: $redirectLocation");
        exit();
    } else {
        header("Location: login.php?error=Invalid email or password.");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
