

<?php
include 'config.php';

 
  $query1 = "SELECT * FROM musscle";


$result1 = $conn->query($query1);
$rs = $result1->fetch_all();

?>


<!DOCTYPE html>
<html>
    <head>    
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home</title>
      <link rel="stylesheet" href="homee.css">
      
      
      <meta charset="utf-8">
	
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">



<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">



<link rel="stylesheet" href="trya.css">


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
 

  
  
  
   
 <!--<div id="big"><img class="gg" src="youss.jpg" ></img></div>--> 
   

   <div id="all">
   <?php
    foreach ($rs as $r) {
      ?>
 
  


<div id="u1" class="item">   
    <div id="sous_titre"><h3><?php echo $r[1]; ?></h3> </div> 


      <div id="tff"><img id="img" src="images\<?php echo $r[0];?>" alt=""></img></div> 
      
      
     
    
   <?php

 ?>
 <a href=<?php echo "add_exercise.php?id=".$r[2]?>>
     <button class="my-button">Click me</button>
 </a>
   
 
           

   
   
      
      
     
  
</div> 
      <?php
    }
   ?>

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
  </body>
</html>


