
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

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the input value and sanitize it
    $calories = intval($_POST['calorise']); // Ensure it's an integer

    // Check if the user already has a record in obj_calories
    $updateQuery = "UPDATE user_form SET obj_cal = ? WHERE id = ?";
    
    // Use prepared statements to prevent SQL injection
    if ($stmt = mysqli_prepare($conn, $updateQuery)) {
        mysqli_stmt_bind_param($stmt, "ii", $calories, $user_id);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            // Successful update, redirect to another page
            header('location: information.php');
            exit;
        } else {
            // Display the error
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Display an error message if the query couldn't be prepared
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="utf-8">
	
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">



<link rel="stylesheet" href="trya.css">
</head>    
<body>
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




    <div class="container mt-5">
    <div class="card  mt-5">
        <form method="post">
        <h1 class="text-center mb-6">Objective Calories</h1>
        <div class="row justify-content-center">
                    <div class="col-sm-4 mb-3">         
                    <input  class="form-control text-end " name="calorise" type="number" value="2000" />
                </div>
                <div class="col-sm-4">
                <button type="submit" class="btn btn-dark p-2" name="submit">objectif</button></div>
            </div>
        </form>
    
<form class="CalculateForm" method="post">
    
<h1 class="text-center mb-6">Calorie Calculator (If you don't have experience)</h1>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div>
                        <h5>Age*</h5>
                        <input class="form-control text-end " name="age" required="" type="number" value="25" />
                    </div>
                </div>

              

                
                <div class="col-sm-6">
                    <div>
                        <h5>Body Fat*</h5>
                        <div class="d-flex align-items-center">
                            <input class="form-control text-end " name="bodyFat" required="" type="number" value="20" />
                            <span class="btn ms-1  text-danger bg-secondary-subtle">%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <h5>Height*</h5>
                        <div class="d-flex align-items-center">
                            <input class="form-control text-end " name="height" required="" type="number" value="180" />
                            <span class="btn ms-1 text-danger text-nowrap bg-secondary-subtle">cm</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <h5>Weight*</h5>
                        <div class="d-flex align-items-center">
                            <input class="form-control text-end " name="weight" required="" type="number" value="65" />
                            <span class="btn ms-1 text-danger text-nowrap bg-secondary-subtle">kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                <div>
                    <h5>Activity*</h5>
                    <select class="form-select " name="activity" required="">
                        <option value="1">Basal Metabolic Rate (BMR)</option>
                        <option value="1.2">Sedentary: little or no exercise</option>
                        <option value="1.375">Light: exercise 1-3 times/week</option>
                        <option selected="" value="1.465">exercise 4-5 times/week</option>
                        <option value="1.55">Active: daily exercise  exercise 3-4 times/week</option>
                        <option value="1.725">Very Active: intense exercise 6-7 times/week</option>
                        <option value="1.9">Extra Active: very intense exercise daily, or physical job</option>
                    </select>
                </div>
                </div>
                
                <div class="col-sm-6">
                    <div>
                        <h5>Gender*</h5>
                        <div class="form-control ">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <input checked="" id="gender_male" name="gender" required="" type="radio" value="0" />
                                    <label class="ms-2">Male</label>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <input id="gender_female" name="gender" required="" type="radio" value="1" />
                                    <label class="ms-2">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                
</div>
                <div class="col-sm-6">
                    <div>
                        <h5>Result Unit*</h5>
                        <div class="form-control ">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <input checked="" id="unit_calories" name="unit" required="" type="radio" value="Calories" />
                                    <label class="ms-2">Calories</label>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <input id="unit_kilo" name="unit" required="" type="radio" value="kilojoules" />
                                    <label class="ms-2">kilojoules</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb">
                    <div>
                        
                        <div class="row g-3  ">
                        <h5>BMR estimation formula*</h5>
                        <div class="form-control">
                            <div class="col-sm-12 d-flex align-items-center ">
                                <input checked="" id="Mifflin_St_Jeor" name="formula" required="" type="radio" value="0" />
                                <label class="ms-2">Mifflin St Jeor</label>
                            </div>
                            <div class="col-sm-12 d-flex align-items-center">
                                <input id="Revised_Harris_Benedict" name="formula" required="" type="radio" value="1" />
                                <label class="ms-2">Revised Harris-Benedict</label>
                            </div>
                            <div class="col-sm-12 d-flex align-items-center">
                                <input id="Katch_McArdle" name="formula" required="" type="radio" value="2" />
                                <label class="ms-2">Katch-McArdle</label>
                            </div>
                        </div>
                    </div>
</div>
                </div>
            </div>
        </div>



        <div class="ans_calculate"></div>
        <div class="text-center mt-4 card-footer">
            <button class="btn btn-dark" onclick="calculateCalorie(this)" type="button">
                <i class="fas fa-calculator me-3"></i>
                Calculate
            </button>



           

        </div>
    </div>

</div>
    
</form>
<script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
     

	<div class="footer">
		<div class="Categorie">
				<h1 >Categories:</h1>
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
			<h1>Contact Us:</h1>
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




<script>
    function calculateCalorie(obj)
    {
        const age = obj.form.age.value;
        const gender = obj.form.gender.value;
        const bodyFat = obj.form.bodyFat.value;
        const height = obj.form.height.value;
        const weight = obj.form.weight.value;
        const activity = obj.form.activity.value;
        const unit = obj.form.unit.value;
        const formula = obj.form.formula.value;

        let BMR = '';
        if(formula == 0) // Mifflin
        {
            BMR = Mifflin(gender, age, bodyFat, height, weight);
        }
        else if(formula == 1) // Harris
        {
            BMR = Harris(gender, age, bodyFat, height, weight);
        }
        else if(formula == 2) // Katch
        {
            BMR = Katch(bodyFat, weight);
        }

        let ret = parseFloat(BMR)*parseFloat(activity);
        if(unit == 'kilojoules')
        {
            ret = (ret*4.1868);
        }

        document.querySelector(".ans_calculate").innerHTML = '<div class="container"><h4 class="text-center form-control my-3 text-danger fs-4">You should consume <span class="text-red">'+Math.ceil(ret)+' '+unit+'/day </span> of calorie to maintain your weight.</h4></div>';
    }

    function Mifflin(gender, age, bodyFat, height, weight)
    {
        let BMR = (10*weight) + (6.25*height) - (5*age) + 5;
        if(gender == 1) // Female
        {
            BMR = (10*weight) + (6.25*height) - (5*age) - 161;
        }

        return BMR;
    }

    function Harris(gender, age, bodyFat, height, weight)
    {
        let BMR = (13.397*weight) + (4.799*height) - (5.677*age) + 88.362;
        if(gender == 1) // Female
        {
            BMR = (9.247*weight) + (3.098*height) - (4.330*age) + 447.593;
        }

        return BMR;
    }

    function Katch(bodyFat, weight)
    {
        let BMR = 370 + 21.6*(1 - (bodyFat/100))*weight;

        return BMR;
    }
</script>

