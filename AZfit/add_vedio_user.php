<?php

include 'config.php'; // Correct the filename to 'config.php'

session_start();

// Check if the user is logged in and the user ID is available in the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('location: login.php');
    exit;
}

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $videoId = $_POST['video_id'];
    $id_user = $user_id; // This value was provided in your question

    // Check if the data already exists in videos_user
    $checkQuery = "SELECT COUNT(*) FROM videos_user WHERE id_user = ? AND Id_src = ?";
    
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ii", $id_user, $videoId);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();

    if ($count > 0) {
        // Data already exists, return to the page
        header('location:home.php');
    } else {
        // Data doesn't exist, insert it
        $stmt->close();

        $insertQuery = "INSERT INTO videos_user (id_user, Id_src) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ii", $id_user, $videoId);
        
        if ($stmt->execute()) {
            header('location:home.php');
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}

?>
