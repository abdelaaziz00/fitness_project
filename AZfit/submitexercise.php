<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['video_id'])) {
    $videoId = $_POST['video_id'];

    // Retrieve video information from the database
    $sql = "SELECT video_path FROM videos WHERE id_src = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $videoId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $videoPath);

        if (mysqli_stmt_fetch($stmt)) {
            mysqli_stmt_close($stmt);

            // Delete video record from the database
            $deleteSql = "DELETE FROM videos WHERE id_src = ?";
            $deleteStmt = mysqli_prepare($conn, $deleteSql);

            if ($deleteStmt) {
                mysqli_stmt_bind_param($deleteStmt, "i", $videoId);

                if (mysqli_stmt_execute($deleteStmt)) {
                    // Delete video file from the server
                    if (unlink($videoPath)) {
                        header('location:muscls.php');
                    } else {
                        echo "Error deleting video file";
                    }
                } else {
                    echo "Error deleting video record: " . mysqli_error($conn);
                }
                
                mysqli_stmt_close($deleteStmt);
            } else {
                echo "Statement preparation error: " . mysqli_error($conn);
            }
        } else {
            echo "Video not found";
        }
    } else {
        echo "Statement preparation error: " . mysqli_error($conn);
    }
}
?>
