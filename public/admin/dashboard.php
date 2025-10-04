<?php
require '../../includes/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
</head>
<body>
    <div class="dashboard-box">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        <p>This is Dashboard page for <strong><?php echo htmlspecialchars($_SESSION['user_role']); ?></strong></p>
        <a href="../index.php">Go to Home</a>
    </div>
</body>
</html>
