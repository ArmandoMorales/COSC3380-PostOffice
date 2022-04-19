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
    <section class="sub-header">
        <?php
            include_once '../header.php';
        ?>
    </section>

    <!-- This section replaced with universal header above
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
    </section> 
    -->
    
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
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>
                        <h5>Employee Information</h5>
                    </span>
                </div>

                <div>
                    <span>
                        <h2>First Name</h2>
                        <p id="display-info">
                            <?php
                                if (isset($_SESSION["firstName"]))
                                {
                                    echo $_SESSION["firstName"];
                                    
                                }
                            ?>
                        </p>
                    </span>
                </div>

                <div>
                    <span>
                        <h2>Last Name</h2>
                        <p id="display-info">
                            <?php
                                if (isset($_SESSION["lastName"]))
                                {
                                    echo $_SESSION["lastName"];
                                    
                                }
                            ?>
                        </p>
                    </span>
                </div>

                <div>

                </div>

                <div>
                    <span>
                        <h2>Employee ID</h2>
                        <p id="display-info">
                            <?php
                                if (isset($_SESSION["empid"]))
                                {
                                    echo $_SESSION["empid"];
                                    
                                }
                            ?>
                        </p>
                    </span>
                </div>

                <div>
                    <span>
                        <h2>Address</h2>
                        <p id="display-info">   
                            <?php
                                if (isset($_SESSION["empAddressKey"]))
                                {
                                    echo $_SESSION["empAddressKey"];
                                    
                                }
                            ?>
                        </p>
                    </span>
                </div>


                <div>
                    <span>
                        <h2>Phone Number</h2>
                        <p id="display-info">   
                            <?php
                                if (isset($_SESSION["pnum"]))
                                {
                                    echo $_SESSION["pnum"];
                                    
                                }
                            ?>
                        </p>
                    </span>
                </div>

                <div>
                    <span>
                        <h2>Works At</h2>
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
                                    if ($_SESSION["officeID"] === 2){
                                        echo "Austin Branch";
                                    }
                                }
                                if (isset($_SESSION["officeID"]))
                                {
                                    if ($_SESSION["officeID"] === 3){
                                        echo "Dallas Branch";
                                    }
                                }
                                else {
                                    echo "No PO found.";
                                }
                            ?>
                        </p>
                    </span>
                </div>

                <a href="emp-edit-info-1.php"><button class="hero-btn red-btn" id="emp-edit-info-btn">Edit Information</button></a>

                <!-- TODO: can't remove: will mess up side bar, so just hide by using color white in css -->
                <p class="heading"> HEADING </p>
                <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>
            </div> 
            
        </div>

    </section>
    
</body>
</html>    