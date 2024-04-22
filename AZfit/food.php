
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

// Now you can use the $user_id variable as needed in this page



$q = "SELECT * FROM fooduser as fu join food as f ON fu.idfood=f.idfood WHERE fu.id_user = $user_id AND fu.namefood = 'breakfast'";
$br = $conn->query($q);
$b = $br->fetch_all();





$diner = "SELECT * FROM fooduser as fu join food as f on fu.idfood=f.idfood WHERE fu.id_user = $user_id AND fu.namefood = 'diner'";
$dn = $conn->query($diner);
$d = $dn->fetch_all();





$lanch = "SELECT * FROM fooduser as fu join food as f on fu.idfood=f.idfood WHERE fu.id_user = $user_id AND fu.namefood = 'lunch'";
$ln = $conn->query($lanch);
$l = $ln->fetch_all();

?>






<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
 
<head>


<!-- basic -->

<!-- site metas -->
<title>chose food</title>



<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">



<link rel="stylesheet" href="trya.css">


      <link rel="stylesheet" href="foood.css">

  </head>
  <body>
    <!-- Header -->
    
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
                      <a class="nav-link" href="information.php">objectif caloris</a> 
                  </ul>
                    <li class="nav-item">
                      <a class="nav-link" href="login_from.php">logout</a>
                    </li>
                    
                </div>
           
		</div>
	</div>
  </nav>

        
     

    <!-- Home -->



   
   


 

  <div class="header_section">
		<div class="container-fluid">
  <?php
  $query = "SELECT total_calories FROM user_totals WHERE id_user = ? and food_name =4";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$total_calories=0;



   
    $row = $result->fetch_assoc();
    $total_calories = $row['total_calories'];
    
   
    $obj_cal=0;
    
$query = "SELECT obj_cal FROM user_form WHERE id = ?";
$stmt = $conn->prepare($query);

// Assuming $user_id contains the value 777


$stmt->bind_param("i", $user_id);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();


    $row = $result->fetch_assoc();
    $obj_cal = $row['obj_cal'];
    


// Close the prepared statement and database connection if needed

$less=$obj_cal- $total_calories;

    // Echo the total_calories
   ?>
    <a href="information.php">
<div id="call">
     <div id="content">
        <div id="N"><?php echo $obj_cal ?></div><div id="N">-</div> <div id="N"><?php echo $total_calories ?></div><div id="N">=</div> <div id="N"><?php echo $less; ?></div>
    </div>
    <div id="content">
        <div id="N">obj ca</div><div id="N">-</div> <div id="N">eated</div><div id="N">=</div> <div id="N">less</div>
    </div>  
</div>
</a>



 
<?php 
$stmt->close();
$conn->close();
?>
     
  








<div id="continair">

<?php
$totalcal=0;
$totalcarb=0;
$totalprotine=0;
$totafat=0;
  $nb=0;
  $nbc=0;  $nbp=0;  $nbf=0;
  foreach ($b as $B) {
    $nb=$B[11] * $B[3] /100 +$nb;
    $nbc=$B[7] * $B[3] /100 + $nbc;
    $nbp=$B[9] * $B[3] /100 + $nbp;
    $nbf=$B[8] * $B[3] /100 + $nbf;

    
    


    $totalcal=$B[11] * $B[3] /100 + $totalcal;
    $totalcarb=$B[7] * $B[3] /100 + $totalcarb;
    $totalprotine=$B[9] * $B[3] /100 + $totalprotine;
    $totafat=$B[8] * $B[3] /100 + $totafat;

  }


  ?>
    <div id="continair1">
      <div id="food">breakfaast</div>
      <div id="namber"><?php echo  $nb;?></div>
      <a href=<?php echo "delete_meal.php?namefood=breakfast"?>><button id="delete-button">Delete</button></a>
    </div>

    
  

  

 
    <?php
  foreach ($b as $B) {
   /* echo $B[1]," / ";//iduser
    echo $B[2]," / ";//breakfast
    echo $B[2]," / ";
    echo $B[3]," / ";//weight
    echo $B[4],"  /";//idsrcfood
    echo $B[5],"/  ";//idfood
    echo $B[6]," / ";//namefood
    echo $B[7],"  /";//carbs
    echo $B[8],"/  ";//fat
    echo $B[9]," / ";//protine
    echo $B[10]," / ";//type
    echo $B[11]," / ";//calorise*/
  ?>
    <div id="continair2">
      <div id="FandN">
        <div id="food"><?php echo $B[6]; ?></div>
        <div id="namber"><?php echo $B[3] * $B[11] /100 ; ?></div>
        <a href=<?php echo "delete_food.php?id=".$B[0]?>><button id="delete-button">Delete</button></a>
      </div>
      
      
    </div>
  <?php
  }
  ?>
