<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crudopiration</title>
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
    <button type="button" class="btn btn-primary"><a href="addadmin.php" class="text-light"> Add Admin </a></button>

    <table class="table my-5">
        <thead>
            <tr>
                <th scope="col">Slno</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $sql = "SELECT id, name, email, password FROM user_form WHERE user_type='admin'";
            $result = mysqli_query($conn, $sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $name=$row['name'];
                $email=$row['email'];
                $password=$row['password'];
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$password.'</td>
                <td><button class="btn btn-primary"><a href="updateadmin.php?updateid='.$id.'" class="text-light">Update</a></buttons>
                <button class="btn btn-danger"><a href="deleteadmin.php?deleteid='.$id.'"" class="text-light">Delete</a></button>
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
