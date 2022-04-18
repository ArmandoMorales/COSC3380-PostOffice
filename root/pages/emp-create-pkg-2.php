<html>
<head>

<?php 
    // HERE YOU'LL WRITE THE PHP CODE TO CHECK WHO THE ID BELONGS TO. 
    // THEN YOU CAN EMBEDD ANOTHER PHP TAG INTO THE HTML BELOW TO DISPLAY THEIR INFORMATION
?>

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
        <nav>
            <!-- TODO: add redirects based on employee permissions -->
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

    <!-- Side Bar -->
    <section class="side-bar-container">
        <div class="side-bar" id="sidebar">
            <div class="list">
                <a href="employee-services.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Employee Information</p></div></a>
                <a href="emp-create-pkg-1.php"><div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">Create Package</p></div></a>
                <a href="emp-update-trk-1.php"><div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p id="icon-txt">Update Tracking</p></div></a>
                <a href="emp-update-inv-1.php"><div class="icons"><i class="fa fa-book" aria-hidden="true"></i><p id="icon-txt">Update Inventory</p></div></a>
            </div>
        </div>

        <!-- content -->
        <div class="content">

            <div class="form-col">
                <div>
                    <i class="fa fa-dropbox" aria-hidden="true"></i>
                    <span>
                        <h5>Package Info For Johnny</h5>
                    </span>
                </div>
        
                <div>
                    <span>
                        <h2>Package Sent From</h2>
                    </span>
                </div>

                <div>
                    <span>
                        <p id="display-info">Post Office Start</p>
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
                            <td>123456789</td>
                            <td>123 Sessame Street</td>
                            <td>88,110</td>
                            <td>Texas</td>
                            <td>12345</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                    </tbody>
                </table>

                
                <form method="post" action="emp-create-pkg-3.php">
                    <div>
                        <span>
                            <h2>Send To Next Post Office</h2>
                        </span>
                    </div>
                    <input type="text" name="fname" placeholder="Enter new post office to ship to" required>
                <button type="submit" class="hero-btn red-btn" id="create-pkg-send-to">Send</button>

                <!-- TODO: can't remove: will mess up side bar, so just hide by using color white in css -->
                <p class="heading"> HEADING </p>
                <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>
            </div> 
            
        </div>

    </section>
    
</body>
</html>    