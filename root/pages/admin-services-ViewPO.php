<html>
<head>
<section class="sub-header">
    <?php
    include_once '../header.php';
    ?>
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
                <a href="admin-services-ViewPO.php"><div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">View Post Office</p></div></a>
                </div>
        </div>

        <!-- content -->
        <div class="content", id="EmpInfo">

            <div class="form-col">
                
                <div>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>
                        <h5>Post Offices Report</h5>
                    </span>
                </div>

                <form method="post" action="../pages/admin-services-ViewPO2.php">
                    <div>
                        <span>
                            <h2>Optional: Post Office Name</h2>
                        </span>
                    </div>
                    <input type="text" name="pName" placeholder="*******">
                    
                    <div>
                        <span>
                            <h2>Optional: Manager ID</h2>
                        </span>
                    </div>
                    <input type="text" name="mID" placeholder="Enter 0 for unmanged Post Offices">
                
                    <div>
                        <span>
                            <h2>Optional: Post Office ID</h2>
                        </span>
                    </div>
                    <input type="text" name="pID" placeholder="***">
                    
                    <div>
                        <span>
                            <h2>Optional: State</h2>
                        </span>
                    </div>
                    <input type="text" name="state" placeholder="TX">
                    
                    <div>
                        <span>
                            <h2>Optional: City</h2>
                        </span>
                    </div>
                    <input type="text" name="city" placeholder="Houston">
                
                    <div>
                        <span>
                            <h2>Optional: Phone Number</h2>
                        </span>
                    </div>
                    
                    <input type="text" name="pNum" placeholder="**********">
                    <div>
                        <span>
                            <h2>Optional: Less than X Employees</h2>
                        </span>
                    </div>
                    <input type="text" name="xPloy" placeholder="Not Currently Implemented">
                    
                    <div>
                        <span>
                            <h2>Optional: Greater than X Packages</h2>
                        </span>
                    </div>
                    <input type="text" name="xPloy" placeholder="Not Currently Implemented">
                    <input type="submit" name="viewPO" value="Search for Post Offices"/>
                    
                </form>


                <p class="heading"> HEADING </p>
                <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>

            </div>
            
        </div>

    </section>
    
</body>
</html>