<a href="http://localhost/AZfit/chosefood.php">
<button class="my-button">add food</button></a>
  
  </div>
    </div>
</div>



<?php
  $nl=0;
  $nlc=0;
  $nlf=0;
  $nlp=0;
  
  
  foreach ($l as $L) {
    $nl=$L[11] * $L[3] /100 +$nl;
    $nlc=$L[7] * $L[3] /100 + $nlc;
    $nlp=$L[9] * $L[3] /100 + $nlp;
    $nlf=$L[8] * $L[3] /100 + $nlf;

    $totalcal=$L[11] * $L[3] /100 + $totalcal;
    $totalcarb=$L[7] * $L[3] /100 + $totalcarb;
    $totalprotine=$L[9] * $L[3] /100 + $totalprotine;
    $totafat=$L[8] * $L[3] /100 + $totafat;
  }
  $lunchdrop="lunch";
  ?>


<div id="continair">  
    <div id="continair1">
      <div id="food">lunch</div>
      <div id="namber"><?php echo $nl;?> </div>
      <a href=<?php echo "delete_meal.php?namefood=lunch"?>><button id="delete-button">Delete</button></a>
    </div>

    
  
    <?php
  foreach ($l as $L) {
  ?>
    <div id="continair2">
      <div id="FandN">
        <div id="food"><?php echo $L[6]; ?></div>
        <div id="namber"><?php echo $L[11] * $L[3] /100; ?></div>
        <a href=<?php echo "delete_food.php?id=".$L[0]?>><button id="delete-button">Delete</button></a>
      </div>
    </div>
  <?php
  }
  ?>
<a href="http://localhost/AZfit/lunch.php">
<button class="my-button">add food</button></a>
  
  </div>
  </div>
    </div>
</div>










  <?php
  $nd=0;
  $ndc=0;
  $ndp=0;
  $ndf=0;

    

  foreach ($d as $D) {

    $nd= $D[11] * $D[3] /100 +$nd;  
    $ndp=$D[9] * $D[3] /100 + $ndp;
    $ndf=$D[8] * $D[3] /100 + $ndf;
    
    $totalcal=$D[11] * $D[3] /100 + $totalcal;
    $totalcarb=$D[7] * $D[3] /100 + $totalcarb;
    $totalprotine=$D[9] * $D[3] /100 + $totalprotine;
    $totafat=$D[8] * $D[3] /100 + $totafat;

  }
  ?>
 
  

 <div id="continair">
    <div id="continair1">
      <div id="food">diner</div>
      <div id="namber"><?php echo $nd ;?> </div>
      <a href=<?php echo "delete_meal.php?namefood=diner"?>><button id="delete-button">Delete</button></a>
    </div>


  
  <?php
  foreach ($d as $D) {
  ?>
  
  <div id="continair2">
    <div id="FandN">
      <div id="food"><?php echo $D[6]; ?></div>
      <div id="namber"><?php echo $D[3] * $D[11] / 100; ?></div>
      <a href=<?php echo "delete_food.php?id=".$D[0]?>><button id="delete-button">Delete</button></a>
      
    </div>


   <?php 
  }
 
   ?>


  <div class="bobo">
  <a href="http://localhost/AZfit/diner.php">
