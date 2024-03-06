<?php
session_start();
include 'config/dbconnect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInputEmail = $_POST['email'];
    $userInputPassword = $_POST['password'];

    $tableName = "user";
    $baseRedirectLocation = 'web/index.php';
    $emailColumn = 'Email'; 
    $passwordColumn = 'Password';

    $stmt = $conn->prepare("SELECT * FROM $tableName WHERE $emailColumn = ?");
    $stmt->bind_param("s", $userInputEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($userInputPassword, $user[$passwordColumn])) {
        $_SESSION['email'] = $userInputEmail;
        $_SESSION['user_id'] = $user['UserID'];
        $redirectLocation = $baseRedirectLocation . '?userId=' . urlencode($user['UserID']);

        header("Location: $redirectLocation");
        exit();
    } else {
        header("Location: user_login.php?error=Invalid email or password.");
        exit();
    }
} else {
    header("Location: user_login.php");
    exit();
}
?>
