<?php

include 'config.php';







session_start();

// Check if the user is logged in and the user ID is available in the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('location: login.php');
    exit;
}

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];
echo $user_id;



// Include the database connection
require_once 'config.php';

// Function to get all video files from the "videos" table
function getVideosFromDatabase($conn, $user_id) {
    $videoData = array();
    $query = "SELECT * FROM videos_user WHERE id_user=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $videoData[] = $row;
    }

    return $videoData;
}

// Retrieve the videos for the user
$videos = getVideosFromDatabase($conn, $user_id);
?>









<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">






    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Organization</title>
    <link rel="stylesheet" href="vidies.css">



<!--*****navbar******-->


</head>
<body>
<nav>
<div class="header_section">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.html">HOME</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.html">ABOUT</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="services.html">SERVICES</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html">WEB</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html">ELEMENTS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.html">CONTACT</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><img src="images/search-icon.png"></a>
                    </li>
                  </ul>
                </div>
            </nav>
		</div>
	</div>



     



  <div class="all">
    <div class="video-container">
       

        <?php foreach ($videos as $videoData): ?>
            <div class="video-item">
            <video controls>
                     <source width="100%" height="315" src="videos/<?php echo $videoData['name']; ?>" type="video/mp4">
                     Your browser does not support the video tag.
            </video>
                <form method="post" action="add_exercise.php">
                    <input type="hidden" name="video_name" value="<?php echo $videoData['name']; ?>">
                    <input type="hidden" name="video_id" value="<?php echo $videoData['id']; ?>">
                    <button type="submit" class="add-exercise-btn">Add Exercise</button>
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
