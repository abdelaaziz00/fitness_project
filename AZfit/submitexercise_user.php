<?php
include 'config.php';

if (isset($_POST["id_user"]) && isset($_POST["Id_src"])) {
    
    $id_user = mysqli_real_escape_string($conn, $_POST["id_user"]);
    $Id_src = mysqli_real_escape_string($conn, $_POST["Id_src"]);

    echo $Id_src;
    // Delete row where id_user matches and Id_src matches
    $deleteVideoQuery = "DELETE FROM videos_user WHERE id_user = '$id_user' AND Id_src = '$Id_src'";

    if (mysqli_query($conn, $deleteVideoQuery)) {
        header('location: vedios_user.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Handle the case where id_user and Id_src are not set in the POST request
    // You may want to redirect the user to an error page or provide a suitable response.
}
?>
