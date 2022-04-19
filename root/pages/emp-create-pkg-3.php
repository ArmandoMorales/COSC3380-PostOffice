<?php
    include("../includes/dbh.inc.php");
?>

<section class="header">
    <?php
    include_once '../header.php';
    ?>
</section>

<?php 
    // collect information from where they are sending the package to

    $publish_date = date("Y-m-d H:i:s");
    $sqlSend1 = "INSERT INTO Tracking (Package_ID, DateArrived, DateSent, Tracking_Office_ID)
                    VALUES (?,?,?,?);";
    $stmtSend1 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmtSend1, $sqlSend1))
    {
        header("location: ../pages/index-login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmtSend1, "issi", $_SESSION['packageIDglobal'], $publish_date, $publish_date, $_SESSION["officeID"]);
    mysqli_stmt_execute($stmtSend1);

    //Destroys session variable
    unset($_SESSION['packageIDglobal']);

    // redirect to emp-create-pkg-1.php incase they'd like to repeat all of this with a new user.
    echo "<script> location.href='emp-create-pkg-1.php'; </script>";
    exit;
?>