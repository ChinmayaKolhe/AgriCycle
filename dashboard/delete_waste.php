<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'farmer') {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM waste_listings WHERE id = '$id' AND farmer_id = ".$_SESSION['user_id'];

    if (mysqli_query($conn, $query)) {
        header("Location: farmer_waste_listings.php?success=deleted");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
