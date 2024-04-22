<?php
// Function to get all video files from the "videos" folder
function getVideoFiles() {
    $videoFiles = array();
    $videosDir = "videos/";
    $handle = opendir($videosDir);

    while (($file = readdir($handle)) !== false) {
        if ($file != "." && $file != "..") {
            $videoFiles[] = array(
                'filename' => $file,
                'path' => $videosDir . $file
            );
        }
    }

    closedir($handle);
    return $videoFiles;
}

$videos = getVideoFiles();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["video_id"])) {
    $video_id = $_POST["video_id"];
    $id_user = 22; // Set the id_user to 22 as you mentioned

    // Insert the video information into the video_user table
    $conn = mysqli_connect('localhost', 'root', '', 'azfit');

    // Escaping user input to prevent SQL injection
    $video_id = mysqli_real_escape_string($conn, $video_id);

    $query = "INSERT INTO video_user (id_user, id, video) VALUES ($id_user, '$video_id', '$video_id')";
    mysqli_query($conn, $query);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your existing head content -->
</head>
<body>
    <nav>
        <!-- Your navigation bar content -->
    </nav>

    <div class="video-container">
        <?php foreach ($videos as $video): ?>
            <div class="video-item">
                <video width="100%" height="315" controls>
                    <source src="<?php echo $video['path']; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <!-- Add Exercise Form -->
                <form method="post" action="">
                    <input type="hidden" name="video_id" value="<?php echo $video['filename']; ?>">
                    <button type="submit" class="add-exercise-btn">drop exercise</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="footer">
        <!-- Your footer content -->
    </div>
</body>
</html>