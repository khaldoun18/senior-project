<?php
require_once "connection.php";

$sport_id = $_POST['sport_id'];





if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE sport SET  class_approve = '1' WHERE sport_id = $sport_id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You are registered')</script>";
} else {
    echo "<script>alert('The email or the phone number is already used')</script>";
}


mysqli_close($conn);

// Redirect the user back to the original page
header("Location: adminClassApprove.php");
exit;






?>