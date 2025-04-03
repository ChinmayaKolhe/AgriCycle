<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'buyer') {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard | AgriCycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">AgriCycle</a>
        <a href="../auth/logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="container mt-5">
    <h2>Welcome, Buyer!</h2>
    <p>Explore marketplace listings, connect with farmers, and access resources.</p>

    <div class="row">
        <div class="col-md-6">
            <a href="../marketplace/view_marketplace.php" class="card text-decoration-none">
                <div class="card-body text-center shadow-sm">
                    <h5 class="card-title">Marketplace</h5>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="../community/forum.php" class="card text-decoration-none">
                <div class="card-body text-center shadow-sm">
                    <h5 class="card-title">Community Forum</h5>
                </div>
            </a>
        </div>
    </div>
</div>

</body>
</html>
