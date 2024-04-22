<?php
include 'config.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid']; // Fixed assignment operator

    $sql = "DELETE FROM user_form WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
