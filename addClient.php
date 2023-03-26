<?php

require_once "connection.php";

$id = $_POST['client_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$bmi = $_POST['bmi'];

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
  
  $password = generatePassword(10); // Generate a password with 10 characters
  
 


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE client SET password = '$password', approved='1' , join_date= NOW()  WHERE client_id = $id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You are registered')</script>";
} else {
    echo "<script>alert('The email or the phone number is already used')</script>";
}


mysqli_close($conn);


require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php';
require_once 'PHPMailer-master/src/Exception.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();


$mail->setFrom('tigerhouse775@gmail.com', 'Tiger House');
$mail->addAddress($email, $name);
$mail->Subject = 'Verification Code';
$mail->Body = 'your password is '.$password .' dont share it with anyone  ';


$mail->isSMTP(); // set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // specify SMTP server
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Username = 'tigerhouse775@gmail.com'; // SMTP username
$mail->Password = 'zhlrrzkgxfgzrvvz'; // SMTP password
$mail->SMTPSecure = 'tls'; // enable TLS encryption
$mail->Port = 587; // TCP port to connect to


if (!$mail->send()) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
} else {
    echo 'Email sent successfully';
}






// Redirect the user back to the original page
header("Location: admin.php");
exit;






?>
