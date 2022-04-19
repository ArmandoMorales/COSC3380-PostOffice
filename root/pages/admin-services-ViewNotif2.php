<html>
<head>

<?php
    include("../includes/dbh.inc.php");
?>

<section class="sub-header">
    <?php
        include_once '../header.php';
    ?>
</section>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administrator Services</title>
<link rel="stylesheet" href="../css/admin-services.css">
<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,600,700&display=swap" rel="stylesheet">
<!-- icons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <script src="../scripts/add-Perms.js"></script>

    <!-- Side Bar -->
    <section class="side-bar-container">
        <div class="side-bar" id="sidebar">
            <div class="list">
                <a href="admin-services-services.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Employee Information</p></div></a>
                <a href="admin-services-pkg-1.php"><div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">Create Package</p></div></a>
                <a href="admin-services-trk-1.php"><div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p id="icon-txt">Update Tracking</p></div></a>
                <a href="admin-services-inv-1.php"><div class="icons"><i class="fa fa-book" aria-hidden="true"></i><p id="icon-txt">Update Inventory</p></div></a>
                <a href="admin-services-report-1.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Inventory Report</p></div></a>
                <a href="admin-services-ViewNotif2.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Notifications</p></div></a>
                <a href="admin-services-ViewEmp.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">View Employees</p></div></a>
                <a href="admin-services-newEmp.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Create New Employee</p></div></a>
                <a href="admin-services-remEmp.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Remove Employee</p></div></a>
                <a href="admin-services-newPerm.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Add Employee Permissions</p></div></a>
                <a href="admin-services-remPerm.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Remove Employee Permissions</p></div></a>
                <a href="admin-services-newEmp.php"><div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">Create New Post Office</p></div></a>
            </div>
        </div>

        <!-- content -->
        <div class="content", id="EmpInfo">

            <div class="form-col">
                <div>
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                    <h5>View Notifications</h5>
                </span>
                </div>

                <div>
                <span>
                    <h2>New Employee Notifications</h2>
                </span>
                </div>
                
                <table class="content-table">
                        <thead>
                            <tr>
                                <!--Package_ID, StopNum, DateArrived, DateSent, Tracking_Office_ID-->
                                
                                <th>Employee Name</th>
                                <th>Start_Date</th>
                                <th>Location</th>
                                <th>Employee ID</thz.
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //query Tracking row
                                $tracksql = "SELECT * FROM Notification_New_Employee WHERE isAdd = 1;";
                                $stmtTrack = mysqli_stmt_init($conn);
                             
                                if (!mysqli_stmt_prepare($stmtTrack, $tracksql)){
                                    header("location: ../pages/index-login.php?error=stmtfailed");
                                    exit();
                                    }
                                mysqli_stmt_execute($stmtTrack);
                                    
                                $trackStartRow = mysqli_stmt_get_result($stmtTrack);
                                $stmtTrack_check = mysqli_num_rows($trackStartRow);



                                //Check for results
                                if($stmtTrack_check > 0){
                                    while($check = mysqli_fetch_assoc($trackStartRow)){

                                        //get office name
                                        $officesql = "SELECT * FROM Post_Office, Employee WHERE Employee.Employee_ID = ? AND Post_Office.Office_ID = Employee.Office_ID;";
                                        $stmtOffice = mysqli_stmt_init($conn);
                             
                                        if (!mysqli_stmt_prepare($stmtOffice, $officesql)){
                                            header("location: ../pages/index-login.php?error=stmtfailed");
                                            exit();
                                            }
                                        mysqli_stmt_bind_param($stmtOffice, "i", $check['E_ID']);
                                        mysqli_stmt_execute($stmtOffice);
                                    
                                        $OfficeStartRow = mysqli_stmt_get_result($stmtOffice);
                                        $OfficeRow = mysqli_fetch_assoc($OfficeStartRow);
                                        
                                        echo "<tr> 
                                        <td>" . $check['First_Name'] . " " . $check['Last_Name'] . "</td>
                                        <td>" . $check['Start_Date'] . "</td>
                                        <td>" . $OfficeRow['Office_Name'] . "</td>
                                        <td>" . $check['E_ID'] . "</td>
                                        </tr>";

                                    }
                                }
                            ?>
                            

                            
                        </tbody>
                </table>
                <?php
                ?>
                <form method="post" action = "../pages/admin-services-ViewNotif.php">
                <input type="submit" name="choosePO" value="Mark all as read"/>
                </form>
                <p class="heading"> HEADING </p>
                <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>

            </div>
            
        </div>

    </section>
    
</body>
</html>    