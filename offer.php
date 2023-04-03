<?php 
session_start();
if (!isset($_SESSION["trainer_email"])) {
  header("Location: signin.php");
  exit;
}
require_once "connection.php";
require_once"validate.php";
$courses = validate($_POST['courses']);
$courselevel = validate($_POST['courselevel']);
$days = validate($_POST['days'])." ".validate($_POST['hours']) ;
$time=validate($_POST['hours']);
$trainer_id=$_SESSION['trainer_id'];

              $sql = "insert into sport values ('','$courses','$courselevel','$days','$trainer_id','$time' )";

              if (mysqli_query($conn, $sql)) {
                  echo "<script>alert('You are Registerd')</script>";
              } else {
                  echo "<script>alert('The Email or the phone number is already used')</script>";
              }
              mysqli_close($conn);
           

              // Redirect the user back to the original page
              header('Location: offering.php');
              exit;
            ?>