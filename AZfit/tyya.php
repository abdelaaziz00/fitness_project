<?php
session_start();
include 'config.php';

// Check if the user is logged in and the user ID is available in the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('location:login_from.php');
    exit;
}

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user_totals WHERE id_user= $user_id  and food_name = 3";
$fire = mysqli_query($conn, $sql);
$d = $fire->fetch_all();
foreach ($d as $D) {
    $pd = $D[3];
    $cd = $D[2];
    $fd = $D[4];
}

$sql = "SELECT * FROM user_totals WHERE id_user= $user_id  and food_name = 4";
$fire = mysqli_query($conn, $sql);
$d = $fire->fetch_all();
foreach ($d as $D) {
    $p = $D[3];
    $c = $D[2];
    $f = $D[4];
}


$sql = "SELECT * FROM user_totals WHERE id_user= $user_id  and food_name = 2";
$fire = mysqli_query($conn, $sql);
$l = $fire->fetch_all();
foreach ($l as $L) {
    $Lp = $L[3];
    $Lc = $L[2];
    $Lf = $L[4];
}

$sql = "SELECT * FROM user_totals WHERE id_user= $user_id  and food_name = 1";
$fire = mysqli_query($conn, $sql);
$b = $fire->fetch_all();
foreach ($b as $L) {
    $bp = $L[3];
    $bc = $L[2];
    $bf = $L[4];
}
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->

<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">

<link rel="stylesheet" href="trya.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawChart('piechart3', <?php echo $fd; ?>, <?php echo $cd; ?>, <?php echo $pd; ?>);
            drawChart('piechart2', <?php echo $Lf; ?>, <?php echo $Lc; ?>, <?php echo $Lp; ?>);
            drawChart('piechart1', <?php echo $bf; ?>, <?php echo $bc; ?>, <?php echo $bp; ?>);
            drawChart('piechart4', <?php echo $f; ?>, <?php echo $c; ?>, <?php echo $p; ?>);
        }

        function drawChart(containerId, fatValue, carbsValue, proteinValue) {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Value'],
                ['fat', fatValue],
                ['carbs', carbsValue],
                ['protein', proteinValue],
            ]);

            var options = {
                
            };

            var chart = new google.visualization.PieChart(document.getElementById(containerId));

            chart.draw(data, options);
        }
    </script>
</head>
<body>

		</div>
	</div>





<div class="d-flex justify-content-center mb-5">
    <div class="d-flex align-items-start">
        <div  class="d-flex flex-column mb-3 border border-dark">
        <div class="d-flex justify-content-center"><h1>breakfast</h1></div>
<div id="piechart1" style="width: 400px; height: 300px;"></div></div>
<div  class="d-flex flex-column mb-3 border border-dark">
<div class="d-flex justify-content-center"><h1>lunch</h1></div>
<div id="piechart2" style="width: 400px; height: 300px;"></div></div>
<div  class="d-flex flex-column mb-3 border border-dark">
<div class="d-flex justify-content-center"><h1>diner</h1></div>
<div id="piechart3" style="width: 400px; height: 300px;"></div></div>
</div></div>
<div class="d-flex justify-content-center ">
<div  class="d-flex flex-column mb-5 border border border-dark">
<div class="d-flex justify-content-center"><h1>all day</h1></div>
<div id="piechart4" class=".bg-body-secondary" style="width: 700px; height: 400px; bacrondcolar=red"></div></div></div>



<div class="footer mb-5">
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





          <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
     
</body>
</html>
