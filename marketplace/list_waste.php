<?php
session_start();
include '../config/db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'farmer') {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $farmer_id = $_SESSION['user_id'];

    $query = "INSERT INTO waste_listings (farmer_id, title, description, price, location) 
              VALUES ('$farmer_id', '$title', '$description', '$price', '$location')";

    if (mysqli_query($conn, $query)) {
        $success = "Waste listed successfully!";
    } else {
        $error = "Failed to list waste!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Waste | AgriCycle</title>
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
    <h2>List Your Waste</h2>

    <?php if (isset($success)) { echo "<div class='alert alert-success'>$success</div>"; } ?>
    <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

    <form method="POST">
        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Price (per kg):</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">List Waste</button>
    </form>
</div>

</body>
</html>
