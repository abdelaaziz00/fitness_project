<?php
include 'config.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Retrieve the image filename associated with the record
    $sql = "SELECT photo FROM food WHERE idfood=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $imgFilename = $row['photo'];
        
        // Check if the image file exists before deleting
        if (file_exists("images/" . $imgFilename)) {
            // Delete the image file
            unlink("images/" . $imgFilename);
        }

        // Delete the record from the database
        $deleteSql = "DELETE FROM food WHERE idfood=$id";
        $deleteResult = mysqli_query($conn, $deleteSql);

        if ($deleteResult) {
            header('location:displayfood.php');
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Error fetching image filename: " . mysqli_error($conn);
    }
}
?>
