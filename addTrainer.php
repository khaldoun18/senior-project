<?php
require_once "connection.php";

$id = $_POST['trainer_id'];
$name = $_POST['name'];
$email = $_POST['trainer_email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$yoe = $_POST['yoe'];
$target = $_POST['image'];

function generatePassword($length) {
    // Define all possible characters that can be used in the password
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@";
  
    $pass = "";
    for ($i = 0; $i < $length; $i++) {
      // Pick a random character from the chars string
      $randomIndex = rand(0, strlen($chars) - 1);
      $randomChar = $chars[$randomIndex];
    
      // Add the random character to the password
      $pass .= $randomChar;
    }
  
    return $pass;
  }
  
  $password = generatePassword(10);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE trainer SET password = '$password', approved='1' , join_date= NOW()  WHERE trainer_id = $id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You are registered')</script>";
} else {
    echo "<script>alert('The email or the phone number is already used')</script>";
}


mysqli_close($conn);

// Redirect the user back to the original page
header("Location: admin.php");
exit;






?>