<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div class="welcome-box">
        <?php if(isset($_SESSION['user_name'])): ?>
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
            <p>Your role: <?php echo htmlspecialchars($_SESSION['user_role']); ?></p>
            <?php if($_SESSION['user_role'] === 'admin'){ ?>
                <p><a href="admin/dashboard.php">go to Dashboard</a></p>
                <?php }else?>
                    <p><a href="auth/logout.php">logout</a></p>
                <?php exit(); ?>
        <?php else: ?>
            <h1>Welcome to our PHP Auth System!</h1>
            <p><a href="auth/login.php">Login</a> or <a href="auth/register.php">Register</a></p>
        <?php endif; ?>
    </div>
</body>
</html>