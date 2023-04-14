<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: signin.php");
  exit;
}
$client_id=$_SESSION["client_id"];
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                    <h2>User Name: <?php echo"{$_SESSION["name"]}";?></h2>
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
      <img src="<?php echo $_SESSION["image"]; ?>">
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


  
    <div class="container">
    <div class="form-container">
        <h1 class="text-center mb-4">Profile image:<img src="<?php echo  $_SESSION["image"] ; ?>" alt=""></h1>
        <form action="#" method="POST" onsubmit="return validatePassword();">
            <div class="mb-3">
                <label for="cPassword" class="form-label">Current Password:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock fa-beat-fade"></i></span>
                    <input type="password" class="form-control" id="cPassword" name="cPassword" placeholder="Please Enter Your Current Password" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="nPassword" class="form-label">New Password:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock fa-beat-fade"></i></span>
                    <input type="password" class="form-control" id="nPassword" name="nPassword" placeholder="Please Enter Your New Password" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="check" class="form-label">Re-type Password:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock fa-beat-fade"></i></span>
                    <input type="password" class="form-control" id="check" name="check" placeholder="Please Re-type Your New Password" required>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-coral submit-button"><i class="fas fa-paper-plane"></i> Submit</button>
            </div>
        </form>
    </div>
</div>
       
    </div>
    <script>
    function validatePassword() {
        var newPassword = document.getElementById("nPassword").value;
        var check = document.getElementById("check").value;
        
        // check if passwords match
        if (newPassword != check) {
            alert("Passwords do not match.");
            return false;
        }
        
        // check password strength (at least 8 characters, at least 1 uppercase letter, at least 1 lowercase letter, and at least 1 number)
      
        
        return true;
    }
</script>

<?php 
   require_once "connection.php";
   require_once "validate.php";
if (isset($_POST['cPassword'])) {
 
    $cPassword = validate($_POST['cPassword']);
    $nPassword = validate($_POST['nPassword']);
    $check = validate($_POST['check']);
   
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select = "SELECT * FROM client WHERE password='$cPassword' and client_id='$client_id' ";
$result = $conn->query($select);
$flag = 0;

if ($result->num_rows > 0) {
   
    $sql = "UPDATE client SET password = '$nPassword' where client_id='$client_id' ";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Your Password Have Changed')</script>";
    } else {
        echo "<script>alert('Your Password Haven't Changed There Is An Error Please Try Again')</script>";
    }
    
    
    mysqli_close($conn);
    
    // Redirect the user back to the original page

    exit;
}


?>
</body>

</html>