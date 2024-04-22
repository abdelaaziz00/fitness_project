<?php
session_start();

// Check if the user is logged in and the user ID is available in the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('location: login.php');
    exit;
}

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];



$weight=100;
if (isset($_POST['sub1'])) {
  $weight = $_POST['valu'];
 
  // Rest of your code
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="homee.css">
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Element</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link rel="stylesheet" href="chosefood.css" >
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
 



<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
 

</head>
<body>
	<!--header section start -->
	<nav>
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
	<!--header section end -->
	<!--banner section start -->
	<div class="banner_section layout_padding">
		<div class="container">
			<h1 class="banner_taital text-danger">advice aboute brekfeakfast</h1>
			<h2 class="text-white">Breakfast is an essential meal that sets the tone for the day. It's crucial to start with a well-balanced plate, including a mix of carbohydrates, protein, and healthy fats. Protein-rich foods like eggs, yogurt, or nuts help keep you satisfied and support muscle health. Fiber from whole grains, fruits, and vegetables aids digestion and promotes a healthy gut. Avoiding sugary cereals and pastries will prevent energy spikes and crashes. Staying hydrated by drinking water is also important to kickstart your metabolism. Planning ahead for busy mornings and listening to your body's hunger cues can help make breakfast a satisfying and enjoyable experience</h2>
       </div>    
	</div>


	<!--banner section end -->
	<!--bg_main section start -->
	
	<!--bg_main section end -->
	<!--about section start -->
	<div class="about_section">
		<div class="container">
			<h1 class="about_text">searche youre food</h1>
			<p class="lorem_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
			<div class="about_bg">

			
     
      <<form action="" method="get">
    <div class="input-box">
        <i class="uil uil-search"></i>
        <input type="text" name="q" placeholder="Search here...">
        <button type="submit" class="button">Search</button>
    </div>
</form>





<?php



include 'config.php';

if (isset($_GET['q'])) {
    $searchQuery = $_GET['q'];
    $query1 = "SELECT * FROM food WHERE name LIKE '%" . $searchQuery . "%'";

    $result1 = $conn->query($query1);
    $rs = $result1->fetch_all();

    


		 if ($rs) {
				foreach ($rs as $B) {
					
?>


		
				  <div id="u1" class="item"> 
				
				  <div id="sous_titre"><h3><?php echo $B[1]?></h3> </div> 
				
				
				<div id="tff"><img id="img" src="images\<?php echo $B[5];?>" alt=""></img></div> 


			<form id="searchForm<?php echo $B[0]; ?>" method="post">
                <input type="hidden" name="item_id" value="<?php echo $B[0]; ?>">
                <input type="int" name="valu" placeholder="the weight"  class="sou" />
                <button type="sub1" name="sub1" class="my-button">g</button>
                <div id="search">
   
     

            </form>
          
    

		
					
					<form action="process_form.php" method="post">

					
					
		 
					  <div id="box">
					 <?php 
					 	$B[1]= $B[1]?>

						<h1>total calorise  = <?php echo $B[6] * $weight /100; ?></</h1>
						<h2>protine   = <?php echo $B[4] * $weight /100; ?> </h2>
						<h2>carbs   = <?php echo $B[2] * $weight /100; ?> </h2>
						<h2>fat   =  <?php echo $B[3] * $weight /100; ?></h2>				
					</div>


          <input type="hidden" name="id" value="<?php echo $B[0]; ?>">
<input type="hidden" name="namefood" value="lunch">
<input type="hidden" name="iduser" value="$user_id">
<input type="hidden" name="valu" value="<?php echo $weight; ?>">


					<button type="submit" name="sub1" class="my-button">Add food</button>
		</form>
					<div id="buten">
					 
				       

				  </div>  
				   
				</div> 
        
				<?php
				}
			}
				 else {
					echo "No results found.";
				}
}
				?>
        </div>
			
	<!--about section end -->
	<!--service section start -->
	

			
					<div class="contact_bg"><img src="images/WBDD.png"></div>
				<
			</div>
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
		
	</div>
	<script>
	<!--copyright section end -->
	 <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript --> 
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
    $(document).ready(function(){
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
        });
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
     
</body>
</html>