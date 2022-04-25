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
                <a href="emp-recieved-pkg-1.php"><div class="icons"><i class="fa fa-check" aria-hidden="true"></i><p id="icon-txt">Mark Recieved</p></div></a>
                <a href="emp-send-out-1.php"><div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p id="icon-txt">Send Out</p></div></a>
                <a href="emp-report-lost-1.php"><div class="icons"><i class="fa fa-user-secret" aria-hidden="true"></i><p id="icon-txt">Report Lost</p></div></a>
                <!-- <a href="emp-update-trk-1.php"><div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p id="icon-txt">Update Tracking</p></div></a> -->
                <a href="emp-update-inv-1.php"><div class="icons"><i class="fa fa-book" aria-hidden="true"></i><p id="icon-txt">Update Inventory</p></div></a>
                <a href="emp-pkg-report-1.php"><div class="icons"><i class="fa fa-database" aria-hidden="true"></i><p id="icon-txt">Package Report</p></div></a>
                <a href="emp-notifications-1.php"><div class="icons"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><p id="icon-txt">Notifications</p></div></a>

            </div>
        </div>

        <!-- content -->
        <div class="content">

            <div class="form-col">
            <div>
            <i class="fa fa-database" aria-hidden="true"></i>
                    <span>
                        <h5>Package Report</h5>
                    </span>
                </div>

                <p>Enter fields for which you'd like to filter package reports by. Leave all others blank.</p>
                <br>
                
                <form method="post" action="emp-pkg-report-2.php" autocomplete="off">
                    <div>
                        <span>
                            <h2>Priority Number</h2>
                        </span>
                    </div>
                    <!-- <input type="text" name="prio-num" placeholder="1, 2, or 3..."> -->
                    <input type="text" name="prio-num" placeholder="Select a priority filter" list="possible-prios">
                        <datalist id="possible-prios"> 
                            <option> 1 </option>
                            <option> 2 </option>
                            <option> 3 </option>
                        </datalist>

                    <div>
                        <span>
                            <h2>Weight</h2>
                        </span>
                    </div>
                    <input type="number" name="weight" placeholder="Enter max weight in pounds..." min="1">

                    <div>
                        <span>
                            <h2>Volume</h2>
                        </span>
                    </div>
                    <input type="number" name="volume" placeholder="insert max package volume in inches..." min="1">

                    <div>
                        <span>
                            <h2>Package Type</h2>
                        </span>
                    </div>
                    <!-- <input type="text" name="type" placeholder="Enter 'Standard' or 'Fragile' [Case sensitive]..."> -->
                    <input type="text" name="type" placeholder="Select a package type..." list="possible-pkg-typs">
                    <datalist id="possible-pkg-typs"> 
                        <option> Standard </option>
                        <option> Fragile </option>
                    </datalist>


                    <div>
                        <span>
                            <h2>Due Within</h2>
                        </span>
                    </div>
                  <input type="number" name="due" placeholder="Enter max days until due..." min="1">

                    <div>
                        <span>
                            <h2>Max Price</h2>
                        </span>
                    </div>
                    <input type="text" name="cost" placeholder="Enter max price in dollars...">

                <button type="submit" class="hero-btn red-btn" id="pkg-report-info">Generate Report</button>

                <!-- TODO: can't remove: will mess up side bar, so just hide by using color white in css -->
                <p class="heading"> HEADING </p>
                <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>
            </div> 
            
        </div>

    </section>
    
</body>
</html>    