<?php
require_once "connection.php";


$name = $_POST['name'];
$sport_id = $_POST['sport_id'];


$client_id=$_POST['client_id'];
$class_date=$_POST['class_date'];



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql1 = "SELECT * FROM sport_client WHERE client_id ='$client_id' AND sport_id = '$sport_id'  ";
$result= $conn->query($sql1);
$sql2 = "SELECT * FROM sport_client WHERE class_date ='$class_date'  ";
$result2= $conn->query($sql2);

if ($result && mysqli_num_rows($result) > 0) {
    echo"you cant";
}
else if ($result2 && mysqli_num_rows($result2) > 0) {
    echo"you cant";
}


else{
$sql = "INSERT INTO sport_client VALUES ('', '$client_id', '$sport_id','$class_date')";


if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You are registered')</script>";
} else {
    echo "<script>alert('The email or the phone number is already used')</script>";
}

}
mysqli_close($conn);

// Redirect the user back to the original page
header('Location: userPage.php');
exit;






?>