<html>
<head>
<!-- edit the user's info, then display their information again, which should reflect changes -->
<?php
    $host = "uhpost.xyz";
    $username = "armando";
    $password = "Team10server";
    $database = "PostOffice";

    // uncomment this to allow you to pull the info from the form and update name based on sessionName person
    /*
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $pnumber = $_POST['phone-number'];

    // TODO: change this. i'm assuming Cornifer is logged in and wants to edit their information.
    $sessionName = "Corniferrr";
    
    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_error) {
        die("failed to connect: ".$mysqli->connect_error);
    }

    // if they entered a name to be edited
    if (isset($fname)) {
        if (!$mysqli->query("UPDATE Employee SET First_Name = '$fname' WHERE First_Name = '$sessionName';")) {
            echo "QUERY FAILED";
        }
    }

    $mysqli->close();
    */

    // after gathering form info we'll go back to main page where you can see your profile to see the results.
    echo "<script> location.href='customer-services.php'; </script>";
    exit;
?>