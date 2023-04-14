<?php
session_start();
if (!isset($_SESSION["admin_email"])) {
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
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
    <style>
  table {
  border-collapse: separate;
  border-spacing: 0; /* Add space between rows */
  width: 100%;
}

th, td {
  padding: 8px;
  border: 1px solid #dee2e6; /* Add border to table cells */
}

thead {
  background-color: #6c757d;
  color: white;
}

tbody tr:nth-child(odd) {
  background-color: #f8f9fa;
}

tbody tr:hover {
  background-color: #dee2e6;
}

.table {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.main-content {
  margin-top: 50px;
}
.img-thumbnail {
  max-width: 100px;
  max-height: 100px;
}


/* Remove border on top of the button */
.table td .btn {
  border-top: none !important;
}
</style>
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

 
                <div class="dropdown"><br>
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
  <li><a class="dropdown-item" href="clientClassRequest.php">Class Request</a></li>
</ul>
</div>

<div class="dropdown"><br><br>
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="icon trainers"></i> Trainers
                    </button>

<ul class="dropdown-menu">
  <li><a class="dropdown-item" href="adminTrainer.php">Trainers requests</a></li>
  <li><a class="dropdown-item" href="adminTrainerActive.php">Active Trainers</a></li>
  <li><a class="dropdown-item" href="adminTrainerInActive.php">In Active Trainers</a></li>
  <li><a class="dropdown-item" href="adminTrainerBlock.php">Blocked Trainers</a></li>
  <li><a class="dropdown-item" href="adminTrainerReject.php">Rejected Trainer</a></li>
  <li><a class="dropdown-item" href="adminClassApprove.php">Class approve</a></li>
</ul>
</div>
<li><br><br>
  <a class="btn btn-secondary" href="manageplans.php">
    <img src="icon/membershipplan.png" alt="Membership Plan" class="btn-icon-membership">
    Membership Plans
  </a>
</li>


<li><br>
  <a class="btn btn-secondary" href="allSchedule.php">
    <img src="icon/schedule.png" alt="Schedules" class="btn-icon-schedule">
    Schedules
  </a>
</li>

<li><br>
  <a class="btn btn-secondary" href="#">
    <img src="icon/settings.png" alt="Settings" class="btn-icon-settings">
    Settings
  </a>
</li>
</ul>
</div>
<div class="main-content">
    <h1>Rejected Clients</h1>
   
<div class="table-responsive">
                <table class="table table-striped table-bordered">
        
            <!-- Use a loop to iterate over the result set and display each row in a table row -->
            <?php
    
     $sql = "SELECT * FROM client where approved = 4";
     $result=$conn->query($sql);
     if ($result && mysqli_num_rows($result) > 0) {
        // if there are rows, show the table header
        echo "<thead>
                <tr>
                    <th>image</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Join Date</th>
                    <th>Approved</th>
                    <th>gender</th>
                </tr>
              </thead>";
    }
    else{
        echo" there is no rejected clients";
    }?>
   
    <tbody>
    <?php 
    foreach($result as $row): ?>
            <tr>
                <td><img src="<?php echo $row['image']; ?>" alt="" class="img-thumbnail"> </td>
                <td><?php echo $row['client_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['join_date']; ?></td>
                <td><?php echo $row['approved']; ?></td>
                <td><?php echo $row['gender']; ?></td>
             
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>





</div>

</div>

</body>

</html>