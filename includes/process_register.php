<?php
session_start();
require '../config/db.php';

if(isset($_POST['register'])){
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    $role = 'user';

    if(empty($username) || empty($name) || empty($email) || empty($password)){
        die("All fields are required");
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    if($stmt->rowCount() > 0){
        die("Email or Username already registered. <a href='../public/auth/register.php'>Go back</a>");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, name, email, password, role) VALUES (?, ?, ?, ?, ?)");
    $result = $stmt->execute([$username, $name, $email, $hashedPassword, $role]);

    if($result){
        $_SESSION['success_message'] = "You account has been created successfully, you can login now";
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['user_name'] = $name;
        $_SESSION['user_role'] = $role;

        header("Location: ../public/auth/login.php");
        exit();
    } else {
        die("Registration failed. Please try again.");
    }
} else {
    header("Location: ../public/auth/register.php");
    exit();
}
?>
