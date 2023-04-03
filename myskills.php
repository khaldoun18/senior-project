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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark    ">
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
                     href="scheduleClient.php">My Schedule</a>
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
<div class="container">
              <h1>Fill the form below to help you in choosing yout level</h1>
                    <div class="my-form">
                    <div class="my-form">
    <form action="#" method="POST">
        <label class="la" for="courses">Name of Sport you want to register</label><br>
        <select name="courses" id="courses">
            <option value="kickboxing">Kickboxing</option>
            <option value="zumba">Zumba</option>
        </select><br><br>

        <label class="la" for="play">Have you ever played this sport before?</label><br>
        <input type="radio" name="play" value="yes" id="option1">
        <label for="option1">yes</label>

        <input type="radio" name="play" value="no" id="option2">
        <label for="option2">no</label>
        <br><br>

        <label class="la" for="years">If yes, how many years have you been playing?</label>
        <input type="number" class="form-control" id="years" name="years"><br><br>

        <label class="la" for="goal">What is your primary goal for playing this sport?</label><br>
        <select name="goal" id="goal">
            <option value="fitness">fitness</option>
            <option value="competitive">competitive</option>
        </select><br><br>

        <label class="la" for="dis">Do you have any injuries or health conditions that may affect your ability to play this sport?</label><br>
        <input type="radio" name="dis" value="yes" id="option3">
        <label for="option3">yes</label>

        <input type="radio" name="dis" value="no" id="option4">
        <label for="option4">no</label>
        <br><br>

        <input class="sub btn btn-outline-dark" type="submit" value="Submit">
    </form>
</div>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "connection.php";
    require_once "validate.php";
    $courses = validate($_POST['courses']);
    $play = validate($_POST['play']);
    $years = validate($_POST['years']);
    $goal = validate($_POST['goal']);
    $dis = validate($_POST['dis']);
    $client_id = $_SESSION["client_id"];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO class_request VALUES ('','$courses','$play','$goal','$dis','$client_id','$years')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('The form is sent')</script>";
    } else {
        echo "<script>alert('Something went wrong')</script>";
    }

    mysqli_close($conn);
}
?>

</body>
</html>