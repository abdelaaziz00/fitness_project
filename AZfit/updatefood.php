<?php
include 'config.php'; 

$id = $_GET['updateid'];

$sql = "SELECT * FROM food WHERE idfood = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$carbs = $row['carbs'];
$fat = $row['fat'];
$proteine = $row['proteine'];
$calorise = $row['calorise'];
$img = $row['photo'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $calorise = $_POST['calorise'];
    $carbs = $_POST['carbs'];
    $proteine = $_POST['proteine'];
    $fat = $_POST['fat'];

    // Check if a new image has been uploaded
    if (!empty($_FILES['uploadfile']['name'])) {
        // Delete the old image file
        if (file_exists("images/$img")) {
            unlink("images/$img");
            
        }

        // Upload the new image
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
           
            // Update the database with the new image file name
            $img = $filename;
        } else {
            echo "Error uploading image<br>";
        }
    }

    $sql = "UPDATE food SET name='$name', calorise='$calorise', proteine='$proteine', fat='$fat', carbs='$carbs', photo='$img' WHERE idfood='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
       
        header('location:displayfood.php');
        
    } else {
        echo "Error: " . mysqli_error($conn);
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
<div class="mb-3">
    <form method="post" enctype="multipart/form-data"> <!-- Add enctype for file uploads -->
    <td>
    <img src="images/<?php echo $img; ?>" height="100px" width="100px">
</td>
    <input type="file" name="uploadfile"> </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" autocomplete="off" value="<?php echo $name; ?>">
        </div>
        <div class="mb-3"> 
            <label class="form-label">caloris in 100g</label>
            <input type="text" class="form-control" autocomplete="off" name="calorise" value="<?php echo $calorise; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Protn in 100g</label>
            <input type="text" class="form-control" name="proteine" autocomplete="off" value="<?php echo $proteine; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">carbs in 100g</label>
            <input type="text" class="form-control"  name="carbs" autocomplete="off"  value="<?php echo $carbs; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">fat in 100g</label>
            <input type="text" class="form-control"  name="fat" autocomplete="off"  value="<?php echo $fat; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>
</body>
</html>
