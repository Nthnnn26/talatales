<?php
include'config.php';

$email = $_SESSION['email'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagePath = $_POST['imagePath'];

    // Perform database insertion (replace 'your_table' and 'image_column' with your actual table and column names)
    $sql = "UPDATE tbl_user SET Avatar = '$imagePath' WHERE EmailAddress = '$email'";

    if (mysqli_query($dbcon, $sql)) {
        echo 'Image path inserted successfully';
    } else {
        echo 'Error: ' . mysqli_error($dbcon);
    }
}
?>
