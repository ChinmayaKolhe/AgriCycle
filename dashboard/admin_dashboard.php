<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db_connect.php';
include 'header.php';

// Fetch statistics
$totalUsersQuery = "SELECT COUNT(*) AS total_users FROM users";
$totalUsersResult = mysqli_query($conn, $totalUsersQuery);
$totalUsers = mysqli_fetch_assoc($totalUsersResult)['total_users'];

$totalListingsQuery = "SELECT COUNT(*) AS total_listings FROM marketplace";
$totalListingsResult = mysqli_query($conn, $totalListingsQuery);
$totalListings = mysqli_fetch_assoc($totalListingsResult)['total_listings'];

$totalOrdersQuery = "SELECT COUNT(*) AS total_orders FROM orders";
$totalOrdersResult = mysqli_query($conn, $totalOrdersQuery);
$totalOrders = mysqli_fetch_assoc($totalOrdersResult)['total_orders'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | AgriCycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-danger">Admin Dashboard</h2>
    <p class="text-muted">Manage users, waste listings, and oversee marketplace operations.</p>

    <!-- Admin Dashboard Cards -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <i class="bi bi-people display-4 text-danger"></i>
                    <h5 class="card-title mt-3">Total Users</h5>
                    <p class="card-text"><strong><?php echo $totalUsers; ?></strong> Registered Users</p>
                    <a href="../admin/manage_users.php" class="btn btn-outline-danger">Manage Users</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <i class="bi bi-shop display-4 text-primary"></i>
                    <h5 class="card-title mt-3">Total Listings</h5>
                    <p class="card-text"><strong><?php echo $totalListings; ?></strong> Waste Listings</p>
                    <a href="../admin/manage_listings.php" class="btn btn-outline-primary">View Listings</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <i class="bi bi-receipt display-4 text-success"></i>
                    <h5 class="card-title mt-3">Total Orders</h5>
                    <p class="card-text"><strong><?php echo $totalOrders; ?></strong> Orders Processed</p>
                    <a href="../admin/manage_orders.php" class="btn btn-outline-success">Manage Orders</a>
                </div>
            </div>
        </div>
    </div>

    <!-- System Overview -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5 class="card-title">User Distribution</h5>
                    <canvas id="userChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5 class="card-title">Recent Activities</h5>
                    <p>Monitor the latest user activities and transactions.</p>
                    <a href="../admin/activity_log.php" class="btn btn-outline-info">View Logs</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('userChart').getContext('2d');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Farmers', 'Buyers', 'Admins'],
        datasets: [{
            label: 'User Roles',
            data: [40, 55, 5], // Example Data
            backgroundColor: ['#28a745', '#007bff', '#dc3545']
        }]
    },
    options: {
        responsive: true
    }
});
</script>

</body>
</html>
