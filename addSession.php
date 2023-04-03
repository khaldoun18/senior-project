<?php
require_once "connection.php";

$name = $_POST['trainer_name'];
$client_id = $_POST['client_id'];
$trainer_id = $_POST['trainer_id'];
$class_dates = $_POST['class_dates'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

foreach ($class_dates as $class_date) {
    // Get the correct sport_id for the selected class date
    $sport_id_sql = "SELECT sport_id FROM sport WHERE trainer_id = $trainer_id AND class_date = '$class_date'";
    $sport_id_result = $conn->query($sport_id_sql);
    if ($sport_id_result && mysqli_num_rows($sport_id_result) > 0) {
        $sport_id_row = mysqli_fetch_assoc($sport_id_result);
        $sport_id = $sport_id_row['sport_id'];
    } else {
        echo "An error occurred while getting the sport_id for $class_date";
        continue; // Skip this iteration of the loop
    }

    // Check if the client is already registered for this sport
    $sql1 = "SELECT * FROM sport_client WHERE client_id = $client_id AND sport_id = $sport_id or class_date = '$class_date'";
    $result1 = $conn->query($sql1);
    if ($result1 && mysqli_num_rows($result1) > 0) {
        echo "You can't register for the same class twice";
    } else {
        // Check if the selected class date is already full
        $sql2 = "SELECT * FROM sport_client WHERE class_date = '$class_date'";
        $result2 = $conn->query($sql2);
        if ($result2 && mysqli_num_rows($result2) >= 1) { // Assuming there is a maximum of 10 clients per class
            echo "Sorry, the class on $class_date is already full";
        } else {
            // Insert the registration into the sport_client table
            $sql = "INSERT INTO sport_client VALUES (NULL, $client_id, $sport_id, '$class_date', $trainer_id)";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('You are registered for $class_date')</script>";
            } else {
                echo "<script>alert('An error occurred while registering for $class_date')</script>";
            }
        }
    }
}

mysqli_close($conn);

// Redirect the user back to the original page
header('Location: userPage.php');
exit;
