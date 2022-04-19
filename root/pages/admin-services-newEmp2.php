<html>
<head>
<?php
    $fname = $_POST["fname"];//N
    $mname = $_POST["mname"];//O
    $lname = $_POST["lname"];//N
    $phone = $_POST["phone-number"];//N
    $address = 1; //FIX HARD-CODED ADDRESS KEY //N
    $office_id = $_POST["location"]; //FIX HARD-CODED OFFICE KEY //N
    $supervisor = $_POST["supervisor"]; //O
    $email = $_POST["email"]; //N
    $pwd = $_POST["pwd"]; //N
    //This is for the address
    $building = $_POST["building-number"];//L
    $city = $_POST["city"]; //L
    $street = $_POST["street-name"]; //L
    $zip = $_POST["zipcode"]; //L
    $stat = $_POST["state"]; //L

    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';

    if(emptyInputEmp($fname, $lname, $email, $pwd, $phone, $office_id) !== false)
    {
        header("location: ../pages/admin-services-newEmp.php?error=emptyinput");
        exit();
    }
    if(invalidEmail($email) !== false)
    {
        header("location: ../pages/admin-services-newEmp.php?error=invalidemail");
        exit();
    }
    if(uidExists($conn, $email) !== false)
    {
        header("location: ../pages/admin-services-newEmp.php?error=usernametaken");
        exit();
    }
    if(empty($mname || $supervisor)){
        if(empty($mname && $supervisor)){
            createEmployee($conn, $fname, $lname, $address, $phone, $office_id, $email, $pwd);
        } else if(empty($mname)){
            createEmployee1($conn, $fname, $lname, $address, $phone, $office_id, $email, $pwd, $supervisor);
        } else if(empty($supervisor)){
            createEmployee2($conn, $fname, $lname, $address, $phone, $office_id, $email, $pwd, $mname);
        }
    } else {
        createEmployee3($conn, $fname, $lname, $address, $phone, $office_id, $email, $pwd, $mname, $supervisor);
    }

    //Replace with createEmployee function
    
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
    <section class="sub-header">
        <nav>
            <!-- TODO: add redirects based on employee permissions -->
            <a href=""><img src="../images/pinkpostlogo.png"></a>
            <div class="nav-links" id="navLinks">  
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="">CONTACT</a></li>
                    <li><a href="employee-services.html">EMPLOYEE SELF SERVICES</a></li>
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
                <div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Employee Information</p></div>
                <div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">Create Package</p></div>
                <div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p id="icon-txt">Update Tracking</p></div>
                <div class="icons"><i class="fa fa-book" aria-hidden="true"></i><p id="icon-txt">Update Inventory</p></div>
                <div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Create New Employee</p></div>
                <div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Add Employee Permissions</p></div>
                <div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Remove Employee Permissions</p></div>
                <div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">Create New Post Office</p></div>
            </div>
        </div>

        <!-- content -->
        <div class="content", id="EmpInfo">

            <div class="form-col">
                <div>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>
                        <h5>New Employee Information</h5>
                    </span>
                    </div>

                    <form method="post" action="admin-services-newEmp2.php">
                    <div>
                        <span>
                            <h2>First Name</h2>
                        </span>
                    </div>
                    <input type="text" name="fname" placeholder="John" required>

                    <div>
                        <span>
                            <h2>Middle Initial</h2>
                        </span>
                    </div>
                    <input type="text" name="mname" placeholder="B" >

                    <div>
                        <span>
                            <h2>Last Name</h2>
                        </span>
                    </div>
                    <input type="text" name="lname" placeholder="Doe" required>

                    <div>
                        <span>
                            <h2>Phone Number</h2>
                        </span>
                    </div>
                    <input type="text" name="phone-number" placeholder="**********" required>


                    <!-- This section should be automatic if they are a normal manager -->
                    <div>
                        <span>
                            <h2>Works At</h2>
                        </span>
                    </div>
                    <input type="text" name="location" placeholder="Post Office ID" required>

                    <div>
                        <span>
                            <h2>Supervisor ID</h2>
                        </span>
                    </div>
                    <input type="text" name="supervisor" placeholder="****">

                    <div>
                        <span>
                            <h2>Email</h2>
                        </span>
                    </div>
                    <input type="text" name="email" placeholder="jDoe321@postOffice.com" required>

                    <div>
                        <span>
                            <h2>password</h2>
                        </span>
                    </div>
                    <input type="text" name="pwd" placeholder="*****" required>

                    <div>
                        <span>
                            <h2>Building Number</h2>
                        </span>
                    </div>
                    <input type="text" name="building-number" placeholder="****" required>
                    
                    <div>
                        <span>
                            <h2>City</h2>
                        </span>
                    </div>
                    <input type="text" name="city" placeholder="Houston" required>

                    <div>
                        <span>
                            <h2>Street Name</h2>
                        </span>
                    </div>
                    <input type="text" name="street-name" placeholder="2nd Street" required>
                    <div>
                        <span>
                            <h2>Zipcode</h2>
                        </span>
                    </div>
                    <input type="text" name="zipcode" placeholder="*****" required>
                    <div>
                        <span>
                            <h2>State</h2>
                        </span>
                    </div>
                    <input type="text" name="state" placeholder="Texas" required>

                    <button type="submit" class="hero-btn red-btn" id="emp-add-emp-btn">Add Employee</button>

                    <p class="heading"> HEADING </p>
                    <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>

            </div> 
            
        </div>

    </section>
    
</body>
</html>    