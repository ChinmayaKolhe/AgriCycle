<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'farmer') {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $waste_type = mysqli_real_escape_string($conn, $_POST['waste_type']);
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $farmer_id = $_SESSION['user_id'];

    $query = "INSERT INTO waste_listings (farmer_id, waste_type, quantity, price, status) 
              VALUES ('$farmer_id', '$waste_type', '$quantity', '$price', 'Available')";

    if (mysqli_query($conn, $query)) {
        header("Location: farmer_waste_listings.php?success=added");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Waste Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-success">Add New Waste Listing</h2>

    <form method="POST" action="add_waste.php">
        <div class="mb-3">
            <label class="form-label">Waste Type</label>
            <input type="text" name="waste_type" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity (kg)</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Listing</button>
    </form>
</div>

</body>
</html>
