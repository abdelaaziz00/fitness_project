<?php
include 'config.php'; 
if(isset($_POST['submit'])){ 
    
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;
    echo $folder;
    move_uploaded_file($tempname, $folder);
    $name = $_POST['name'];
    $caloris = $_POST['caloris'];
    $protine = $_POST['protine'];
    $carbs = $_POST['carbs'];
    $fat = $_POST['fat'];



    $sql = "INSERT INTO food (name, calorise, proteine,carbs,fat,photo) VALUES ('$name', '$caloris', '$protine','$carbs', '$fat', '$filename')";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:displayfood.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>add food by admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadfile">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name" autocomplete="off">
        </div>
        <div class="mb-3"> 
            <label class="form-label">caloris in 100g</label>
            <input type="int" class="form-control" placeholder="100g" name="caloris">
        </div>
        <div class="mb-3">
            <label class="form-label">Protn in 100g</label>
            <input type="int" class="form-control" placeholder="100g" name="protine">
        </div>
        <div class="mb-3">
            <label class="form-label">carbs in 100g</label>
            <input type="int" class="form-control" placeholder="100g" name="carbs">
        </div>
        <div class="mb-3">
            <label class="form-label">fat in 100g</label>
            <input type="int" class="form-control" placeholder="100g" name="fat">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
</body>
</html>







