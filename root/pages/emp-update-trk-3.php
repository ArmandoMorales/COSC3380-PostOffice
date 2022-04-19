<?php
    include("../includes/dbh.inc.php");
?>

<section class="sub-header">
    <?php
    include_once '../header.php';
    ?>
</section>
<?php 
    // collect the Enter Current Post Office and Enter Date from the form who called up trk-2.php
    // redirect back to trk-1.php incase they'd like to update another id's

    $nextPackageID = $_POST['nextPO'];

    if (isset($nextPackageID) && $nextPackageID !==""){
        
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
    }

    else{
        
    $updatesql = "UPDATE Package 
                    SET Recieved = 1
                    WHERE Package_ID = ?;";
    $stmtUpdate = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmtUpdate, $updatesql))
    {
        header("location: ../pages/index-login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmtUpdate, "i", $_SESSION['packageIDglobal']);
    mysqli_stmt_execute($stmtUpdate);
    
    echo '<script type ="text/JavaScript">';
    echo 'alert("Package has been marked for delivery.")';
    echo '</script>';


    }

    

    //Destroys session variable
    unset($_SESSION['packageIDglobal']);
    echo "<script> location.href='emp-update-trk-1.php'; </script>";
    exit;
?>