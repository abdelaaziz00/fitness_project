<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

    @$email = mysqli_real_escape_string($conn, $_POST['email']);
    @$pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass' AND user_type = 'user'";

    $result = mysqli_query($conn, $select);

    $select1 = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass' AND user_type = 'admin'";
    $result1 = mysqli_query($conn, $select1);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        // Store the user ID in the session
        $_SESSION['user_id'] = $row['id'];

        header('location: afterlogin.php');
        exit;
    } else if (mysqli_num_rows($result1) > 0) {
      $row1 = mysqli_fetch_array($result1);
      header('location:afterloginadmin.php');
    }else{
        $error[] = 'incorrect email or password!';
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style11.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>