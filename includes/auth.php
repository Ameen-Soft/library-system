<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../public/auth/login.php");
    exit();
}

if($_SESSION['user_role'] !== 'admin'){
    header("Location: ../../public/index.php");
    exit();
}   
?>