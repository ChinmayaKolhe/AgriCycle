<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'farmer') {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db_connect.php';

if (!isset($_GET['id'])) {
    header("Location: farmer_waste_listings.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM waste_listings WHERE id = '$id' AND farmer_id = ".$_SESSION['user_id'];
$result = mysqli_query($conn, $query);
$listing = mysqli_fetch_assoc($result);

if (!$listing) {
    header("Location: farmer_waste_listings.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $waste_type = mysqli_real_escape_string($conn, $_POST['waste_type']);
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $update_query = "UPDATE waste_listings SET waste_type='$waste_type', quantity='$quantity', price='$price', status='$status' WHERE id='$id'";
    
    if (mysqli_query($conn, $update_query)) {
        header("Location: farmer_waste_listings.php?success=updated");
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
    <title>Edit Waste Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-primary">Edit Waste Listing</h2>

    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">Waste Type</label>
            <input type="text" name="waste_type" class="form-control" value="<?php echo $listing['waste_type']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity (kg)</label>
            <input type="number" name="quantity" class="form-control" value="<?php echo $listing['quantity']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="price" class="form-control" value="<?php echo $listing['price']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="Available" <?php if ($listing['status'] == 'Available') echo 'selected'; ?>>Available</option>
                <option value="Sold" <?php if ($listing['status'] == 'Sold') echo 'selected'; ?>>Sold</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Listing</button>
    </form>
</div>

</body>
</html>
