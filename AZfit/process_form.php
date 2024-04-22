<?php
include 'config.php';
session_start();

// Check if the user is logged in and the user ID is available in the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('location: login.php');
    exit;
}

// Retrieve weight value from form if 'sub1' is submitted
include 'config.php'; // Include your database configuration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $namefood = $_POST['namefood'];
    $weight = $_POST['valu'];
    $id = $_POST['id'];

    // Prepare and execute the SQL query to insert data into the 'fooduser' table
    $query = "INSERT INTO fooduser (id_user, namefood, Weight, idfood) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("isss", $user_id, $namefood, $weight, $id);

    if ($stmt->execute()) {
        // Data inserted successfully
        header('location:food.php');
    } else {
        // Error inserting data
        echo "Error inserting data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect or handle invalid requests
    header("location: index.html");
    exit;
}

?>
