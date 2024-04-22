<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crudopiration</title>

    
<!-- bootstrap css -->
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
	
 
   <div class="container my-5">
    <button type="button" class="btn btn-primary"><a href="addfoodadmin.php" class="text-light">add food</a></button>

    <table class="table my-5">
        <thead>
            <tr>
                <th scope="col">id food</th>
                <th scope="col">Name</th>
                <th scope="col">img</th>
                <th scope="col">calorise</th>
                <th scope="col">protine</th>
                <th scope="col">carbs</th>
                <th scope="col">fat</th>

            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $sql = "SELECT * FROM food ";
            $result = mysqli_query($conn, $sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                $id=$row['idfood'];
                $name=$row['name'];
                $calorise=$row['calorise'];
                $carbs=$row['carbs'];
                $fat = $row['fat'];
                $proteine = $row['proteine'];
                $img= $row['photo'];

                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td><img src="images/'.$img.'" height="100px" width="100px"></td>
                <td>'.$calorise.'</td>
                <td>'.$proteine.'</td>
                <td>'.$carbs.'</td>
                
                <td>'.$fat.'</td>

                <td><button class="btn btn-primary"><a href="updatefood.php?updateid='.$id.'" class="text-light">Update</a></buttons>
                <button class="btn btn-danger"><a href="deletafood.php?deleteid='.$id.'"" class="text-light">Delete</a></button>
                </td>
              </tr>';
                }
            }
         
           
            ?>
        </tbody>
    </table>

   </div>
</body>
</html>
