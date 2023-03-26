<?php
session_start();
if (!isset($_SESSION["trainer_email"])) {
  header("Location: signin.php");
  exit;
}
$email = $_SESSION["trainer_email"];
require_once "connection.php";

// Prepare the SQL statement with a parameterized placeholder for the email
$sql = "SELECT * FROM trainer WHERE trainer_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

if ($result = $stmt->get_result()) {
  // Retrieve the data from the first row
  $row = $result->fetch_assoc();
  $_SESSION["trainer_id"] = $row['trainer_id'];
  $_SESSION["name"] = $row['name'];
  $_SESSION["specialization"] = $row['specialization'];
  $_SESSION["yoe"] = $row['yoe'];
  $_SESSION["phone"] = $row['phone'];
  $_SESSION["join_date"] = $row['join_date'];
  $_SESSION["image"] = $row['image'];
  $_SESSION["resume"] = $row['resume'];
  
  
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> email:<?php echo $email;?></h1>
    <h1><?php echo $_SESSION["name"];?></h1>
    <h1><?php echo $_SESSION["phone"];?></h1>
    <h1><?php echo $_SESSION["join_date"];?></h1>
    <h1><?php echo $_SESSION["yoe"];?></h1>
    
    <img src="<?php echo  $_SESSION["image"] ; ?>" alt="">

</body>
</html>