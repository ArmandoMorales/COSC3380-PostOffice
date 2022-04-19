<html>
<head>

<?php
    include("../includes/dbh.inc.php");
    $pname = $_POST['pName'];
    $mID = $_POST['mID'];
    $pID = $_POST['pID'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pNum = $_POST['pNum'];
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
                    <h5>View Post Offices</h5>
                </span>
                </div>

                <div>
                <span>
                    <h2>Post Office Employees</h2>
                </span>
                </div>
                
                <table class="content-table">
                        <thead>
                            <tr>
                                <!--Package_ID, StopNum, DateArrived, DateSent, Tracking_Office_ID-->
                                
                                <th>Post Office Name</th>
                                <th>Office Manager</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>Zipcode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //query Tracking row
                                $tracksql = "SELECT Post_Office.Office_ID, Office_Name, First_Name, Last_Name, Employee_ID, Building_Num, Street_Name, City, PostOffice.Address.State, Zipcode, PO_Phone_Num, Supervisor_ID FROM Post_Office, Employee, PostOffice.Address 
                                WHERE Post_Office.Supervisor_ID = Employee.Employee_ID 
                                AND Post_Office.PO_Address_Key = PostOffice.Address.Address_Key;";
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
                                        $a=0;
                                        //get office name
                                            if(!empty($pname)){
                                                if($check['Office_Name'] != $pname){
                                                    $a=1;
                                                }
                                            }
                                            if(!empty($state)){
                                                if($check['State'] != $state){
                                                    $a=1;
                                                }
                                            }
                                            if(!empty($city)){
                                                if($check['City'] != $city){
                                                    $a=1;
                                                }
                                            }
                                            if(!empty($mID)){
                                                if($check['Supervisor_ID'] != $mID){
                                                    $a=1;
                                                }
                                            }
                                            if(!empty($pID)){
                                                if($check['Office_ID'] != $pID){
                                                    $a=1;
                                                }
                                            }
                                            if(!empty($pNum)){
                                                if($check['PO_Phone_Num'] != $pNum){
                                                    $a=1;
                                                }
                                            }
                                            
                                        if($a==0){
                                        echo "<tr> 
                                        <td>" . $check['Office_Name'] . "</td>
                                        <td>" . $check['First_Name'] . " " . $check['Last_Name'] . " | ID: " . $check['Employee_ID'] . "</td>
                                        <td>" . $check['PO_Phone_Num'] . "</td>
                                        <td>" . $check['Building_Num'] . " " . $check['Street_Name'] .", " . $check['City'] . "</td>
                                        <td>" . $check['State'] . "</td>
                                        <td>" . $check['Zipcode'] . "</td>
                                    
                                        </tr>";
                                        }

                                    }
                                }
                            ?>
                            

                            
                        </tbody>
                    </table>

                <p class="heading"> HEADING </p>
                <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>

            </div>
            
        </div>

    </section>
    
</body>
</html>