<?php

    require_once "connection.php";
    
    $package_id = $_POST['package_id'];
  

    

   

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM package WHERE package_id=$package_id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You are Registerd')</script>";
} else {
    echo "<script>alert('The Email or the phone number is already used')</script>";
}

mysqli_close($conn);

// Redirect the user back to the original page
header("Location: manageplans.php");
exit;






?>