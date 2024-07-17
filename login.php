<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user details based on role
    $query_doctor = "SELECT * FROM doctor_log WHERE username='$username' AND password='$password'";
    $query_clerk = "SELECT * FROM clerk_log WHERE username='$username' AND password='$password'";
    $query_admin = "SELECT * FROM admin_log WHERE username='$username' AND password='$password'";

    // Check for doctor login
    $result = $con->query($query_doctor);
    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'doctor';
        header("Location: doctor.php");
        exit();
    }

    // Check for clerk login
    $result = $con->query($query_clerk);
    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'clerk';
        header("Location: clerk.php");
        exit();
    }

    // Check for admin login
    $result = $con->query($query_admin);
    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header("Location: admin.php");
        exit();
    }

    // Invalid credentials
    echo "<script>alert('Invalid username or password');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Basic styling for login form */
        body {
            font-family: Arial, sans-serif;
            background-image: url('./assets/admin.gif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            text-align: center;
            padding-top: 100px;
            margin: 0; /* Remove default margin */
        }
        .login {
            width: 400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .input-container {
            position: relative;
            margin-bottom: 30px;
        }
        .input-container input[type="text"], .input-container input[type="password"] {
            width: calc(100% - 32px); /* Adjusted for padding and border */
            padding: 12px 40px; /* Adjusted padding for inputs */
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }
        .input-container i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
            color: #888;
        }
        .show-password {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 20px;
            cursor: pointer;
            color: #888;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 40%; /* Same padding as input fields */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .login h2 {
            margin-bottom: 50px;
            color: black;
        }
    </style>
</head>
<body>
    <div class="login">
        <h2>LOGIN</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="input-container">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-container">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="show-password" onclick="togglePasswordVisibility()">
                    <i class="fa fa-eye"></i>
                </span>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
    var passwordField = document.getElementById('password');
    var icon = document.querySelector('.show-password i');

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

    </script>
</body>
</html>
