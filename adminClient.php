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
                <h1>Client request</h1>
                <table>


                <?php
$sql = "SELECT * FROM client where approved = 0";
$result = $conn->query($sql);

if ($result && mysqli_num_rows($result) > 0) {
    // If there are rows, show the table header and start the table body
    echo '<table class="table table-bordered">
            <thead>
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
                    <th>Add</th>
                    <th>Reject</th>
                </tr>
            </thead>
            <tbody>';

    // Loop through the query results and display each row
    foreach ($result as $row) {
        echo '<tr>
                <td><img src="' . $row['image'] . '" alt=""></td>
                <td>' . $row['client_id'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['phone'] . '</td>
                <td>' . $row['address'] . '</td>
                <td>' . $row['join_date'] . '</td>
                <td>' . $row['approved'] . '</td>
                <td>' . $row['gender'] . '</td>
                <td>
                    <form method="post" action="addClient.php">
                        <input type="hidden" name="client_id" value="' . $row['client_id'] . '">
                        <input type="hidden" name="name" value="' . $row['name'] . '">
                        <input type="hidden" name="email" value="' . $row['email'] . '">
                        <input type="hidden" name="phone" value="' . $row['phone'] . '">
                        <input type="hidden" name="password" value="' . $row['password'] . '">
                        <input type="hidden" name="gender" value="' . $row['gender'] . '">
                        <input type="hidden" name="approved" value="' . $row['approved'] . '">
                        <input type="hidden" name="join_date" value="' . $row['join_date'] . '">
                        <input type="hidden" name="image" value="' . $row['image'] . '">
                        <button type="submit" name="submit" class="btn btn-success">Add</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="deleteClient.php">
                        <input type="hidden" name="client_id" value="' . $row['client_id'] . '">
                        <button type="submit" name="submit" class="btn btn-danger">Reject</button>
                    </form>
                </td>
            </tr>';
    }

    // Close the table body and table
    echo '</tbody></table>';
} else {
    // If there are no rows, display a message
    echo "There are no requests.";
}
?>




            </div>

        </div>

</body>

</html>