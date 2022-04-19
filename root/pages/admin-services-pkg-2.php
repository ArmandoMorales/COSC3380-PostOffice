<html>
<head>

<?php 
    include("../includes/dbh.inc.php");
    $customID = $_POST["customer-id"];
    $Rbuildingnum = $_POST['Rbuilding-num'];
    $Rbnum_converted = (int) $Rbuildingnum;
    $Rstreet = $_POST['Rstreet-name'];
    $Rcity = $_POST['Rcity'];
    $Rstate = $_POST['Rstate'];
    $Rzipcode = $_POST['Rzip'];
    $Rzipcode_coverted = (int) $Rzipcode;
                
    $Dbuildingnum = $_POST['Dbuilding-num'];
    $Dbnum_converted = (int) $Dbuildingnum;
    $Dstreet = $_POST['Dstreet-name'];
    $Dcity = $_POST['Dcity'];
    $Dstate = $_POST['Dstate'];
    $Dzipcode = $_POST['Dzip'];
    $Dzipcode_coverted = (int) $Dzipcode;
                
    $ptype = $_POST['ptype'];
    $weight = $_POST['weight'];
    $vol = $_POST['vol'];
    $vol_converted = (int) $vol;
?>
<section class="sub-header">
    <?php
        include_once '../header.php';
    ?>
