<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: signin.php");
  exit;
}

require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/f4895fe1cd.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <a class="navbar-brand" href="userPage.php">Tiger House</a>
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
     data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
     aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse " id="navbarSupportedContent">
     <ul class="navbar-nav ms-auto">
        <li class="nav-item">
        <li class="nav-item">
             <a style="padding: 2rem ;" class="nav-link"
                 href="myskills.php">My Skills</a>
         </li> 
     <li class="nav-item">
             <a style="padding: 2rem ;" class="nav-link"
                 href="">My Schedule</a>
         </li>
      
        
         <li class="nav-item">
         <div class="dropdown">
<button class="btn dropdown-toggle profile-logo" type="button" data-bs-toggle="dropdown" aria-expanded="false">
<img src="<?php echo  $_SESSION["image"] ; ?>">
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

<h1>Classes in progress </h1>

<table class="table table-bordered">
       
        
       <!-- Use a loop to iterate over the result set and display each row in a table row -->
       <?php

$sql = "SELECT sport_client.*, trainer.*, sport.*
        FROM sport_client
        INNER JOIN trainer ON trainer.trainer_id = sport_client.trainer_id
        INNER JOIN sport ON sport.trainer_id = trainer.trainer_id AND sport.sport_id = sport_client.sport_id
        WHERE sport_client.client_id = '{$_SESSION['client_id']}'
        ORDER BY class_time";


$result = $conn->query($sql);
if ($result && mysqli_num_rows($result) > 0) {

  echo "<thead>
           <tr>
               <th>date and time </th>
               <th>Sport name</th>
               <th>trainer</th>
            
          
           </tr>
         </thead>";
         ?>
          <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
           


          <tr>


          <td><?php echo $row['class_date']; ?></td>
           <td><?php echo $row['sport_name']; ?></td>
           <td><?php echo $row['trainer_name']; ?></td>
          
          </tr>

                   
                  </div>
              </div>
              <?php endwhile; ?>
          </div>
          <?php } else {
  echo "No classes registered";
} ?>
   </tbody>
</table>

</body>
</html>

</body>
</html>