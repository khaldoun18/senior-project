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

            <h1>Active Clients</h1>

            <table>


                <!-- Use a loop to iterate over the result set and display each row in a table row -->

<table class="table table-bordered">
    <?php
    $sql = "SELECT * FROM client where approved = 1";
    $result=$conn->query($sql);
    if ($result && mysqli_num_rows($result) > 0) {
        // if there are rows, show the table header
        echo "<thead>
                  <tr>
                      <th>Image</th>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Join Date</th>
                      <th>Approved</th>
                      <th>Gender</th>
                      <th>Inactive</th>
                      <th>Block</th>
                  </tr>
              </thead>";
    }
    else{
        echo "<thead>
                  <tr>
                      <th colspan='11' class='text-center'>There is no Active Clients</th>
                  </tr>
              </thead>";
    }
    ?>

    <tbody>
        <?php foreach($result as $row): ?>
            <tr>
                <td><img src="<?php echo $row['image']; ?>" alt=""></td>
                <td><?php echo $row['client_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['join_date']; ?></td>
                <td><?php echo $row['approved']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td>
                    <form method="post" action="inActiveClient.php">
                        <input type="hidden" name="client_id" value="<?php echo $row['client_id']; ?>">
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                        <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">
                        <input type="hidden" name="password" value="<?php echo $row['password']; ?>">
                        <input type="hidden" name="gender" value="<?php echo $row['gender']; ?>">
                        <input type="hidden" name="approved" value="<?php echo $row['approved']; ?>">
                        <input type="hidden" name="join_date" value="<?php echo $row['join_date']; ?>">
                        <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Inactive</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="blockclient.php">
                        <input type="hidden" name="client_id" value="<?php echo $row['client_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-warning btn-sm">Block</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


        </div>

    </div>

</body>

</html>