<button class="my-button">add food</button></a>
  </div>
    </div>
    </div>
    
   
</div>
  </div>
</div>







    


</div>
</div>

	<div class="footer">
		<div class="Categorie">
				<h1 class="text-white">Categories:</h1>
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
			<h1 class="text-white">Contact Us:</h1>
			<div class="contact">
				<ul>
					<li>Phone: 0631563201</li>
					<li>Email: abdelaaziz.belharcha@gmail.com</li>
					<li>Adress: Morocco-Safi</li>
				</ul>
			</div>
		  </div>
	
		   
	
		
	</div>
      </div>

      <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
     
     
    
    <?php
    //allday************************************************************************************************
    include 'config.php';

    function insertMeal($conn, $user_id, $meal_name, $calories, $carbs, $protein, $fat) {
      $insertQuery = "INSERT INTO user_totals (id_user, total_calories, total_carbs, total_protein, total_fat, food_name) VALUES (?, ?, ?, ?, ?, ?)";
      $insertStmt = $conn->prepare($insertQuery);
      $insertStmt->bind_param("idddds", $user_id, $calories, $carbs, $protein, $fat, $meal_name);
  
      if ($insertStmt->execute()) {
          echo "Data inserted successfully for $meal_name!";
      } else {
          echo "Error inserting data: " . $insertStmt->error;
      }
  
      $insertStmt->close();
  }
  function checkAndUpdateOrInsert($conn, $user_id, $food_id, $calories, $carbs, $protein, $fat) {
    // Select existing data for the user and food using the integer food_id
    $selectQuery = "SELECT * FROM user_totals WHERE id_user = ? AND food_name = ?";
    $selectStmt = $conn->prepare($selectQuery);
    $selectStmt->bind_param("ii", $user_id, $food_id);
    $selectStmt->execute();
    $result = $selectStmt->get_result();

    if ($result->num_rows > 0) {
        // Data exists, update the record
        $updateQuery = "UPDATE user_totals SET total_calories = ?, total_carbs = ?, total_protein = ?, total_fat = ? WHERE id_user = ? AND food_name = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("dddiis", $calories, $carbs, $protein, $fat, $user_id, $food_id);
        if ($updateStmt->execute()) {
        
        } else {
            echo "Error updating data: " . $updateStmt->error;
        }

        $updateStmt->close();
    } else {
        // Data doesn't exist, insert new data
        insertMeal($conn, $user_id, $food_id, $calories, $carbs, $protein, $fat);
    }

    $selectStmt->close();
}


  
  // Assuming you have these variables defined
  
  $meal_name = 3;
  $calories = $nd;
  $carbs = $ndc;
  $protein =$ndp;
  $fat =$ndf;
  
  checkAndUpdateOrInsert($conn, $user_id, $meal_name, $calories, $carbs, $protein, $fat);
  $meal_name = 1;
  $calories = $nb;
  $carbs = $nbc;
  $protein =$nbp;
  $fat =$nbf;
  
  checkAndUpdateOrInsert($conn, $user_id, $meal_name, $calories, $carbs, $protein, $fat);
 
  $meal_name = 2;
  $calories = $nl;
  $carbs = $nlc;
  $protein =$nlp;
  $fat =$nlf;
  
  checkAndUpdateOrInsert($conn, $user_id, $meal_name, $calories, $carbs, $protein, $fat);
 
    
  $meal_name =4 ;
  $calories = $totalcal;
  $carbs =  $totalcarb;
  $protein = $totalprotine;
  $fat =$totafat;
  
  checkAndUpdateOrInsert($conn, $user_id, $meal_name, $calories, $carbs, $protein, $fat);
  ?>
  </body>
  </html>
  