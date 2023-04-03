<?php
session_start();
if (!isset($_SESSION["trainer_email"])) {
  header("Location: signin.php");
  exit;
}
$email = $_SESSION["trainer_email"];
require_once "connection.php";
require_once"validate.php";
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

<div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">


            <form action="offer.php" method="POST" enctype="multipart/form-data">           

                            <div class="form-group">
                                <label for="courses">Course:</label>
                                <select name="courses" id="courses" class="form-control" required><br>
                                    <option value="kickboxing">Kickboxing</option>
                                    <option value="zumba">Zumba</option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label for="courselevel">Course Level:</label>
                                <select name="courselevel" id="courselevel" class="form-control" required><br>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label for="days">Class Day:</label>
                                <select name="days" id="days" class="form-control" required><br>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label for="hours">Class hours:</label>
                                <select class="form-control" name="hours" id="hours">
                                    <option value="8:00:00">8:00-9:30 AM</option>
                                    <option value="9:30:00">9:30-11:00 AM</option>
                                    <option value="17:00:00">5:00-6:30 PM</option>
                                    <option value="18:30:00">6:30-8:00 PM</option>
                                    <option value="20:00:00">8:00-9:30 PM</option>
                                </select>
                            </div>
                    </div>
                </div><br>

                <div class="form-group">
                    <input class="btn btn-outline-dark" type="submit" value="Submit Form">
                    </form> 
                </div>
              
            </div>

         

         
</body>
</html>