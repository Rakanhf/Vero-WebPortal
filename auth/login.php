<?php
session_start();

// Check if the user is already logged in and redirect to the home page
if (isset($_SESSION['access_token'])) {
    echo '<script>alert("' . $_SESSION['access_token_exp_time'] . '");</script>';
    header("Location: ../index.php");
    exit();
}

// Check for an error message
if (isset($_SESSION['error'])) {
    // Display an alert with the error message
    echo '<script>alert("' . $_SESSION['error'] . '");</script>';

    // Unset the error message so it doesn't persist across page loads
    unset($_SESSION['error']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vero - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/css/styles.css">
    <link rel="icon" type="image/x-icon" href="../src/images/favicon.ico">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-form">
                    <img src="../src/images/vero_digital_logo.png" alt="Logo">
                    <h2>Login</h2>
                    <form method="post" action="../api/process_login.php">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>