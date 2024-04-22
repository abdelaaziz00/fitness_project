<?php
include 'config.php'; // Include your database configuration file

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize and retrieve the 'id' from the URL
    $food_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Create a DELETE query to remove the food item with the specified ID
    $deleteQuery = "DELETE FROM fooduser WHERE id = '$food_id'";

    // Execute the DELETE query
    if (mysqli_query($conn, $deleteQuery)) {
        // The food item has been successfully deleted
        header('location:food.php');
    } else {
        // Error occurred during deletion
        echo "Error deleting food item: " . mysqli_error($conn);
    }
} else {
    // 'id' parameter is not set in the URL
    echo "ID parameter is missing in the URL.";
}

// Close the database connection
mysqli_close($conn);
?>
