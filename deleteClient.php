<?php

require_once "connection.php";

$id = $_POST['client_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$bmi = $_POST['bmi'];

$target = $_POST['image'];




  
 


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE client SET password = '$password', approved='4' , join_date= NOW()  WHERE client_id = $id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You are registered')</script>";
} else {
    echo "<script>alert('The email or the phone number is already used')</script>";
}









// Redirect the user back to the original page
header("Location: adminClient.php");
exit;






?>
