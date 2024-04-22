<?php
include 'config.php'; 

if(isset($_POST['submit'])){




    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $password = md5($_POST['password']);

    $sql = "INSERT INTO user_form (name, email, password,user_type) VALUES ('$name', '$email', '$password','admin')";
    $result = mysqli_query($conn, $sql);

    if($result){
        lunchMeals with names similar to 'lunch' have been deleted.
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>CRUD Operation</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
</body>
</html>
