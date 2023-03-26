<?php

    require_once "connection.php";
    
    $price = $_POST['price'];
    $sessions = $_POST['sessions'];
    $package_description = $_POST['package_description'];

    

   

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "insert into package values (' ','$price', '$sessions', '$package_description')";

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