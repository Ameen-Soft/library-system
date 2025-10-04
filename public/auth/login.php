<?php
session_start();
if(isset($_SESSION['success_message'])){
    echo '<div class="alert alert-success text-center" role="alert">'
         . $_SESSION['success_message'] .
         '</div>';
    unset($_SESSION['success_message']); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Login</h3>

                <form action="../../includes/process_login.php" method="POST">
                    <!-- email or username-->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email / Username</label>
                        <input type="text" name="email-username" id="email-username" class="form-control" placeholder="Enter your email or username"
                            required>
                    </div>

                    <!-- password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter your password" required>
                    </div>

                    <!-- login button -->
                    <div class="d-grid">
                        <button type="submit" name="login" class="btn btn-success btn-lg">Login</button>
                    </div>

                    <!-- register link -->
                    <p class="text-center mt-3 mb-0">
                        Not registered? <a href="register.php">Create an account</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>