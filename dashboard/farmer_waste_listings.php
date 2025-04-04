<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'farmer') {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db_connect.php';
include 'header.php';

// Fetch waste listings for the logged-in farmer
$farmer_id = $_SESSION['user_id'];
$query = "SELECT * FROM waste_listings WHERE farmer_id = $farmer_id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Waste Listings | AgriCycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-success">Manage Your Waste Listings</h2>
    <p class="text-muted">Add, update, or remove your waste items available for sale or recycling.</p>

    <!-- Add New Listing Button -->
    <a href="add_waste.php" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Add New Listing</a>

    <!-- Waste Listings Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Waste Type</th>
                    <th>Quantity (kg)</th>
                    <th>Price (₹)</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['waste_type']); ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><span class="badge bg-<?php echo ($row['status'] == 'Available') ? 'success' : 'secondary'; ?>"><?php echo $row['status']; ?></span></td>
                        <td>
                            <a href="edit_waste.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete_waste.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
