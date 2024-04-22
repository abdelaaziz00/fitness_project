<?php
include 'config.php'; // Include your database configuration file

session_start();

// Check if the user is logged in and the user ID is available in the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('location: login.php');
    exit;
}


// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];

// Check if the 'namefood' query parameter is set
if (isset($_GET['namefood'])) {
    // Sanitize and retrieve the meal name from the query parameter
    $meal_name = mysqli_real_escape_string($conn, $_GET['namefood']);
    echo $user_id;
    echo  $meal_name;
    // Construct and execute the SQL query to delete meals with similar names for the specified user
    $deleteQuery = "DELETE FROM fooduser WHERE id_user = '$user_id' AND namefood LIKE '$meal_name'";

    if (mysqli_query($conn, $deleteQuery)) {
        // Meals with similar names have been successfully deleted
        header('location:food.php');
    } else {
        // Error occurred during deletion
        echo "Error deleting meals: " . mysqli_error($conn);
    }
} else {
    // 'namefood' query parameter is not set
    echo "Meal name not specified.";
}

// Close the database connection
mysqli_close($conn);
?>
