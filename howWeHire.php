<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Tiger House</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="aboutUs.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="howWeHire.php">How we hire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">sign up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signin.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    </div>


    <div class="hire">
        <div class="container">
            <h1 style="text-align: center;"></h1>How We Hire</h1>
            <div class="l">
                <ol>
                    <li class="m">
                        <h2>At least 4 years of experience as a personal trainer</h2>
                    </li>
                    <li class="m">
                        <h2>Strong communication skills to effectively work with clients</h2>
                    </li>
                    <li class="m">
                        <h2>Positive and friendly demeanor, always with a smile</h2>
                    </li>
                    <li class="m">
                        <h2>Extensive knowledge of kickboxing techniques and strikes</h2>
                    </li>
                    <li class="m">
                        <h2>Ability to design and deliver effective training programs for clients with different goals
                            and abilities</h2>
                    </li>
                </ol>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user fa-spin icon-user"
                                                style="color: #ff7f50;"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="fname"
                                        placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope fa-spin icon-envelope" style="color: #ff7f50;"></i></span>
                                    </div>
                                    <input type="email " class="form-control" id="trainer_email" name="trainer_email"
                                        placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone fa-spin icon-phone" style="color: #ff7f50;"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="phone" name="phone" pattern="[0-9]{8}"
                                        placeholder="Phone Number" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt fa-spin icon-calendar" style="color: #ff7f50;"></i></span>
                                    </div>
                                    <input type="date" class="form-control" id="dob" name="trainer_dob"
                                        placeholder="YYYY-MM-DD" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Specialization">Specialization:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-briefcase fa-spin icon-briefcase" style="color: #ff7f50;"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="Specialization" name="Specialization"
                                        placeholder="Specialization" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ex">Years of Experience:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"> 
                                        <span class="input-group-text"><i class="fas fa-history fa-spin icon-history" style="color: #ff7f50;"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="ex" name="ex"
                                        placeholder="Years of Experience" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Profile Picture:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image fa-spin icon-image" style="color: #ff7f50;"></i></span>
                                    </div>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="weight">Cover Letter:</label>
                                <textarea name="cover" class="form-control" id="weight" rows="5"
                                    placeholder="Cover Letter" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="resume">Resume:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-alt fa-spin icon-file" style="color: #ff7f50;"></i></span>
                                    </div>
                                    <input type="file" class="form-control custom-file-input" id="resume" name="resume"
                                        required>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary submit-button"><i
                                        class="fas fa-paper-plane fa-spin"></i>Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
    function generatePassword(length) {
        // Define all possible characters that can be used in the password
        const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@_";

        let password = "";
        for (let i = 0; i < length; i++) {
            // Pick a random character from the chars string
            const randomIndex = Math.floor(Math.random() * chars.length);
            const randomChar = chars.charAt(randomIndex);

            // Add the random character to the password
            password += randomChar;
        }

        return password;
    }

    document.addEventListener("DOMContentLoaded", () => {
        const passwordInput = document.getElementById("password");
        const password = generatePassword(10); // Generate a password with 10 characters
        passwordInput.value =
            password; // Set the value of the hidden input element to the generated password
    });
    </script>

    </center>




    <div class="section-6">

        <h2 style="padding-bottom: 4rem;">Feel free to contact us!!</h2>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                <h3>+961/70545492</h3>
                    <h3>+961/70820049</h3>
                </div>
                <div class="col-sm-6">
                <h3>Tigerhouse775@gmail.com</h3>
                </div>
            </div>
        </div>
    </div>


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

    if (isset($_POST['fname'])) {
        require_once "connection.php";
        require_once "validate.php";
        $name = validate($_POST['fname']);
        $email = validate($_POST['trainer_email']);
        $phone = validate($_POST['phone']);
        $specialization = validate($_POST['Specialization']);
        $yoe = validate($_POST['ex']);
        $coverletter = validate($_POST['cover']);

        $target = "trainerpic/";
        $target_file = $target . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_path = $target_file;
        $password = "";
        $target1 = "resume/";
        $target_file1 = $target1 . basename($_FILES["resume"]["name"]);
        move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file1);
        $image_path1 = $target_file1;
        $dob = $_POST['trainer_dob'];
        $mysql_dob = date('Y-m-d', strtotime($dob));
      
    }

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $select = "SELECT trainer_id FROM trainer WHERE trainer_email='$email' OR phone='$phone'";
    $result = $conn->query($select);
    $flag = 0;

    if ($result->num_rows > 0) {
        echo "<script>alert('The Email or the phone number is already in use')</script>";
        exit;
    }

    $sql = "INSERT INTO trainer VALUES (' ','$name', '$email',  '$password','$specialization', '0','$yoe',  '$coverletter','$image_path1','$image_path','$phone', NOW(),'$mysql_dob')";

    if (mysqli_query($conn, $sql)) {
        $flag = 1;
        echo "<script>alert('form is sent!')</script>";
    } else {
        echo "<script>alert('Something went wrong')</script>";
    }

    

    mysqli_close($conn);
    ?>
</body>

</html>