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
                            <h5>Update Tracking</h5>
                        </span>
                    </div>

                    <form method="post" action="emp-update-trk-2.php">
                        <div>
                            <span>
                                <h2>Package ID</h2>
                            </span>
                        </div>
                        <input type="text" name="package-id" placeholder="Enter package id">
                    <button type="submit" class="hero-btn red-btn" id="update-track-get-info">Get Package Info</button>

                    <!----------------------------------------------------->
                    <br></br>
                    <div>
                        <h5>Packages with no Tracking Assigned</h5>
                    </div>
                    
                    <table class="content-table">
                        <thead>
                            <tr> 
                                <th>Package ID</th>
                                <th>Customer ID</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php
                            // Grabbing all packages that do HAVE NOT been added to tracking table
                            // i.e. packages that have not been updated by an employee in the Update Packing page
                            $noTrackingSql = "SELECT Package.Package_ID, Package.Customer_ID
                            FROM PostOffice.Package
                                LEFT JOIN PostOffice.Tracking ON Package.Package_ID = Tracking.Package_ID
                            WHERE Tracking_Office_ID IS NULL;";
                            $result = mysqli_query($conn, $noTrackingSql);
                            $result_check = mysqli_num_rows($result);

                            //Check for results
                            if($result_check > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>
                                    <td>" . $row['Package_ID'] . "</td>
                                    <td>" . $row['Customer_ID'] . "</td>
                                    </tr>";
                                }
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