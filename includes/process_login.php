<?php
session_start();
require '../config/db.php';

if(isset($_POST['login'])){
    $email = trim($_POST['email-username']);
    $username = trim($_POST['email-username']);
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        die("Both fields are required.");
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    $user = $stmt->fetch();

    if($user){
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            if($user['role'] === 'admin'){
                header("Location: ../public/admin/dashboard.php");
            } else {
                header("Location: ../public/index.php");
            }
            exit();
        } else {
            die("Incorrect password. <a href='../public/auth/login.php'>Go back</a>");
        }
    } else {
        die("You are not registered. <a href='../public/auth/register.php'>Register here</a>");
    }
} else {
    header("Location: ../public/auth/login.php");
    exit();
}
?>
