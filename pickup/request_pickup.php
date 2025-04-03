<?php
session_start();
include '../config/db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'farmer') {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farmer_id = $_SESSION['user_id'];
    $waste_type = $_POST['waste_type'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $status = "Pending";

    $query = "INSERT INTO pickup_requests (farmer_id, waste_type, quantity, location, status) 
              VALUES ('$farmer_id', '$waste_type', '$quantity', '$location', '$status')";

    if (mysqli_query($conn, $query)) {
        $success = "Pickup request submitted successfully!";
    } else {
        $error = "Failed to submit pickup request!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Pickup | AgriCycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="#">AgriCycle</a>
        <a href="../dashboard/farmer_dashboard.php" class="btn btn-light">Dashboard</a>
    </div>
</nav>

<div class="container mt-4">
    <h2>Request Waste Pickup</h2>

    <?php if (isset($success)) { echo "<div class='alert alert-success'>$success</div>"; } ?>
    <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

    <form method="POST">
        <div class="form-group">
            <label>Waste Type:</label>
            <input type="text" name="waste_type" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Quantity (in kg):</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Request Pickup</button>
    </form>
</div>

</body>
</html>
