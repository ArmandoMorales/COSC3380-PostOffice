<html>
<head>
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
                <a href="admin-services-newEmp.php"><div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">Create New Post Office</p></div></a>
            </div>
        </div>
        <!-- content -->
        <div class="content">
            <div class="form-col">
            <div>
                    <i class="fa fa-dropbox" aria-hidden="true"></i>
                    <span>
                        <h5>Create Package</h5>
                    </span>
                </div>
                <form method="post" action="emp-create-pkg-2.php">
                    <div>
                        <span>
                            <h2>Customer ID</h2>
                        </span>
                    </div>
                    <input type="text" name="customer-id" placeholder="Enter customer's id">
                    <div>
                    <span>
                        <h2 style="color:gray;">Return Address</h2>
                    </span>
                </div> 
                <div>
                    <span>
                        <h2>Building #</h2>
                    </span>
                </div>
                <input type="text" name="Rbuilding-num" placeholder="Enter building number">

                <div>
                    <span>
                        <h2>Street Name</h2>
                    </span>
                </div>
                <input type="text" name="Rstreet-name" placeholder="Enter street name" maxlength="25">

                <div>
                    <span>
                        <h2>City</h2>
                    </span>
                </div>
                <input type="text" name="Rcity" placeholder="Enter city" maxlength="20">
                
                <div>
                    <span>
                        <h2>State</h2>
                    </span>
                </div>
                <input type="text" name="Rstate" placeholder="Enter state">

                <div>
                    <span>
                        <h2>Zipcode</h2>
                    </span>
                </div>
                <input type="text" name="Rzip" placeholder="Enter zipcode">
                
                <div>
                    <span>
                        <h2 style="color:gray;">Destination Address</h2>
                    </span>
                </div>    

                <!--OUTGOING INFO BELOW-->
                <div>
                        <span>
                            <h2>Building #</h2>
                        </span>
                    </div>
                    <input type="text" name="Dbuilding-num" placeholder="Enter building number">

                    <div>
                        <span>
                            <h2>Street Name</h2>
                        </span>
                    </div>
                    <input type="text" name="Dstreet-name" placeholder="Enter street name" maxlength="25">

                    <div>
                        <span>
                            <h2>City</h2>
                        </span>
                    </div>
                    <input type="text" name="Dcity" placeholder="Enter city" maxlength="20">
                    
                    <div>
                        <span>
                            <h2>State</h2>
                        </span>
                    </div>
                    <input type="text" name="Dstate" placeholder="Enter state">

                    <div>
                        <span>
                            <h2>Zipcode</h2>
                        </span>
                    </div>
                    <input type="text" name="Dzip" placeholder="Enter zipcode">

                    <div>
                        <span>
                            <h2>Package Type</h2>
                        </span>
                    </div>
                    <input type="text" name="ptype" placeholder="Enter Package Type (Standard/Fragile)">


                    <div>
                        <span>
                            <h2>Package Weight (lbs)</h2>
                        </span>
                    </div>
                    <input type="number" name="weight" placeholder="Enter package weight">

                    <div>
                        <span>
                            <h2>Package Volume (lbs^3)</h2>
                        </span>
                    </div>
                    <input type="text" name="vol" placeholder="Enter package volume">
                    
                    <button type="submit" class="hero-btn red-btn" id="cust-conf-ship-btn">Save Information</button>

                    <p class="heading"> HEADING </p>
                    <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>


                    </div> 
            
        </div>
    </section>
    
</body>
</html>