<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: signin.php");
  exit;
}

require_once "connection.php";

// Prepare the SQL statement with a parameterized placeholder for the email
$sql = "SELECT * FROM client WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION["email"]);
$stmt->execute();

if ($result = $stmt->get_result()) {
  // Retrieve the data from the first row
  $row = $result->fetch_assoc();

  $_SESSION["client_id"] = $row['client_id'];
  $_SESSION["name"] = $row['name'];
  $_SESSION["phone"] = $row['phone'];
  $_SESSION["join_date"] = $row['join_date'];
  $_SESSION["image"] = $row['image'];
  $_SESSION["gender"] = $row['gender'];
  $_SESSION["address"] = $row['address'];
  $_SESSION["client_dob"] = $row['client_dob'];
}
$client_id=  $_SESSION["client_id"];
require_once "connection.php";
$sql = "SELECT * FROM bmi WHERE client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",  $_SESSION["client_id"]);
$stmt->execute();

if ($result = $stmt->get_result()) {
  // Retrieve the data from the first row
  $row = $result->fetch_assoc();
  $_SESSION["bmi_id"] = $row['bmi_id'];
  $_SESSION["height"] = $row['height'];
  $_SESSION["weight"] = $row['weight'];
}

// Close the prepared statement and database connection
$stmt->close();

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
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="userPage.php">Tiger House</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                    <h1>User Name: <?php echo"{$_SESSION["name"]}";?></h1>
                </li>
                <li class="nav-item">
                    <a style="padding: 2rem ;" class="nav-link" href="myskills.php">My Skills</a>
                </li>
                <li class="nav-item">
                    <a style="padding: 2rem ;" class="nav-link" href="scheduleClient.php">My Schedule</a>
                </li>

                <li class="nav-item">
  <div class="dropdown">
    <button class="btn dropdown-toggle profile-logo" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   <img src="<?php echo $_SESSION["image"]; ?>" >
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
      <li><a class="dropdown-item" href="userAccount.php">My account</a></li>
      <li><a class="dropdown-item" href="clientChangePassword.php">Change password</a></li>
      <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
      <li><a class="dropdown-item" href="">Payments</a></li>
    </ul>
  </div>
</li>

        </div>


    </nav>

    <div class="section-1">
        <h1>Welcome <?php echo $_SESSION["name"]; ?> to our club !!</h1>
    </div>

    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                <tbody>
                    <!-- Use a loop to iterate over the result set and display each row in a table row -->
                    <?php
     require_once "connection.php";
     $sql = "SELECT * FROM bmi where client_id='$client_id'";
     $result=$conn->query($sql);
     if ($result && mysqli_num_rows($result) > 0) {
        // if there are rows, show the table header
        echo "<thead>
                <tr>
                <th>Height</th>
                <th>Weight</th>
                <th>Date</th>
                
                </tr>
              </thead>";
     }
     else{
        echo" there is no Active Trainers";
     }?>

                <tbody>
                    <?php 
    foreach($result as $row): ?>
                    <tr>
                       
                        <td><?php echo $row['height']; ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                       

                       

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

</body>

</html>