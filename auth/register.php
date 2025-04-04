<?php 
session_start();
include '../config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];  

    // Debugging: Print role value
    echo "Selected Role: " . $role;

    $checkQuery = "SELECT * FROM users WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $error = "Email already exists!";
    } else {
        $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION['user_id'] = mysqli_insert_id($conn);
            $_SESSION['role'] = $role;
            header("Location: login.php");
            exit();
        } else {
            echo "SQL Error: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AgriCycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background: url('../assets/images/signupbg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .register-container {
            width: 100%;
            max-width: 400px;
            margin: 80px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-home {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="register-container">
        <form method="POST">
            <h2 class="text-center">Create an Account</h2>
            
            <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Role:</label>
                <select name="role" class="form-control" required>
                    <option value="farmer">Farmer</option>
                    <option value="buyer">Buyer</option>
                    <option value="insurance_agent">Insurance Agent</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success w-100">Register</button>
            <a href="../index.php" class="btn btn-secondary btn-home">Go back to Home</a>

            <p class="mt-3 text-center">Already have an account? <a href="login.php">Login Here</a></p>
        </form>
    </div>
</div>

</body>
</html>
