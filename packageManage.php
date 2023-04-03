
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Tiger House</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-primary logout-btn" href="index.php">Logout</a>
                    <!-- Add "btn" and "btn-primary", remove "nav-link" -->
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="wrapper">

   
<div class="sidebar">

<ul>
                <li>
                    <a class="btn btn-secondary" href="admin.php">
                        <img src="icon/dashboard.png" alt="Dashboard" width="20" height="20" class="me-2">
                        Dashboard
                    </a>
                </li>


                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="icon client"></i> Clients
                    </button>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="adminClient.php">Clients requests</a></li>
    <li><a class="dropdown-item" href="adminClientActive.php">Active Clients</a></li>
    <li><a class="dropdown-item" href="adminClientInActive.php">In Active Clients</a></li>
    <li><a class="dropdown-item" href="adminClientBlock.php">Blocked Clients</a></li>
    <li><a class="dropdown-item" href="adminClientReject.php">Rejected Clients</a></li>
  </ul>
</div>

<div class="dropdown"><br><br>
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="icon trainers"></i> Trainers
    </button>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="adminTrainer.php">Trainers requests</a></li>
    <li><a class="dropdown-item" href="adminTrainerActive.php">Active Trainers</a></li>
    <li><a class="dropdown-item" href="adminTrainerInActive.php">In Active Trainers</a></li>
    <li><a class="dropdown-item" href="adminTrainerBlock.php">Blocked Trainers</a></li>
    <li><a class="dropdown-item" href="adminTrainerReject.php">Rejected Trainer</a></li>
  </ul>
</div>

       
<li><br><br>
                    <a class="btn btn-secondary" href="manageplans.php">
                        <img src="icon/membershipplan.png" alt="Membership Plan" class="btn-icon-membership">
                        Membership Plans
                    </a>
                </li>


                <li>
                    <a class="btn btn-secondary" href="#">
                        <img src="icon/schedule.png" alt="Schedules" class="btn-icon-schedule">
                        Schedules
                    </a>
                </li>

                <li>
                    <a class="btn btn-secondary" href="#">
                        <img src="icon/settings.png" alt="Settings" class="btn-icon-settings">
                        Settings
                    </a>
                </li>

            </ul>
</div>

<div class="main-content">
<h1>admin</h1>
   
</div>

</div>
<div class="package">
  
<div class="container">
  <form method="post" action="packageManagefinal.php" class="my-form">
    <div class="form-group hidden">
      <input type="hidden" class="form-control" name="package_id" value="<?php echo $_POST['package_id']; ?>">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" name="price">
    </div>
    <div class="form-group">
      <label for="sessions">Sessions:</label>
      <input type="number" class="form-control" id="sessions" name="sessions">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="package_description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>


</div>
</div>
</body>

</html>