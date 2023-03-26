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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand">Tiger House</a>
        <form class="form-inline ml-auto" action="index.php">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </nav>
    
    <div class="wrapper">


        <div class="sidebar">

        <ul>
                <li><a href="admin.php">Dashboard</a></li>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
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

                <div class="dropdown"><br>
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Trainers
                    </button>
                    <ul class="dropdown-menu"><br>
                        <li><a class="dropdown-item" href="adminTrainer.php">Trainers requests</a></li>
                        <li><a class="dropdown-item" href="adminTrainerActive.php">Active Trainers</a></li>
                        <li><a class="dropdown-item" href="adminTrainerInActive.php">In Active Trainers</a></li>
                        <li><a class="dropdown-item" href="adminTrainerBlock.php">Blocked Trainers</a></li>
                        <li><a class="dropdown-item" href="adminTrainerReject.php">Rejected Trainer</a></li>
                    </ul>
                </div><br>
                <li><a href="adminTrainer.php">Trainers</a></li>
                <li><a href="manageplans.php">Membership Plans</a></li>
                <li><a href="#">Schedules</a></li>
                <li><a href="#">Settings</a></li>

            </ul>
        </div>
        <div class="main-content">
            <h1>admin</h1>

        </div>

    </div>
    <div class="package">





        <div class="container">
            <div class="card-group">
                <?php 
  require_once "connection.php";
  $sql = "SELECT * FROM package ";
  $result = $conn->query($sql);
  if ($result && mysqli_num_rows($result) > 0) {
  ?>

                <div class="card-container">
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="card-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <h4 class="card-title"><?php echo $row['price'];?>$</h4><br><br>
                                    <hr>
                                </center>
                                <p class="card-text">In this package we offer <?php echo $row['sessions'];?> sessions
                                </p><br><br>
                                <hr>
                                <p class="card-text"><?php echo $row['package_description'];?></p>
                            </div>
                        </div>
                        <div class="button-container">
                            <form method="post" action="packageManage.php">
                                <div class="hidden">
                                    <input type="hidden" name="package_id" value="<?php echo $row['package_id']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                    <input type="hidden" name="sessions" value="<?php echo $row['sessions']; ?>">
                                    <input type="hidden" name="package_description"
                                        value="<?php echo $row['package_description']; ?>">
                                </div>
                                <button type="submit" name="submit">manage</button>
                            </form>
                            <form method="post" action="deletePackage.php">
                                <input type="hidden" name="package_id" value="<?php echo $row['package_id']; ?>">
                                <button type="submit" name="submit">delete</button>
                            </form>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>

                <?php } else {
    echo "No trainers right now";
  } ?>
            </div>




            <div class="col-md-4">
                <form method="post" action="addPackage.php">
                    <br><br><br>
                    <label for="">Price:</label>
                    <input type="number" name="price"><br><br>
                    <label for="">Sessions:</label>
                    <input type="number" name="sessions"><br><br>
                    <label for="">Description:</label>
                    <input type="text" name="package_description"><br><br>










                    <button type="submit" name="submit">add</button>
                </form>
            </div>
        </div>
    </div>


    </div>
</body>

</html>