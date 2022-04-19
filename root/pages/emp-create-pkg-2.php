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
<title>Employee Self Services</title>
<link rel="stylesheet" href="../css/employee-services.css">
<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,600,700&display=swap" rel="stylesheet">
<!-- icons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- Commented out due to header above
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
            </div>
        </div>

        <!-- content -->
        <div class="content">

        <?php
        
        //Make sure input Package_ID is valid 
        $pkgID = $_POST['package-id'];
        $pkgIDConverted = (int) $pkgID;
        

        $pkgsql = "SELECT * FROM PostOffice.Package WHERE PACKAGE_ID = ?;";
        $stmtpkg = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmtpkg, $pkgsql))
        {
            header("location: ../pages/index-login.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmtpkg, "i", $pkgID);
        mysqli_stmt_execute($stmtpkg);

        $pkgStartRow = mysqli_stmt_get_result($stmtpkg);
        $pkgStartRowCheck = mysqli_num_rows($pkgStartRow);

        $holdPkgKey = -1;
        $holdPkgWeight = -1;
        $holdPkgVol = -1;
        

        if ($pkgStartRowCheck > 0)
        { 
            //This will be used and get deleted later in emp-create-pjg-3.php
            $_SESSION['packageIDglobal'] = $pkgIDConverted;
         
            while($pkgStartRowCheck = mysqli_fetch_assoc($pkgStartRow))
            {
                $holdPkgKey = $pkgStartRowCheck["Package_ID"];
                $holdPkgWeight = $pkgStartRowCheck["Package_Weight"];     
                $holdPkgVol = $pkgStartRowCheck["Package_Volume"];  
            }

            
        }

        else {
            header("location: ../pages/emp-create-pkg-1.php?error=packagedoesnotexist");
            exit();
        }
        
        //Get Incoming Address
        $addrSql = "SELECT Building_Num, Street_Name, City, State, Zipcode FROM PostOffice.Address, PostOffice.Package WHERE Address.Address_Key = Package.IC_Address_Key;";
        $resultAddrRow = mysqli_query($conn, $addrSql);
        $resultAddrRowCheck = mysqli_num_rows($resultAddrRow);
        
        $holdAddrBnum = -1;
        $holdStreet = "";
        $holdCity = "";
        $holdState = "";
        $holdZip = -1;
        
        if($resultAddrRowCheck > 0){
            while($resultAddrRowCheck = mysqli_fetch_assoc($resultAddrRow))
            {
                $holdAddrBnum = $resultAddrRowCheck['Building_Num'];
                $holdStreet = $resultAddrRowCheck['Street_Name'];
                $holdCity = $resultAddrRowCheck['City'];
                $holdState = $resultAddrRowCheck['State'];
                $holdZip = $resultAddrRowCheck['Zipcode'];
            }

            
        //Get Destination  Address
        $addrSql2 = "SELECT Building_Num, Street_Name, City, State, Zipcode FROM PostOffice.Address, PostOffice.Package WHERE Address.Address_Key = Package.OT_Address_Key;";
        $resultAddrRow2 = mysqli_query($conn, $addrSql2);
        $resultAddrRowCheck2 = mysqli_num_rows($resultAddrRow2);
        
        $holdDAddrBnum = -1;
        $holdDStreet = "";
        $holdDCity = "";
        $holdDState = "";
        $holdDZip = -1;
        
        if($resultAddrRowCheck2 > 0){
            while($resultAddrRowCheck2 = mysqli_fetch_assoc($resultAddrRow2))
            {
                $holdDAddrBnum = $resultAddrRowCheck2['Building_Num'];
                $holdDStreet = $resultAddrRowCheck2['Street_Name'];
                $holdDCity = $resultAddrRowCheck2['City'];
                $holdDState = $resultAddrRowCheck2['State'];
                $holdDZip = $resultAddrRowCheck2['Zipcode'];
            }

        }
        } //VERY SUSSY CLOSING BRACKET, IF THIS PAGE IS BROKEN SOMEHOW THIS MIGHT BE THE CULPRIT!
        ?>

            <div class="form-col">
                <div>
                    <i class="fa fa-dropbox" aria-hidden="true"></i>
                    <span>
                        <h5>Package Info For Customer <?php echo $holdPkgKey; ?></h5>
                    </span>
                </div>
        
                <div>
                    <span>
                        <h2>Package Sent From</h2>
                    </span>
                </div>

                <div>
                    <span>
                        <p id="display-info">
                            <?php
                                echo $holdAddrBnum . " " . $holdStreet . " " . $holdCity . " " . $holdState . " " . $holdZip;
                            ?>

                        </p>
                    </span>
                </div>

                <div>
                    <span>
                        <h2>Package Information</h2>
                    </span>
                </div>

                
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Package ID</th>
                            <th>Destination Address</th>
                            <th>Price</th>
                            <th>State</th>
                            <th>Zipcode</th>
                            <th>Package Weight (lbs)</th>
                            <th>Package Volume (lbs^3)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $holdPkgKey; ?></td>
                            <td><?php echo $holdDAddrBnum . " " . $holdDStreet . "," . $holdDCity;  ?></td>
                            <td><?php echo "hewo"; ?></td>
                            <td><?php echo $holdDState; ?></td>
                            <td><?php echo $holdDZip ?></td>
                            <td>30</td>
                            <td>40</td> 
                        </tr>
                    </tbody>
                </table>

                
                <form method="post" action="emp-create-pkg-3.php">
                    <div>
                        <span>
                            <h2>Current Post Office</h2>
                        </span>
                    </div>
                    <p id="display-info">   
                            <?php
                                if (isset($_SESSION["officeID"]))
                                {
                                    if ($_SESSION["officeID"] === 1){
                                        echo "Houston Branch";
                                    }
                                }
                                if (isset($_SESSION["officeID"]))
                                {
                                    if ($_SESSION["officeID"] === 3){
                                        echo "Austin Branch";
                                    }
                                }
                                if (isset($_SESSION["officeID"]))
                                {
                                    if ($_SESSION["officeID"] === 4){
                                        echo "Dallas Branch";
                                    }
                                }
                                else {
                                    echo "No PO found.";
                                }
                            ?>
                        </p>
                    
                    <div>
                        <span>
                            <h2>Send To Next Post Office</h2>
                        </span>
                    </div>
                    <input type="text" name="nextPO" placeholder="Enter new post office to ship to" required>
              
                    <button type="submit" class="hero-btn red-btn" id="create-pkg-send-to">Send</button>

                <!-- TODO: can't remove: will mess up side bar, so just hide by using color white in css -->
                <p class="heading"> HEADING </p>
                <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>
            </div> 
            
        </div>

    </section>
    
</body>
</html>    