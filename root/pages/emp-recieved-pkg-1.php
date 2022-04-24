<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Self Services</title>
<link rel="stylesheet" href="../css/employee-services.css">
<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,600,700&display=swap" rel="stylesheet">
<!-- icons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
    include("../includes/dbh.inc.php");
?>

<section class="sub-header">
    <?php
    include_once '../header.php';
    ?>
</section>
    <!--
    <section class="sub-header">
        <nav>
           
            <a href=""><img src="../images/pinkpostlogo.png"></a>
            <div class="nav-links" id="navLinks">  
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="">CONTACT</a></li>
                    <li><a href="employee-services.php">EMPLOYEE SELF SERVICES</a></li>
                    <li><a href="">LOGOUT</a></li>
                </ul>
            </div>
        </nav>
            <h1></h1>
    </section> -->

    <!-- Side Bar -->
    <section class="side-bar-container">
        <div class="side-bar" id="sidebar">
            <div class="list">
                <a href="employee-services.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Employee Information</p></div></a>
                <a href="emp-create-pkg-1.php"><div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">Start Package</p></div></a>
                <a href="emp-recieved-pkg-1.php"><div class="icons"><i class="fa fa-check" aria-hidden="true"></i><p id="icon-txt">Mark Recieved</p></div></a>
                <a href="emp-send-out-1.php"><div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p id="icon-txt">Send Out</p></div></a>
                <a href="emp-update-trk-1.php"><div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p id="icon-txt">Update Tracking</p></div></a>
                <a href="emp-update-inv-1.php"><div class="icons"><i class="fa fa-book" aria-hidden="true"></i><p id="icon-txt">Update Inventory</p></div></a>
                <a href="emp-pkg-report-1.php"><div class="icons"><i class="fa fa-database" aria-hidden="true"></i><p id="icon-txt">Package Report</p></div></a>
                <a href="emp-notifications-1.php"><div class="icons"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><p id="icon-txt">Notifications</p></div></a>
            </div>
        </div>


        
        <!-- content -->
        <div class="content">

            <div class="form-col">
                    <div>
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <span>
                            <h5>Mark Packages Recieved</h5>
                        </span>
                    </div>

                    <form method="post" action="emp-recieved-pkg-2.php" autocomplete="off">
                        <div>
                            <span>
                                <h2>Package ID</h2>
                            </span>
                        </div>
                        <input type="text" name="package-id" placeholder="Enter package id to mark as recieved">
                    <button type="submit" class="hero-btn red-btn" id="mark-recieved-btn">Mark Recieved</button>

                    <!----------------------------------------------------->
                    <br></br>
                    <div>
                        <h5>Incoming Packages</h5>
                    </div>
                    <p>The following packages are expected to be incoming and should be marked as recieved upon their arrival.</p>
                    
                    <table class="content-table">
                        <thead>
                            <tr> 
                                <th>Package ID</th>
                                <th>Customer ID</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php

                            // grab all packages in transit who's destination is this office
                            $incomingSql = "SELECT Package.Package_ID, Package.Customer_ID
                            FROM PostOffice.Package
                                LEFT JOIN PostOffice.Tracking_Status ON Package.Package_ID = Tracking_Status.Package_ID
                            WHERE Destination_Office = ? AND Package_Status = ?;";

                            $stmtIncoming = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmtIncoming, $incomingSql)){
                                header("location: ../pages/index-login.php?error=stmtfailed");
                                exit();   
                            }
                            
                            $pkgStatus = 'transit';
                            mysqli_stmt_bind_param($stmtIncoming, "is", $_SESSION["officeID"], $pkgStatus);
                            mysqli_stmt_execute($stmtIncoming);

                            $results  = mysqli_stmt_get_result($stmtIncoming);
                            $allRows = mysqli_num_rows($results); // rows
                            $output = mysqli_fetch_all($results); // columns

                            // 0 and 1 refer to the items in the select
                            for ($x = 0; $x <= $allRows-1; $x++) {
                                echo "<tr>
                                    <td>" . $output[$x][0] . "</td>
                                    <td>" . $output[$x][1] . "</td>
                                    </tr>";
                            }

                            ?>
                        </tbody>    
                    </table>              
            </div> 
            
            <div class="form-col">
                    <!-- TODO: can't remove: will mess up side bar, so just hide by using color white in css -->
                    <p class="heading"> HEADING </p>
                    <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>
            </div> 

        </div>

    </section>
    
</body>
</html>    