</section>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administrator Services</title>
<link rel="stylesheet" href="../css/employee-services.css">
<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,600,700&display=swap" rel="stylesheet">
<!-- icons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
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
                <a href="admin-services-ViewPO.php"><div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">View Post Office</p></div></a>
                </div>
        </div>

        <!-- content -->
        <div class="content">
            <?php
                $addrRKeys = "SELECT Address_Key FROM PostOffice.Address 
                                WHERE Building_Num = ? AND Street_Name = ? AND City = ? AND State = ? AND Zipcode = ?;";
                
                $stmtRKeys = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmtRKeys, $addrRKeys)){
                    header("location: ../pages/index-login.php?error=stmtfailed");
                    exit();   
                }
                mysqli_stmt_bind_param($stmtRKeys, "isssi", $Rbnum_converted, $Rstreet, $Rcity, $Rstate, $Rzipcode_coverted );
                mysqli_stmt_execute($stmtRKeys);

                $resultRKey = mysqli_stmt_get_result($stmtRKeys);
                $resultRKeyCheck = mysqli_num_rows($resultRKey);
                
                $holdRaddr = -1;
                
                if($resultRKeyCheck > 0) {
                    while($resultRKeyCheck = mysqli_fetch_assoc($resultRKey))
                    {
                        $holdRaddr = $resultRKeyCheck["Address_Key"];       
                    }
                } else {
                    $sqlRaddr = "INSERT INTO PostOffice.Address (Building_Num, Street_Name, City, State, Zipcode)
                    VALUES (?, ?, ?, ?, ?);";
                    $stmtRaddr = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmtRaddr, $sqlRaddr)) {
                        header("location: ../pages/index-login.php?error=stmtfailed");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmtRaddr, "isssi", $Rbnum_converted, $Rstreet, $Rcity, $Rstate, $Rzipcode_coverted );
                    mysqli_stmt_execute($stmtRaddr);
                
                    $addrRKeys = "SELECT Address_Key FROM PostOffice.Address 
                                WHERE Building_Num = ? AND Street_Name = ? AND City = ? AND State = ? AND Zipcode = ?;";
                
                    $stmtRKeys = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmtRKeys, $addrRKeys)) {
                        header("location: ../pages/index-login.php?error=stmtfailed");
                        exit();   
                    }
                    mysqli_stmt_bind_param($stmtRKeys, "isssi", $Rbnum_converted, $Rstreet, $Rcity, $Rstate, $Rzipcode_coverted );
                    mysqli_stmt_execute($stmtRKeys);

                    $resultRKey = mysqli_stmt_get_result($stmtRKeys);
                    $resultRKeyCheck = mysqli_num_rows($resultRKey);
                
                    $holdRaddr = -1;
                
                    if($resultRKeyCheck > 0) {
                        while($resultRKeyCheck = mysqli_fetch_assoc($resultRKey)) {
                            $holdRaddr = $resultRKeyCheck["Address_Key"];       
                        }
                    }
                    else {
                    echo "error";
                    }
                }


                //Retrieve Destination Destination Address Keys
                $addrDKeys = "SELECT Address_Key FROM PostOffice.Address 
                                WHERE Building_Num = ? AND Street_Name = ? AND City = ? AND State = ? AND Zipcode = ?;";
                
                $stmtDKeys = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmtDKeys, $addrDKeys)) {
                    header("location: ../pages/index-login.php?error=stmtfailed");
                    exit();   
                }
                mysqli_stmt_bind_param($stmtDKeys, "isssi", $Dbnum_converted, $Dstreet, $Dcity, $Dstate, $Dzipcode_coverted );
                mysqli_stmt_execute($stmtDKeys);

                $resultDKey = mysqli_stmt_get_result($stmtDKeys);
                
                $resultDKeyCheck = mysqli_num_rows($resultDKey);
                
                $holdDaddr = -1;
                
                if($resultDKeyCheck > 0){
                    while($resultDKeyCheck = mysqli_fetch_assoc($resultDKey))
                    {
                        $holdDaddr = $resultDKeyCheck["Address_Key"];       
                    }
                } else {
                    //New (destination) Address tuple
                    $sqlDaddr = "INSERT INTO PostOffice.Address (Building_Num, Street_Name, City, State, Zipcode)
                    VALUES (?, ?, ?, ?, ?);";
                    $stmtDaddr = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmtDaddr, $sqlDaddr)) {
                        header("location: ../pages/index-login.php?error=stmtfailed");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmtDaddr, "isssi", $Dbnum_converted, $Dstreet, $Dcity, $Dstate, $Dzipcode_coverted);
                    mysqli_stmt_execute($stmtDaddr);
                    //Retrieve Destination Destination Address Keys
                    $addrDKeys = "SELECT Address_Key FROM PostOffice.Address 
                                WHERE Building_Num = ? AND Street_Name = ? AND City = ? AND State = ? AND Zipcode = ?;";
                
                    $stmtDKeys = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmtDKeys, $addrDKeys)) {
                        header("location: ../pages/index-login.php?error=stmtfailed");
                        exit();   
                    }
                    mysqli_stmt_bind_param($stmtDKeys, "isssi", $Dbnum_converted, $Dstreet, $Dcity, $Dstate, $Dzipcode_coverted );
                    mysqli_stmt_execute($stmtDKeys);

                    $resultDKey = mysqli_stmt_get_result($stmtDKeys);
                
                    $resultDKeyCheck = mysqli_num_rows($resultDKey);
                
                    $holdDaddr = -1;
                
                    if($resultDKeyCheck > 0) {
                        while($resultDKeyCheck = mysqli_fetch_assoc($resultDKey)) {
                            $holdDaddr = $resultDKeyCheck["Address_Key"];       
                        }
                    }
                    else {
                        echo "error";
                    }
                }
            ?>
            <div class="form-col">
                <div>
                    <i class="fa fa-dropbox" aria-hidden="true"></i>
                    <span>
                        <h5>Package Sent</h5>
                    </span>
                </div>

                <div>
                    <span>
                        <h2>Thank you! Package has been created and added to the database. Please be sure to send it out to it's next location.</h2>
                    </span>
                </div>

                <form method="post" action="emp-create-pkg-3.php">
                <button type="submit" class="hero-btn red-btn" id="create-pkg-send-to">Create Another Package</button>
                <?php
                    $notReceived = 0;
                    //Create Package
                    $newPkg = "INSERT INTO PostOffice.Package (Customer_ID, Package_Type, Package_Weight, Package_Volume, IC_Address_Key, OT_Address_Key, Recieved)
                            VALUES(?,?,?,?,?,?,?);";
                    $stmtPkg = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmtPkg, $newPkg)) {
                        header("location: ../pages/index-login.php?error=stmtfailed");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmtPkg, "isddiii", $customID, $ptype, $weight, $vol_converted, $holdRaddr,$holdDaddr, $notReceived);
                    mysqli_stmt_execute($stmtPkg);
                ?>
                <!-- TODO: can't remove: will mess up side bar, so just hide by using color white in css -->
                <p class="heading"> HEADING </p>
                <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>
            </div> 

        </div>

    </section>

</body>
</html>