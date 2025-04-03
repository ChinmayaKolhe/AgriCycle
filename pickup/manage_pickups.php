<?php
session_start();
include '../config/db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$query = "SELECT pr.*, u.name AS farmer_name 
          FROM pickup_requests pr 
          JOIN users u ON pr.farmer_id = u.id 
          ORDER BY pr.created_at DESC";
$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $request_id = $_POST['request_id'];
    $new_status = $_POST['status'];
    mysqli_query($conn, "UPDATE pickup_requests SET status='$new_status' WHERE id='$request_id'");
    header("Location: manage_pickups.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pickups | AgriCycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="#">AgriCycle</a>
        <a href="../dashboard/admin_dashboard.php" class="btn btn-light">Dashboard</a>
    </div>
</nav>

<div class="container mt-4">
    <h2>Manage Pickup Requests</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Farmer Name</th>
                <th>Waste Type</th>
                <th>Quantity (kg)</th>
                <th>Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['farmer_name']; ?></td>
                    <td><?php echo $row['waste_type']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>
                        <span class="badge bg-<?php echo $row['status'] == 'Completed' ? 'success' : 'warning'; ?>">
                            <?php echo $row['status']; ?>
                        </span>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                            <select name="status" class="form-control">
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                            <button type="submit" name="update_status" class="btn btn-sm btn-primary mt-2">Update</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>

