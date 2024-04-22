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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head section content here -->
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

</head>
<body><nav>
<div class="header_section">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo"><a href="afterlogin.php"><div="logo"> <img src="images/uouqzaip1.png"></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="home.php"> Erercise</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="food.php">Food</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="tyya.php">Statistical</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="information.php">Objectif caloris</a> 
                  </ul>
                    <li class="nav-item">
                      <a class="nav-link" href="login_from.php">Logout</a>
                    </li>
                    
                </div>
           
		</div>
	</div>
  </nav>

<div class="all">
    <div class="video-container">
        <?php
        // Include the database connection
        require_once 'config.php';

        // Function to get all video files from the "videos_user" table
        
        function getVideosFromDatabase($conn, $user_id)
{
    $videoData = array();
    // Using prepared statements to prevent SQL injection
    $query = "SELECT vu.Id_src,vu.id_user,v.video_name FROM videos_user as vu JOIN videos as v ON vu.Id_src = v.id_src WHERE vu.id_user=" . $user_id;
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $videoData[] = $row;
    }
    return $videoData;
}

// Call the function to retrieve video data
$videos = getVideosFromDatabase($conn, $user_id);
?>

<!-- Rest of your HTML and PHP code -->

<?php foreach ($videos as $videoData): ?>
    <!-- Video display and form for each video -->
    <div class="video-container">
        <video controls>
            <source src="videos/<?php echo $videoData['video_name']; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        
        <form method="post" action="submitexercise_user.php">
        <input type="hidden" name="id_user" value="<?php echo $videoData['id_user']; ?>">
        <input type="hidden" name="Id_src" value="<?php echo $videoData['Id_src']; ?>">
        <button type="submit" class="add-exercise-btn">Submit Exercise</button>
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
      

<!-- Add your script includes here -->

</body>
</html>
