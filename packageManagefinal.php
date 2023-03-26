<?php
require_once "connection.php";

$package_id = $_POST['package_id'];
$price = $_POST['price'];
$sessions = $_POST['sessions'];
$package_description = $_POST['package_description'];



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE package SET price = '$price', sessions='$sessions' , package_description= '$package_description'  WHERE package_id = $package_id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You are registered')</script>";
} else {
    echo "<script>alert('The email or the phone number is already used')</script>";
}


mysqli_close($conn);

// Redirect the user back to the original page
header("Location: manageplans.php");
exit;






?>