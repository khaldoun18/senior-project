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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark   ">
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
                    <a style="padding-right: 3rem;" class="nav-link" href="">sign up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signin.php">Login</a>
                </li>

            </ul>
        </div>
    </nav>



    <div style="margin-bottom: 4rem; margin-top:4rem;" class="section-7">


        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="my-form">
                        <form action="#" method="POST" enctype="multipart/form-data">

                            <label class="la" for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required><br><br>


                            <label class="la" for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required><br><br>


                            <label class="la" for="phone">Phone Number:</label>
                            <input type="number" class="form-control" id="phone" name="phone" required><br><br>

                            <label class="la" for="name">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" required><br><br>



                           



                            <label for="gender">Gender:</label>
                            <input type="radio" id="male" name="gender" value="male" checked>
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label><br><br>

                            <label class="la" for="height">Height in meters:</label>
                            <input type="number" step="0.01" class="form-control" id="height" name="height" oninput="updateImage()" required><br><br>

                            <label class="la" for="weight">Weight in KG:</label>
                            <input type="number" step="0.01" class="form-control" id="weight" name="weight" oninput="updateImage()" required><br><br>

                            <label class="la" for="bmi">BMI</label>
                            <input type="number" step="0.01" class="form-control" id="bmi" name="bmi" oninput="updateImage()" required><br><br>

                            <label class="la" for="bmi">Date of Birth</label>
                            <input type="date"  class="form-control" id="dob" name="dob" placeholder="YYYY-MM-DD" required><br><br>

                            <label class="la" for="im">Profile picture</label>
                            <input type="File" class="a form-control" id="" name="image" required><br><br>


                            <input class="sub btn btn-outline-dark" type="submit" value="Submit">
                        </form>
                    </div>

                </div>

                <div class="col-md-6">
                    <img id="man" src="pics/man1-removebg-preview (1).png" alt="">
                </div>




            </div>
        </div>
    </div>




    <script>
        document.getElementById("bmi").addEventListener("click", function() {
            this.blur();
        });

        document.getElementById("male").addEventListener("click", function() {
            updateImage();
        });

        document.getElementById("female").addEventListener("click", function() {
            updateImage();
        });

        function updateImage() {
            var height = document.getElementById("height").value;
            var weight = document.getElementById("weight").value;
            var bmi = weight / (height * height);
            var z = document.getElementById("bmi");
            z.value = bmi.toFixed(2);

            var maleChecked = document.getElementById("male").checked;
            var femaleChecked = document.getElementById("female").checked;

            if (maleChecked) {
                if (bmi > 25) {
                    document.getElementById("man").src = "pics/man1.png";
                } else {
                    document.getElementById("man").src = "pics/man2.png";
                }
            } else if (femaleChecked) {
                if (bmi > 24) {
                    document.getElementById("man").src = "pics/woman1.png";
                } else {
                    document.getElementById("man").src = "pics/woman2.png";
                }
            }
        }
    </script>
    <script>
        const input = document.getElementById("phone");
        input.addEventListener("input", function() {
            const pattern = /^[0-9]{8}$/;
            if (!input.value.match(pattern)) {
                input.setCustomValidity("Please enter 8 digits");
            } else {
                input.setCustomValidity("");
            }
        });
    </script>



 
    <?php
    if (isset($_POST['name'])) {
        require_once "connection.php";
        require_once "validate.php";
        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $password="";
        $phone = validate($_POST['phone']);
        $address = validate($_POST['address']);
        $dob = $_POST['dob'];
        $mysql_dob = date('Y-m-d', strtotime($dob));
        
        $target = "userimage/";
        $target_file = $target . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_path = $target_file;
        $gender = validate($_POST['gender']);
        

       
    }
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
   
    $sql = "insert into client values (' ','$name', '$email', '$password', '$phone', '$address', NOW() , '0' , '$image_path','$gender','$mysql_dob')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('You are Registerd')</script>";
    } else {
        echo "<script>alert('The Email or the phone number is already used')</script>";
    }
    $select="select client_id from client where email='$email'";
    $result = $conn->query($select);

// Output the result
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    // Do something with the row data
     $client_id=$row["client_id"]; 
   
  }
} else {
  echo "No results found.";
}

    $height = validate($_POST['height']);
    $weight = validate($_POST['weight']);
    $sql = "insert into bmi values ('','$client_id','$height','$weight',NOW() )";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('You are Registerd')</script>";
    } else {
        echo "<script>alert('The Email or the phone number is already used')</script>";
    }

    mysqli_close($conn);




    ?>
</body>

</html>