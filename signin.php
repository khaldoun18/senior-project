     <?php
        session_start();

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
         <link rel="stylesheet" href="signup.css">
         <title>Document</title>
     </head>

     <body>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark   navbar-fixed-top ">
             <a class="navbar-brand" href="index.php">Tiger House</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse " id="navbarSupportedContent">
                 <ul class="navbar-nav ms-auto">
                     <li class="nav-item">
                         <a style="padding-right: 3rem;" class="nav-link" href="aboutUs.php">About Us</a>
                     </li>

                     <li class="nav-item">
                         <a style="padding-right: 3rem;" class="nav-link" href="howWeHire.php">How we hire</a>
                     </li>
                     <li class="nav-item">
                         <a style="padding-right: 3rem;" class="nav-link" href="signup.php">sign up</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="">Login</a>
                     </li>

                 </ul>
             </div>
         </nav>
         <div class="login">
             <div class="container">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="my-form">
                             <form action="#" method="POST">

                                 <label class="la" for="email">Email:</label>
                                 <input type="email" class="form-control" id="email" name="email" required><br><br>

                                 <label class="la" for="password">Password:</label>
                                 <input type="password" class="form-control" id="password" name="password" required><br><br>

                                 <input class="sub btn btn-outline-dark" type="submit" value="LOG IN">
                             </form>
                         </div>

                     </div>

                     <div class="col-md-6">
                         <img class="img-login" src="pics/boxing-gloves.png" alt="">
                     </div>

                 </div>
             </div>
         </div>

         <?php
         error_reporting(0);
            if (isset($_POST['email'])) {
                require_once "connection.php";
                require_once "validate.php";

                $email = validate($_POST['email']);

                $password = validate($_POST['password']);


                $sqlAdmin = "select * from admin where admin_email='$email' and password='$password'";
                $result = $conn->query($sqlAdmin);

                if ($result->num_rows > 0) {


                    $_SESSION["admin_email"] = $_POST["email"];
                    if (isset($_SESSION["admin_email"])) {
                        header("Location: admin.php");
                        exit;
                    }
                    echo "<script>alert('You are Registerd')</script>";
                } else {
                    echo "<script>alert('Wrong email or password ')</script>";
                }

                $sqlt = "select * from trainer where trainer_email='$email' and password='$password' and approved='1'";

                $result = $conn->query($sqlt);
                if ($result->num_rows > 0) {
                    $_SESSION["trainer_email"] = $_POST["email"];
                    if (isset($_SESSION["trainer_email"])) {
                        header("Location: trainerPage.php");
                        exit;
                    }
                    echo "<script>alert('logged in')</script>";
                } else {
                    echo "<script>alert('Wrong email or password ')</script>";
                }
            

                $sql = "select * from client where email='$email' and password='$password' and approved='1'";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $_SESSION["email"] = $_POST["email"];
                    if (isset($_SESSION["email"])) {
                        header("Location: userPage.php");
                        exit;
                    }
                    echo "<script>alert('You are Registerd')</script>";
                } else {
                    echo "<script>alert('Wrong email or password ')</script>";
                }
            }

            session_destroy();
            ?>
     </body>

     </html>