<?php
include("config.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "videos/" . $filename;
    move_uploaded_file($tempname, $folder);

    $videoName = $filename; // Extract video name from uploaded file

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO videos (video_path, video_name, id_muscle) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $folder, $videoName, $id); // 'i' indicates integer type for id_muscle

        if (mysqli_stmt_execute($stmt)) {
          header('location:muscls.php');
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Statement preparation error: " . mysqli_error($conn);
    }
}
?>









<?php

include 'config.php';


$id = $_GET['id'];



session_start();

// Check if the user is logged in and the user ID is available in the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('location: login.php');
    exit;
}

// Retrieve the user ID from the session

?>




<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">

<link rel="stylesheet" href="trya.css">






    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Organization</title>
    <link rel="stylesheet" href="vidies.css">



<!--*****navbar******-->


</head>
<body>
<div class="header_section">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo"><a href="index.html"><img src="images/uouqzaip1.png"></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="afterloginadmin.php">HOME</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="displayfood.php"> food</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="display.php">admin</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="muscls.php">exercise</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="login_from.php">logout</a>
                    </li>
                   
                    
                </div>
            </nav>
		</div>
	</div>



  <div class="mb-3 mb-3">
    

    <form method="POST" enctype="multipart/form-data" >
        <div class="d-flex flex-row mb-3 mb-3">  
    <div class="mb-3" style="max-width: 18rem;">
        <input type="file" class="form-control" style="max-width: 18rem;" name="file" id="file">
        </div>   
        <input type="submit" name="submit" class="btn btn-secondary" value="Submit">
    </div>

    </form>

</div>

     



  <div class="all">
    <div class="video-container">
        <?php
        // Include the database connection
        require_once 'config.php';

        // Function to get all video files from the "videos" table
        function getVideosFromDatabase($conn, $id)
{
    $videoData = array();
    // Using prepared statements to prevent SQL injection
    $query = "SELECT * FROM videos WHERE id_muscle=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $videoData[] = $row;
    }

    return $videoData;
}

        $videos = getVideosFromDatabase($conn, $id);
        ?>

        <?php foreach ($videos as $videoData): ?>
            <div class="video-item">
                <video controls>
                    <source  width="100%" height="315"  src="videos/<?php echo $videoData['video_name']; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <form method="post" action="submitexercise.php">
                    <input type="hidden" name="idmuscle" value="<?php echo $id; ?>">
                    <input type="hidden" name="video_name" value="<?php echo $videoData['video_name']; ?>">
                     <input type="hidden" name="video_id" value="<?php echo $videoData['id_src']; ?>">
                   <button type="submit" class="add-exercise-btn">submit exercise</button>
                </form>

            </div>
        <?php endforeach; ?>

    </div>

        </div>

    
       





	<div class="footer">
		<div class="Categorie">
				<h2>Categories:</h2>
					<div class="cat">
						<ul>
							<li>sport</li>
							<li>film</li>
							<li>economic</li>
							<li>sience and Technology</li>
						</ul>
					</div>
		</div>
		<div class="ContactUs">
			<h2>Contact Us:</h2>
			<div class="contact">
				<ul>
					<li>Phone: 0681568201</li>
					<li>Email: abdelaaziz.belharcha@gmail.com</li>
					<li>Adress: Morocco-Safi</li>
				</ul>
			</div>
		  </div>
	
    


          

      <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
      
</body>
</html>

