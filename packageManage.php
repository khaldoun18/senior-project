
<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
  header("Location: signin.php");
  exit;
 
}

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
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">

   
<div class="sidebar">

  <ul>
    <li><a href="admin.php">Dashboard</a></li>
   
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   Clients
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="adminClient.php">Clients requests</a></li>
    <li><a class="dropdown-item" href="adminClientActive.php">Active Clients</a></li>
    <li><a class="dropdown-item" href="adminClientInActive.php">In Active Clients</a></li>
    <li><a class="dropdown-item" href="adminClientBlock.php">Blocked Clients</a></li>
    <li><a class="dropdown-item" href="adminClientReject.php">Rejected Clients</a></li>
  </ul>
</div>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   Trainers
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="adminTrainer.php">Trainers requests</a></li>
    <li><a class="dropdown-item" href="adminTrainerActive.php">Active Trainers</a></li>
    <li><a class="dropdown-item" href="adminTrainerInActive.php">In Active Trainers</a></li>
    <li><a class="dropdown-item" href="adminTrainerBlock.php">Blocked Trainers</a></li>
    <li><a class="dropdown-item" href="adminTrainerReject.php">Rejected Trainer</a></li>
  </ul>
</div>
    <li><a href="adminTrainer.php">Trainers</a></li>
    <li><a href="membershipPlans.php">Membership Plans</a></li>
    <li><a href="#">Schedules</a></li>
    <li><a href="#">Settings</a></li>
    <li><a href="manageplans.php">Manage Plans</a></li>
  </ul>
</div>
<div class="main-content">
<h1>admin</h1>
   
</div>

</div>
<div class="package">

<form  method="post" action="packageManagefinal.php">
  <div class="hidden">
  <input type="hidden" name="package_id" value="<?php echo $_POST['package_id']; ?>">
 
  
  </div>
  <label for="price">Price: </label>
  <input type="number"  name="price" ><br><br>
  <label for="sessions">Sessions: </label>
  <input type="number" name="sessions" ><br><br>
  <label for="description">Description: </label>
  <input type="text"  name="package_description" ><br><br>
  

  

 

   <button type="submit" name="submit">submit</button>
 </form>


</div>
</div>
</body>

</html>