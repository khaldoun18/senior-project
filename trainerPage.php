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
  $_SESSION["name"] = $row['trainer_name'];
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark    ">



<a class="navbar-brand" href="trainerPage.php">Tiger House</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        <li class="nav-item">
            <a style="padding: 2rem ;" class="nav-link" href="offering.php">Offering</a>
        </li>
        <li class="nav-item">
            <a style="padding: 2rem ;" class="nav-link" href="scheduleTrainer.php">My Schedule</a>
        </li>


        <li class="nav-item">
            <div class="dropdown">
                <button class="btn dropdown-toggle profile-logo" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="<?php echo  $_SESSION["image"]; ?>">
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="userAccount.php">My account</a></li>
                    <li><a class="dropdown-item" href="">Change password</a></li>
                    <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
                    <li><a class="dropdown-item" href="">Payments</a></li>

                </ul>
            </div>
        </li>


</div>


</nav>




    <h1> email:<?php echo $email;?></h1>
    <h1><?php echo $_SESSION["name"];?></h1>
    <h1><?php echo $_SESSION["phone"];?></h1>
    <h1><?php echo $_SESSION["join_date"];?></h1>
    <h1><?php echo $_SESSION["yoe"];?></h1>
    
    <img src="<?php echo  $_SESSION["image"] ; ?>" alt="">

</body>
</html>